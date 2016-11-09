<?php

namespace App\Http\Requests;

class ContactRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [      
            'email' => 'bail|required|email',    
        ];
    }
}
