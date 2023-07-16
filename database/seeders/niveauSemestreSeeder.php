<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class niveauSemestreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $semestre = [
            [
                "semestre_id"=> 1,
                "niveau_id"=>""
            ],
            [
                "libelle"=> "trimestre2",  
            ],
            [
                "libelle"=> "trimestre3",
             
            ]
        ];
        Semestre::insert($semestre);
    }
}
