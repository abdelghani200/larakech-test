<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nom' => 'required|alpha',
            'prenom' => 'required|alpha',
            'e_mail' => 'required|email',
            'company.nom' => 'required|alpha',
            'company.code_postal' => 'required|numeric',
            'company.ville' => 'required|alpha',
            'company.statut' => 'required|in:Lead,Client,Prospect',

        ];
    }
}
