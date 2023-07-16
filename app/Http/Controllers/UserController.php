<?php

namespace App\Http\Controllers;


use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use \Illuminate\Database\Eloquent\ModelNotFoundException;


use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserResource::collection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return User::firstOrCreate([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "role" => $request->role,
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        try {
            return $user;
        } catch (ModelNotFoundException $e) {
            return response()->json(['me' => 'Utilisateur non trouvé.'], 404);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
{
    $foundUser = User::find($user->id);
    return $foundUser;
    // if (!$foundUser) {
    //     return response()->json(['error' => 'Utilisateur non trouvé'], 404);
    // }

    // $foundUser->delete();

    // return response()->json(['message' => 'Utilisateur supprimé avec succès']);
}

}