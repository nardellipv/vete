<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        $categories = [
            ['name' =>'Otros - Otros'],
            ['name' =>'Otros - Calentadores'],
            ['name' =>'Otros - Terrarios'],
            ['name' =>'Otros - Piedras Sanitarias'],
            ['name' =>'Medicamentos - Gastroenterología'],
            ['name' =>'Medicamentos - Vacunas'],
            ['name' =>'Medicamentos - Antiparasitarios'],
            ['name' =>'Medicamentos - Antibióticos'],
            ['name' =>'Medicamentos - Antiinflamatorios - Analgésicos - Antipiréticos'],
            ['name' =>'Medicamentos - Hormonales'],
            ['name' =>'Medicamentos - Vitaminas'],
            ['name' =>'Medicamentos - Desinfectantes'],
            ['name' =>'Medicamentos - Suplementos'],
            ['name' =>'Medicamentos - Tónicos'],
            ['name' =>'Medicamentos - Otros'],
            ['name' =>'Medicamentos - Oftalmología'],
            ['name' =>'Medicamentos - Cardiología'],
            ['name' =>'Medicamentos - Dermatología'],
            ['name' =>'Medicamentos - Oncología'],
            ['name' =>'Medicamentos - Anestesiología y algiología'],
            ['name' =>'Descartables - Contenedores y tubos'],
            ['name' =>'Descartables - Instrumental'],
            ['name' =>'Descartables - Collares Isabelinos'],
            ['name' =>'Descartables - Clavos y prótesis'],
            ['name' =>'Descartables - Lencería Cirugía'],
            ['name' =>'Descartables - Sondas'],
            ['name' =>'Descartables - Otros'],
            ['name' =>'Descartables - Palomillas de punción'],
            ['name' =>'Descartables - Suturas'],
            ['name' =>'Descartables - Guantes'],
            ['name' =>'Descartables - Apósitos y algodón'],
            ['name' =>'Descartables - Cinta de tela'],
            ['name' =>'Descartables - Vendas y Ortopedia'],
            ['name' =>'Descartables - Jeringas'],
            ['name' =>'Descartables - Tapones'],
            ['name' =>'Descartables - Agujas'],
            ['name' =>'Descartables - Fluidoterapia y Transfusión'],
            ['name' =>'Descartables - Material biopsia'],
            ['name' =>'Descartables - Catéteres'],
            ['name' =>'Servicios - Práctica Médica'],
            ['name' =>'Servicios - Castración'],
            ['name' =>'Servicios - Cremación'],
            ['name' =>'Servicios - Labotatorio'],
            ['name' =>'Servicios - Ortopedia'],
            ['name' =>'Servicios - Hospitalización'],
            ['name' =>'Servicios - Cirugía'],
            ['name' =>'Servicios - Otros'],
            ['name' =>'Servicios - Profilaxis Dental'],
            ['name' =>'Servicios - Rayos y Ultrasonido'],
            ['name' =>'Servicios - Consultas'],
            ['name' =>'Servicios - Anestesia'],
            ['name' =>'Alimentos - Alimento para Gatos'],
            ['name' =>'Alimentos - Otros'],
            ['name' =>'Alimentos - Aves'],
            ['name' =>'Alimentos - Golosinas para Gatos'],
            ['name' =>'Alimentos - Peces'],
            ['name' =>'Alimentos - Reptiles y Anfibios'],
            ['name' =>'Alimentos - Alimento para Perros'],
            ['name' =>'Alimentos - Golosinas para Perros'],
            ['name' =>'Accesorios - Accesorios para Peceras'],
            ['name' =>'Accesorios - Incubadoras'],
            ['name' =>'Accesorios - Otros'],
            ['name' =>'Accesorios - Ropa para Perros'],
            ['name' =>'Accesorios - Jaulas'],
            ['name' =>'Accesorios - Accesorios para caballos'],
            ['name' =>'Accesorios - Indumentaria para caballos'],
            ['name' =>'Accesorios - Jaulas'],
            ['name' =>'Accesorios - Comederos y Bebederos'],
            ['name' =>'Accesorios - Cuchas y Transportadoras'],
            ['name' =>'Accesorios - Juguetes para perros'],
            ['name' =>'Accesorios - Peceras'],
            ['name' =>'Accesorios - Camas y Colchones'],
            ['name' =>'Accesorios - Accesorios para Perros'],
            ['name' =>'Accesorios - Juguetes para gatos'],
            ['name' =>'Accesorios - Objetos de Adiestramiento'],
            ['name' =>'Animales - Gatos'],
            ['name' =>'Animales - Hamsters'],
            ['name' =>'Animales - Aves'],
            ['name' =>'Animales - Cobayos'],
            ['name' =>'Animales - Chinchillas'],
            ['name' =>'Animales - Otros'],
            ['name' =>'Animales - Peces'],
            ['name' =>'Animales - Caballos y Yeguas'],
            ['name' =>'Animales - En Adopción'],
            ['name' =>'Animales - Perros'],
            ['name' =>'Peluqueria - Otros'],
            ['name' =>'Peluqueria - Estética y cuidado de gatos'],
            ['name' =>'Peluqueria - Shampoo'],
            ['name' =>'Peluqueria - Estética y Cuidado perros'],

            ];

        foreach ($categories as $category) {
            \App\Category::create($category);
        }
    }
}
