<?php

namespace App\Http\Controllers;

use App\Models\AnneeScolaire;
use App\Models\Classe_discipline;
use App\Models\Note;

use App\Models\Inscription;
use App\Models\Eleve;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NoteController extends Controller
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


    public function store(Request $request, $classe, $disc, $evals)
    {
        $idCurrentYear = AnneeScolaire::latest()->first()->id;

        $datas = $request->input('data');

        if (!is_array($datas)) {
            return response()->json(['error' => 'Les données doivent être fournies sous forme de tableau d\'objets']);
        }
        foreach ($datas as $data) {

            if (!isset($data['eleve_id'], $data['note'])) {
                return response()->json(['error' => 'Les données doivent contenir eleve_id et note pour chaque objet']);
            }

            $inscription = Inscription::join('eleves', 'eleves.id', '=', 'inscriptions.eleve_id')
                ->where('inscriptions.eleve_id', $data['eleve_id'])
                ->where('inscriptions.classe_id', $classe)
                ->where('inscriptions.annee_scolaire_id', $idCurrentYear)
                ->first();


            if (!$inscription) {
                return response()->json(['message' => 'inscription..non trouvée' . $data['eleve_id']]);
            }



            $classeDiscipline = Classe_Discipline::where('classe_id', $classe)
                ->where('discipline_id', $disc)
                ->where('evaluation_id', $evals)
                ->firstOrFail();


            $note = new Note();
            $note->classe_discipline_id = $classeDiscipline->id;
            $note->inscription_id = $inscription->id;
            $note->note = $data['note'];
            $note->save();
        }
        return response()->json([
            "message" => 'note  inserer ',
            "status" => Response::HTTP_OK,
            "eleve" => $note,
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
    public function update(Request $request, string $classe, $disc, $evals, $eleve)
    {
        $newNote = $request->new_note;
        $classeDiscipline = Classe_Discipline::where('classe_id', $classe)
            ->where('discipline_id', $disc)
            ->where('evaluation_id', $evals)
            ->firstOrFail()->id;

        $id_inscription = Inscription::where('eleve_id', $eleve)
            ->where('annee_scolaire_id', 3)
            ->first()->id;
            
        $noteStudent = Note::where('inscription_id', $id_inscription)
            ->where('classe_discipline_id', $classeDiscipline)
            ->first()->update(["note" => $newNote]);
        return $noteStudent;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}