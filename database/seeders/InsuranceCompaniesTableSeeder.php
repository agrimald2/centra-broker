<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsuranceCompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('insurance_companies')->insert([
            ['name' => 'Rimac'],
            ['name' => 'Pacífico'],
            ['name' => 'La Positiva'],
        ]);
    }
}
