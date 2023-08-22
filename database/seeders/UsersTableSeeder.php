<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrador Principal',
            'email' => 'admin@admin.com',
            'document_type_id' => 1,
            'document_number' => '77035606',
            'phone_number' => '934094501',
            'password' => Hash::make('password'),
        ]);
    }
}
