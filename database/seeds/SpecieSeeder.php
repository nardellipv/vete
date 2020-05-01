<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('species')->delete();

        $species = [
            ['name' => 'Caninos'],
            ['name' => 'Felinos'],
            ['name' => 'Aves'],
            ['name' => 'Caballos'],
            ['name' => 'Conejos'],
            ['name' => 'Peces'],
            ['name' => 'Reptiles y Anfibios'],
            ['name' => 'Roedores'],
            ['name' => 'Otro'],
        ];

        foreach ($species as $specie) {
            \App\Specie::create($specie);
        }
    }
}
