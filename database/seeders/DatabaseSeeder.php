<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categoria;
use App\Models\MetodoPago;
use App\Models\Producto;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Usuario::factory(10)->create();
        //Categoria::factory(5)->create();
        //MetodoPago::factory(4)->create();
        Producto::factory(20)->create();
    }
}
