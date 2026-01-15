<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
      public function run(): void
    {
        DB::table('categorias')->insert([
            [
                'nombre' => 'Prueba1',
                'descripcion' => 'Descripcion prueba 1',
                'img' => 'prueba.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'Prueba2',
                'descripcion' => 'Descripcion de prueba 2',
                'img' => 'prueba.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ]);
    }
}
