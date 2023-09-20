<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DocumentTypesTableSeeder::class,
            CustomerTypesTableSeeder::class,
            UsersTableSeeder::class,
            CustomersTableSeeder::class,
            InsuranceCompaniesTableSeeder::class,
            InsurancePoliciesStatusesTableSeeder::class,
            AssetsTypeTableSeeder::class,
            AssetsTypesAttributesTableSeeder::class,
            //InsurancePolicyTableSeeder::class,
            //InsurancePolicyPeopleTableSeeder::class,
            GeneralSettingsTableSeeder::class,
            DriversTableSeeder::class,
            WorkshopsTableSeeder::class,
            ExecutivesTableSeeder::class,
            BanksTableSeeder::class,
        ]);
    }
}
