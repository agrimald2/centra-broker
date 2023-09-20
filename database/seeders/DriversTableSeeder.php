<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriversTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('drivers')->insert([
            [
                'name' => 'Conductor 1',
                'document_type_id' => 1,
                'document_number' => 7954615,

            ],
            [
                'name' => 'Conductor 2',
                'document_type_id' => 1,
                'document_number' => 7954616,

            ],
            [
                'name' => 'Conductor 3',
                'document_type_id' => 1,
                'document_number' => 7954617,

            ],

        ]);
    }
}
