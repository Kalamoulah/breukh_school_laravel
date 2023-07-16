<?php

namespace Database\Seeders;

use App\Models\Niveau;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            ['libelle' => 'CI', 'niveau_id' => '1'],
            ['libelle' => 'CP', 'niveau_id' => '1'],
            ['libelle' => 'CE1', 'niveau_id' => '1'],
            ['libelle' => 'CE2', 'niveau_id' => '1'],
            ['libelle' => 'CM1', 'niveau_id' => '1'],
            ['libelle' => 'CM2', 'niveau_id' => '1'],
            ['libelle' => '6ieme', 'niveau_id' => '2'],
            ['libelle' => '5ieme', 'niveau_id' => '2'],
            ['libelle' => '4ieme', 'niveau_id' => '2'],
            ['libelle' => '3ieme', 'niveau_id' => '2'],
            ['libelle' => '2nd', 'niveau_id' => '3'],
            ['libelle' => '1iere', 'niveau_id' => '3'],
            ['libelle' => 'Terminale', 'niveau_id' => '3'],
        ];
        DB::table('classes')->insert($classes);
    }
}