<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return Event::all();

        //  $join = $request->input('join');
        
        //  if ($join == "") {
        //      return ClasseResource::collection(Classe::all());
        //  } else {
        //      return $this->joinTable(Classe::class, $join);
        //  }
 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $event = Event::create([
        "libelle" => $request->libelle,
        "user_id" => $request->user_id,
        "date_event" => $request->date,
        "desciption" => $request->description
        ]);

        return [
            "message" => 'evenement inserer ',
            "status" => Response::HTTP_OK,
            "evenement" => $event,
        ];
       
       
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $event = Event::find($id);

        return view('show', compact('event'));
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
