<?php

namespace Database\Seeders;

use App\Models\Evaluation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $evaluation =
            [
                ['libelle' => 'ressource'],
                ['libelle' => 'composition']
            ];
        Evaluation::insert($evaluation);
    }
}