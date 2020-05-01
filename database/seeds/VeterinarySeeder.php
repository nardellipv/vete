<?php

use App\Veterinarian;
use Illuminate\Database\Seeder;

class VeterinarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Veterinarian::class, 10)->create();
    }
}
