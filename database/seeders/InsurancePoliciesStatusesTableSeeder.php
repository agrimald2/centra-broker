<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsurancePoliciesStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('insurance_policies_statuses')->insert([
            ['name' => 'Activo'],
            ['name' => 'Dado de baja'],
            ['name' => 'Vencido'],
        ]);
    }
}
