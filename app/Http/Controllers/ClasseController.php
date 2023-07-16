<?php

namespace App\Http\Controllers;

use App\Http\Requests\DisciplineRequest;
use App\Http\Resources\ClasseDisciplinerResource;
use App\Http\Resources\ClasseResource;
use App\Http\Resources\inscriptionResource;
use App\Http\Resources\NoteResource;
use App\Models\AnneeScolaire;
use App\Models\Classe;
use App\Models\Classe_discipline;
use App\Models\Discipline;
use App\Models\Eleve;
use App\Models\Event;
use App\Models\Inscription;
use App\Models\Note;
use App\Models\Participant;
use App\Traits\JoinQueryParams;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class ClasseController extends Controller
{

    use JoinQueryParams;
    /**
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $join = $request->input('join');
       if ($join == "") {
        return ClasseResource::collection(Classe::all());
       }
        return $this->joinTable(Classe::class, $join);      
        
    }
    

    public function getDisciplineByIdClasse($classe)
    {
        $data = Classe_discipline::with(['discipline', 'classe', 'anneeScolaire', 'evaluation'])
            ->where('classe_id', $classe)
            ->get();
        return ClasseDisciplinerResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $classe)
    {
        // Vérifier si la classe existe
    }

    public function insertInClasseDiscipline(Request $request, $classe)
    {
        $classeExist = Classe::find($classe);
        if (!$classeExist) {
            return response()->json(['message' => 'La classe n\'existe pas'], Response::HTTP_NOT_FOUND);
        }
        $latestAnneeScolaire = AnneeScolaire::latest()->first()->id;
        $classeDiscipline = Classe_discipline::create([
            'discipline_id' => $request->input("discipline"),
            'annee_scolaire_id' => $latestAnneeScolaire,
            'classe_id' => $classe,
            'evaluation_id' => $request->input("evaluation"),
            'noteMax' => $request->input("noteMax")
        ]);
        return new ClasseDisciplinerResource($classeDiscipline);
    }

    public function geNoteByIdClasse($classe)
    {
        $note = [];
        $inscriptions = Inscription::where('classe_id', $classe)
            ->where('annee_scolaire_id', 3)
            ->get();
        $datas = Classe_discipline::where('classe_id', $classe)
            ->where('annee_scolaire_id', 3)
            ->get();
        foreach ($inscriptions as $inscription) {
            // return $inscription['id'];
            foreach ($datas as $data) {

                $allnote = Note::where('inscription_id', $inscription->id)
                    ->where('classe_discipline_id', $data->id)
                    ->get();
                array_push($note, $allnote);
            }
        }
        return $note;
    }

  

    public function getNotebyIdDiscipline($classe, $disc)
    {
        $allNote = [];
        $datas = Classe_discipline::where('classe_id', $classe)
            ->where('discipline_id', $disc)
            ->where('annee_scolaire_id', 3)
            ->get()->pluck('id');
        $newNote = new Note();
        $notes = NoteResource::collection($newNote->whereIn("classe_discipline_id", $datas)->get())->groupBy("inscription_id");
        // return $notes;
        $noteEleves = [];
        foreach ($notes as $note => $value) {
          
            $inscription = Inscription::where("id", $note)->first();
            // return $eleve;
            $noteEleve = [
                "eleve" => $inscription->eleve,
                "note"=> $notes[$note],
        
            ];
            array_push($noteEleves, $noteEleve);
        }
        return $noteEleves;

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