<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class EditPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => "min:3",
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'min:3',
            'post_id' => 'required|exists:posts,id'
        ];
    }
}