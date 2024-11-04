<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class postStoreRequest extends FormRequest
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
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
            'category_id' => 'required'
        ];
    }

    public function messages(): array
    {
    return [
        'title.required' => 'Title field is required',
        'content.required' => 'The content is required',
        'category_id.required' => 'Choose category'
        ];
    }
}
