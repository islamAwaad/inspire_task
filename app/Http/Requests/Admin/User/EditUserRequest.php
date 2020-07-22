<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
        $request= $this->request->all();
        return [
            'name' => 'min:3',
            'email' => 'email|unique:users,email,'. $request['user_id'],
            'password' => 'confirmed'
        ];
    }
}