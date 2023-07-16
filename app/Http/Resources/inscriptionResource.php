<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class inscriptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'eleve'=> $this->eleve,
            "annee"=>$this->anneeScolaire->libelle,
            "date"=>$this->date,
            // "note"=> NoteResource::collection($this->note)
            // 'classe'=>new ClasseResource($this->classe),
            // 'annee'=>new AnneeScolaireResource($this->anneScolaire)
        ];
    }
}
