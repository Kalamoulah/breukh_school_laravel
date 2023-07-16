<?php

use App\Http\Controllers\AnneeScolaireController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\EleveController;

use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NiveauController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|cl
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('annee', AnneeScolaireController::class)->only(['index', 'store']);
    Route::get('niveaux', [NiveauController::class, 'index']);

    Route::get('niveaux/{niveau}', [NiveauController::class, 'find']);

    Route::apiResource('eleves', EleveController::class)->only(['store']);

    Route::apiResource('classe', ClasseController::class)->only(['index', 'store']);

    Route::apiResource('discipline', DisciplineController::class)->only(['index', 'store']);

    Route::apiResource('evaluation', EvaluationController::class)->only(['index', 'store']);

    Route::apiResource('evenement', EventController::class)->only(['index', 'store']);

    Route::get('classe/{classe}', [EleveController::class, 'index']);

    Route::get('classes/{classe}/coef', [ClasseController::class, 'getDisciplineByIdClasse']);

    Route::post('classes/{classe}/coef', [ClasseController::class, 'insertInClasseDiscipline']);

    Route::put('eleves/sortie', [EleveController::class, 'sortie']);

    Route::post('classes/{classe}/disciplines/{disc}/evals/{evals}', [NoteController::class, 'store']);

    Route::post('evenement/{idEvent}/participant', [ParticipantController::class, 'store']);

    Route::put('classe/{classe}/discipline/{disc}/evals/{evals}/eleve/{eleve}', [NoteController::class, 'update']);

    Route::get('classe/{classe}/notes', [ClasseController::class, 'geNoteByIdClasse']);

    Route::get('classe/{classe}/notes/eleves/{eleve}', [ClasseController::class, 'getNoteEleveByIdClasse']);

    Route::get('classe/{classe}/discipline/{disc}/note', [ClasseController::class, 'getNotebyIdDiscipline']);

    Route::get('/events/{id}', [EventController::class, 'show']);

    Route::delete('user/{user}/logout', [AuthController::class, 'logout']);

    Route::apiResource('user', UserController::class)->only(['index', 'store','update', 'show', 'destroy']);
  
});

Route::post('/login', [AuthController::class, 'loginUser']);