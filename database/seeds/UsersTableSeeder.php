<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Yassine',
            'email' => 'ydaoud00@estudiantes.unileon.es',
            'password' => bcrypt('123456'),
            'role' => 'Admin',
            'center_id' => NULL,
            'grade_id' => NULL,
            'course' => NULL,
        ]);
    }
}
