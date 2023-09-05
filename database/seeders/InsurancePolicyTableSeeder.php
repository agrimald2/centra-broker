<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsurancePolicyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('insurance_policies')->insert([
            ['number' => '0001', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
