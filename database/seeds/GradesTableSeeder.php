<?php

use Illuminate\Database\Seeder;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->insert([
            'name' => 'Primaria',
            'courses' => 6,
            'type' => 'Colegio',
        ]);

        DB::table('grades')->insert([
            'name' => 'ESO',
            'courses' => 4,
            'type' => 'Instituto',
        ]);

        DB::table('grades')->insert([
            'name' => 'Bachillerato',
            'courses' => 2,
            'type' => 'Instituto',
        ]);

        DB::table('grades')->insert([
            'name' => 'Grado en Ingeniería en Informática',
            'courses' => 4,
            'type' => 'Universidad',
        ]);

        DB::table('grades')->insert([
            'name' => 'Graduado en Ingeniería en Electrónica Industrial y Automática',
            'courses' => 4,
            'type' => 'Universidad',
        ]);

        DB::table('grades')->insert([
            'name' => 'Grado en Ingeniería Aeroespacial',
            'courses' => 4,
            'type' => 'Universidad',
        ]);

        DB::table('grades')->insert([
            'name' => 'Máster Universitario en Ingeniería Informática',
            'courses' => 2,
            'type' => 'Universidad',
        ]);

        DB::table('grades')->insert([
            'name' => 'Máster Universitario en Ingeniería Industrial',
            'courses' => 2,
            'type' => 'Universidad',
        ]);

        DB::table('grades')->insert([
            'name' => 'Máster Universitario en Ingeniería Industrial',
            'courses' => 2,
            'type' => 'Universidad',
        ]);

        DB::table('grades')->insert([
            'name' => 'Doctorado en Inteligencia Artificial',
            'courses' => 5,
            'type' => 'Universidad',
        ]);

         DB::table('grades')->insert([
            'name' => 'Doctorado en Software, Sistemas y Computación',
            'courses' => 5,
            'type' => 'Universidad',
        ]);
    }
}
