<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('document_types')->insert([
            ['name' => 'DNI'],
            ['name' => 'Carnet Extranjería'],
            ['name' => 'RUC'],
        ]);
    }
}
