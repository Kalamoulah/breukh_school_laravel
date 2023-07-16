<?php

namespace App\Models;

use App\Models\Classe;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Participant extends Model
{
    use HasFactory;


    public function classe() :BelongsTo
    {
        return $this->belongsTo(Classe::class);
    }

    public function event() :BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
    
}
