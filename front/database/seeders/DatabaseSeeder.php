<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Admin",
            'email' => "admin@test.cl",
            'password' => "admin",
            'lastAnswer' => NULL,
            'rol' => "1"
        ]);

        DB::table('users')->insert([
            'name' => "User",
            'email' => "user@test.cl",
            'password' => "user",
            'lastAnswer' => NULL,
            'rol' => "2"
        ]);

        DB::table('questions')->insert([
            'question' => "¿Qué te gustaría que agregáramos al informe?",
            'question_type' => "open"
        ]);

        DB::table('questions')->insert([
            'question' => "¿La información es correcta?",
            'question_type' => "yes-no"
        ]);

        DB::table('questions')->insert([
            'question' => "¿Del 1 al 5, es rápido el sitio?",
            'question_type' => "scale"
        ]);
    }
}
