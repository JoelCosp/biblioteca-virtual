<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Importamos las librerias necesarias
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // En cada iteracion del bucle for, creamos un registro random en la tabla
        for ($x = 0; $x <= 20; $x++) {
            DB::table('books')->insert([
                'title' => Str::random(10),
                'author' => Str::random(10),
                'description' => Str::random(255),
                'img' => Str::random(255),
                'user_id' => 1,
            ]);
        }
    }
}
