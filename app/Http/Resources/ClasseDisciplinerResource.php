<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ClasseResource;
use App\Http\Resources\DisciplineResource;
use App\Http\Resources\AnneeScolaireResource;
use App\Http\Resources\EvaluationResource;

class ClasseDisciplinerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */


public function toArray(Request $request)
{
    return [
        'id' => $this->id,
        'discipline' => new DisciplineResource($this->discipline),
        'classe' => new ClasseResource($this->classe),
        'annee_scolaire' => new AnneeScolaireResource($this->anneeScolaire),
        'evaluation' => new EvaluationResource($this->evaluation),
        'noteMax' => $this->noteMax,
        'etat' => $this->etat,
        
    ];
}
}
