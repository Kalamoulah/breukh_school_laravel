<?php

namespace App\Http\Controllers;

use App\Http\Resources\NiveauResource;
use App\Models\Niveau;
use App\Traits\JoinQueryParams;
use App\Models\Classe;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\RelationNotFoundException;

class NiveauController extends Controller
{
    use JoinQueryParams;
    /**
     * Display a listing of the resource.
     */


    public function index(Request $request)
    {
        $join = $request->query('join');
           return $join;
        if ($join == "") {
            return NiveauResource::collection(Niveau::all());
        } else {
            return $this->joinTable(Niveau::class, $join);
        }
    }

    public function find(Niveau $niveau)
    {
        //  $niveau = Niveau::find($id);
        return $niveau->load('classes');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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