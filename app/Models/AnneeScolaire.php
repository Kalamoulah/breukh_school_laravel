<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AnneeScolaire extends Model
{
    use HasFactory;
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }

    protected  $guarded = [
        'id'
    ];
}
