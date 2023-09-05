<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetsTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('assets_types')->insert([
            ['name' => 'Carro'],
            ['name' => 'Casa'],
            ['name' => 'Depa'],
        ]);
    }
}
