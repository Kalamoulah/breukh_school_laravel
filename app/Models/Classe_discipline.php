<?php

namespace App\Models;

use App\Models\Classe;
use App\Models\Evaluation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classe_discipline extends Model
{
    use HasFactory;

    public function Discipline(): BelongsTo
    {
        return $this->belongsTo(Discipline::class);
    }
        public function classe(): BelongsTo
        {
            return $this->belongsTo(Classe::class);
        }
    public function Evaluation(): BelongsTo
    {
        return $this->belongsTo(Evaluation::class);
    }
     public function anneeScolaire()
    {
        return $this->belongsTo(AnneeScolaire::class, 'annee_scolaire_id');
    }

    public function notes() : HasMany
    {
        return $this->hasMany(Note::class);
    }

    protected $guarded = [
        'id'
    ];

}
