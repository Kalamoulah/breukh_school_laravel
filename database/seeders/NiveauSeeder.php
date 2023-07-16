<?php

namespace Database\Seeders;

use App\Models\Niveau;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NiveauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $niveau =[
            [
            "libelle"=> "ELEMENTAIRE"
            ]  ,
            [
                "libelle"=> "SECONDAIRE INFERIEUR"
            ],
            [
                "libelle"=> "SECONDAIRE SUPERIEUR"
            ]
            ];
         Niveau::insert($niveau);
    }
}