<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EspecieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('especies')->insert([
            'nombre'=>'Bovino',
            'descripcion'=>''
        ]);
        DB::table('especies')->insert([
            'nombre'=>'Equino',
            'descripcion'=>''
        ]);
        DB::table('especies')->insert([
            'nombre'=>'Ovino',
            'descripcion'=>''
        ]);
        DB::table('especies')->insert([
            'nombre'=>'Caprino',
            'descripcion'=>''
        ]);
        DB::table('especies')->insert([
            'nombre'=>'Porcino',
            'descripcion'=>''
        ]);
        DB::table('especies')->insert([
            'nombre'=>'Colmena',
            'descripcion'=>''
        ]);
    }
}
