<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function loginUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required"
        ]);

        if ($validator->fails()) {
            return Response(["message" => $validator->errors()], 401);
        }

        if (Auth::attempt($request->all())) {
            $user = Auth::user();

            $success = $user->createToken('MyApp')->plainTextToken;

            return Response([
                'token' => $success,
                'user' => new UserResource($user)
            ], 200);
        }

        return Response([
            "message" => "password ou email erroné"
        ]);
    }

    public function logout($user)
    {
        if (Auth::check() && Auth::id() == $user) {
            Auth::logout();
            return response()->json(['message' => 'Utilisateur déconnecté'], Response::HTTP_OK);
        } 
        return response()->json(['message' => 'Échec de la déconnexion'], Response::HTTP_UNAUTHORIZED);
    }
}