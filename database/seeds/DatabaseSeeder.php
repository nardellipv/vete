<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProvinceSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(VeterinarySeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(SpecieSeeder::class);
        $this->call(PatientSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(StockSeeder::class);
        $this->call(SaleSeeder::class);
        $this->call(TaskSeeder::class);
    }
}
