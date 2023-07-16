<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EleveResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nom'=>$this->nom,
            'prenom'=>$this->prenom,
            'dateNaissance'=>$this->dateNaissance,
            'lieuNaissance'=>$this->lieuNaissance,
           
        ];
    }
}
