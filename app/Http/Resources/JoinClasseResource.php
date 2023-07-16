<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JoinClasseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          "inscription"=> new inscriptionResource($this->inscription),   
          "classe_discipline" =>  new inscriptionResource($this->inscription)
        ];
    }
}
