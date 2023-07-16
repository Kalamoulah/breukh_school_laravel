<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Event;
use App\Models\Participant;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $idEvent)
    {
        $classeIds = $request->classeids;


        if (!Event::find($idEvent)) {
            return [
                "message" => "l'evenement n'existe pas ",
                "status" => Response::HTTP_NOT_FOUND,
            ];
        }

        foreach ($classeIds as $classeId) {

            if (!Classe::find($classeId)) {
                return [
                    "message" => "la classe n'existe pas ",
                    "status" => Response::HTTP_NOT_FOUND,
                ];
            }
            
            $participant = new Participant();
            $participant->classe_id = $classeId;
            $participant->event_id = $idEvent;
            $participant->save();
        }
  

        return response()->json([
            "message" => "association de l'evenement à/aux classe(s)  ",
            "status" => Response::HTTP_OK,
            "eleve" => $participant,
        ]);


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
        //put
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}