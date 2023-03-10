<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProprietaireRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom' => 'required',
            'prenom' => 'required',
            'gendre' =>'required',
            'nationalite' =>'required',
            'typeIdentite' => 'required',
            'numIdentite' =>'required' ,
            'adresse' => 'required',
            'photoIdentite'=>'image|max:1024|mimes:jpeg,png,jpg'
        ];
    }
}
