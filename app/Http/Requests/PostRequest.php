<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'max:255'],
            'content' => ['required'],
            'category_id' => ['required'],
            'tags' => ['required'],
            'image' => ['image', 'mimes:png,jpg,jpeg,svg,gif', 'max:2048', 'nullable'],
        ];
    }
}
