<?php

namespace App;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

abstract class QueryFilter
{
    abstract public function rules(): array;

    public function applyTo($query, array $filters)
    {
        $rules = $this->rules();

        $validator = Validator::make(
            array_intersect_key($filters, $rules), $rules
        );

        foreach ($validator->valid() as $name => $value) {
            $this->applyFilters($query, $name, $value);
        }

        return $query;
    }

    private function applyFilters($query, $name, $value): void
    {
        $method = 'filterBy' . Str::studly($name);

        if (method_exists($this, $method)) {
            $this->{$method}($query, $value);
        } else {
            $query->where($name, $value);
        }
    }
}