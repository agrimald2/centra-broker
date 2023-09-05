<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('general_settings')->insert([
            [
                'comission' => '12',
                'right_of_emission' => '3',
                'igv' => '18',
            ],
        ]);
    }
}
