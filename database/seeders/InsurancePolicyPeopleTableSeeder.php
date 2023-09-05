<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsurancePolicyPeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('insurance_policy_people')->insert([
            [
                'name' => 'Jorge Leon',
                'document_type_id' => 1,
                'document_number' => 78123450,
                'type_id' => 1,
                'insurance_policy_data_id' => 1,
                'created_at' => now(), 
                'updated_at' => now()
            ]
        ]);
    }
}
