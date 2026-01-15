<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('productos')->insert([
            [
                'nombre' => 'Laptop Lenovo',
                'descripcion' => 'Laptop para trabajo y estudio',
                'precio' => 18500.00,
                'cantidad' => 10,
                'categoria_id' => 21,
                'img' => 'prueba.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'Smartphone Samsung',
                'descripcion' => 'Teléfono inteligente Android',
                'precio' => 12500.00,
                'cantidad' => 15,
                'categoria_id' => 21,
                'img' => 'prueba.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ]);
    }
}
