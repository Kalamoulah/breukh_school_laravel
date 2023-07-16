<?php

namespace App\Http\Controllers;

use App\Http\Requests\DisciplineRequest;
use App\Http\Resources\ClasseDisciplinerResource;
use App\Http\Resources\DisciplineResource;
use App\Models\AnneeScolaire;
use App\Models\Classe;
use App\Models\Classe_discipline;
use App\Models\Discipline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $join = $request->input('join');
        if ($join == "") {
            return DisciplineResource::collection(Discipline::all());

        }
         return $this->joinTable(Classe::class, $join);      
    }
 
    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
    {
        $discipline = Discipline::firstOrCreate(

            ['libelle' => $request->libelle],
            ['code' => $request->code]

        );
        
        return $discipline;
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