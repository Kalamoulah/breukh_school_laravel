<?php

namespace App\Models;

use App\Models\Classe_discipline;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Discipline extends Model
{
    use HasFactory;

    public function Classeiscipline(): HasMany
    {
        return $this->hasMany(Classe_discipline::class);
    }
    protected $fillable = [
        'libelle',
        'code',
        // 'discipline_id'
    ];

}
