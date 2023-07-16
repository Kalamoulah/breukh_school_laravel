<?php

namespace Database\Seeders;

use App\Models\Semestre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemestreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $semestre = [
            [
                "libelle"=> "trimestre1",
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
