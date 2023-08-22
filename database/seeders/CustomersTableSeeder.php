<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('customers')->insert([
            'name' => 'Alonso',
            'email' => 'alonso@cliente.com',
            'address' => 'madre selva 121 - surco',
            'phone_number' => '934094501',
            'document_number' => '77035606',
            'document_type_id' => 1,
            'customer_type_id' => 1,
        ]);
    }
}