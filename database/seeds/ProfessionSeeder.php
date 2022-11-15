<?php

use App\Profession;
use Illuminate\Database\Seeder;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profession::create([
            'title'=>'Desarrollador Back-End'
        ]);

        Profession::create([
            'title'=>'Desarrollador Front-end'

        ]);
        Profession::create([
            'title'=>'Diseñador Back-end'
        ]);
        factory(Profession::class,48)->create();
    }
}
