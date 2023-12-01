<?php

namespace App\Http\Requests\post;

use Illuminate\Foundation\Http\FormRequest;

class editRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:5|max:500|unique:posts,slug,'.$this->route('post')->id,
            'slug' => 'required|min:5|max:500|unique:posts,slug,'.$this->route('post')->id,
            'content' => 'required|min:7',
            'category_id' => 'required|integer|exists:categories,id',
            'description' => 'required|min:7',
            'posted' => 'required',
            'image'=>'mimes:jpeg,jpg,png|image|max:100240'
        ];
    }
}
