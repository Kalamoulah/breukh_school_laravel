<?php

namespace App\Models;

use App\Models\Classe_discipline;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Niveau;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Classe extends Model
{
    use HasFactory;

    public function niveau() : BelongsTo
    {
        return $this->belongsTo(Niveau::class);
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }

        public function eleves() 
        {
            return $this->belongsToMany(Eleve::class, 'inscriptions');
        }

    public function Classediscipline(): HasMany
    {
        return $this->hasMany(Classe_discipline::class);
    }

}
