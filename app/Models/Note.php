<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    public function classe_discipline()
    {
        return $this->belongsTo(Classe_discipline::class);
    }

    public function inscription()
    {
        return $this->belongsTo(Inscription::class);
    }

    protected $fillable = ['classe_discipline_id', 'inscription_id', 'note'];
}
