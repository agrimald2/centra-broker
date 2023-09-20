<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExecutivesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('executives')->insert([
            [
                'name' => 'Hombre de negocios',
                'phone_number' => '98745512',
                'email' => 'ejecutivo1@centra.pe',
            ],
            [
                'name' => 'Ejecutivo genio',
                'phone_number' => '98745511',
                'email' => 'ejecutivo2@centra.pe',
            ],
        ]);
    }
}
