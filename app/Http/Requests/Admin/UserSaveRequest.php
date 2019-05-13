<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserSaveRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
    	if($this->id > 0){
		    $passwordRules = ['nullable','string', 'min:8'];
		    $emailRules = ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$this->id];
	    }else{
		    $passwordRules = ['required','string', 'min:8'];
		    $emailRules = ['required', 'string', 'email', 'max:255', 'unique:users'];
	    }
        return [
	        'name' => ['required', 'string', 'max:255'],
	        'email' => $emailRules,
	        'password' => $passwordRules,
	        'role_id' => ['required', 'numeric', 'exists:roles,id']
        ];
    }
}
