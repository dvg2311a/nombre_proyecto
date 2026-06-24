<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|max:100|unique:notes,title,' . $this->route('note'),
            'content' => ['required', 'string', 'min:3'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }
}
