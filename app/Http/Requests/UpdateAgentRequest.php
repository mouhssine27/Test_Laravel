<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAgentRequest extends FormRequest
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
                'nomAgent' => 'required',
                'username' => 'required',
                'emailAgent' =>'required',
                'roleAgent' =>'required',
                'passwordAgent' =>'required',
            ];
        
    }
}
