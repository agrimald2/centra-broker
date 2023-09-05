<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetsTypesAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('assets_types_attributes')->insert([
            [
                'assets_type_id' => 1,
                'name' => 'Placa',
                'input_type' => 'text',
                'description' => 'Placa del auto',
                'example' => 'ABC-123',
            ],
        ]);
    }
}
