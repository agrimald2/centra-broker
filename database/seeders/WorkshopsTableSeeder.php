<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkshopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('workshops')->insert([
            [
                'name' => 'El Mecani Crack',
                'address' => 'Av. Caminos del inca 2022',
                'responsible_name' => 'Juan Mecanico',
                'responsible_phone_number' => '934064587',
            ],
            [
                'name' => 'Tu carro lo curo',
                'address' => 'Av. Privamera 123',
                'responsible_name' => 'Rodrigo Mecanico',
                'responsible_phone_number' => '934064582',
            ],
        ]);
    }
}
