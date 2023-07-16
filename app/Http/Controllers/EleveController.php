<?php

namespace App\Http\Controllers;

use App\Http\Requests\elevePostrequest;
use App\Http\Resources\ClasseDisciplinerResource;
use App\Http\Resources\inscriptionResource;
use App\Models\AnneeScolaire;
use App\Models\Classe;
use App\Models\Inscription;
use Illuminate\Http\Request;
use App\Models\Eleve;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request , $classe)
    {
        $join = $request->input('join');
        if ($join == "") {
            return inscriptionResource::collection(Inscription::where('classe_id', $classe)->get());
        }
         return $this->joinTable(Classe::class, $join);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->only(['nom', 'prenom', 'dateNaissance', 'lieuNaissance', 'sexe', 'profile']);
        dd($data);
        $eleve = Eleve::create($data);
        

        $classe_id = $request->classe_id;
        $anneeScolaireId = AnneeScolaire::latest()->first()->id;
       

        $inscription = new Inscription();
        $inscription->eleve_id = $eleve->id;
        $inscription->date = now();
        $inscription->classe_id = $classe_id;
        $inscription->annee_scolaire_id = $anneeScolaireId;
        $inscription->save();

        return [
            "message" => 'insertion reussi ',
            "status" => Response::HTTP_OK,
            "eleve" => new inscriptionResource($inscription),
        ];
    }

    public function sortie(Request $request)
    {
        $idEleves = $request->idEleves;
        $statut = $request->statut;

        return Eleve::sortie($idEleves,$statut);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}