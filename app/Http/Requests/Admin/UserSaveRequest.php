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
        return [
	        'name' => ['required', 'string', 'max:255'],
	        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
	        'password' => ['string', 'min:8'],
	        'role_id' => ['required', 'numeric', 'exists:roles,id']
        ];
    }
}
