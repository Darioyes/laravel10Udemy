<?php

namespace App\Http\Requests\category;

use Illuminate\Foundation\Http\FormRequest;


class StoreRequest extends FormRequest
{

    protected function prepareForValidation(): void
    {
        $this->merge([
            //'slug' => Str::slug($this->title),
            //'slug' => Str::of($this->title)->slug(),//->append(_) ej de poder encadenar mas fundiones
            'slug' => str($this->title)->slug(),//->append(_) ej de poder encadenar mas fundiones
        ]);
    }

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
            'title' => 'required|min:5|max:500|unique:categories',
            'slug' => 'required|min:5|max:500|unique:categories',
            
            
        ];
    }
}
