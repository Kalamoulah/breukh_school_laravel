<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class elevePostrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'bail|required|max:50',
            'prenom' => 'bail|required|max:50',
            'dateNaissance' => 'sometimes|date|before:today-5years',
            // 'dateNaissance' => 'before:'.Carbon::now()->subYear(5)->format('Y-m-d'),
            'lieuNaissance' => 'max:100',
            'sexe'=> 'bail|required',
            'profile'=> 'bail|required',
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom est requis!',
            'prenom.required' => 'le prenom est requis!',
            'dateNaissance.date' => 'date incorrect!',
            'sexe.required'=> 'la date est requis!',
            'profile.required'=> 'le profile est requis!',
        ];
    }
}
