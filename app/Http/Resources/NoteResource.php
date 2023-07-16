<?php

namespace App\Http\Resources;

use App\Http\Resources\ClasseDisciplinerResource;
use App\Http\Resources\inscriptionResource;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // 'id' => $this->id,
            //  'id' => new inscriptionResource($this->inscription),
          
            'type_note'=> $this->classe_discipline->evaluation->libelle,
            'note' => $this->note,
            'noteMax'=> $this->classe_discipline->noteMax
             
         
        ];
    }   
}   
