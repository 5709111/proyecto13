<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$professions = DB::select('SELECT id FROM professions WHERE title="Desarrollador Back-End"');
        $professions = DB::select(
            'SELECT id FROM professions WHERE title=?',
            ['Desarrollador Back-End']
        );

       $professions =DB::table('professions')
            ->select('id')
            ->where('title', 'Desarrollador Back-End')
            ->first();
        dd($professions);

        $professionID =DB::table('professions')
            ->where('title', 'Desarrollador Back-End')
            ->value('id');
        dd($professionID);

        $professionID =DB::table('professions')
            ->whereTitle('Desarrollador Back-End')
            ->value('id');
        dd($professionID);*/

        DB::table('users')->insert([
            'name' => 'Pepe Pérez',
            'email' => 'pepe@mail.es',
            'password' => bcrypt('123456'),
            'profession_id'=>DB::table('professions')
                ->whereTitle('Desarrollador Back-End')
                ->value('id')
        ]);
    }
}