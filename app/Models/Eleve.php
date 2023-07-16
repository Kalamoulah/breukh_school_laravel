<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;


class Eleve extends Model
{
    use HasFactory, Notifiable;


    public function __construct()
    {
        $this->statut = 1;
        $this->numero = $this->generateNumber();
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }

    public function classes()
    {
        return $this->belongsToMany(Classe::class, 'inscriptions');
    }

    private function generateNumber()
    {
        $last = DB::table('eleves')->orderBy('numero', 'desc')->pluck('numero')->first();
        $lastid = $last + 1;
        $elevesAbandonnes = DB::table('eleves')->where('statut', )->orderBy('numero', 'asc')->get();
        foreach ($elevesAbandonnes as $eleveAbandonne) {
            $elevesNonAbandonnes = DB::table('eleves')->where('numero', $eleveAbandonne->numero)->where('statut', 1)->count();
            if ($elevesNonAbandonnes == 0) {
                $numero = $eleveAbandonne->numero;
                return $numero;
            }
        }
        return $lastid;
    }

    protected $guarded = [
        'id'
    ];

    public function scopeSortie(Builder $builder, array $idEleves, $statut)
    {
        return $builder->whereIn('id', $idEleves)->update(["statut" => $statut]);

    }

}