<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;



class CategoryRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        /* Se compara la existencia del valor que proviene de la actualización
        Si no existe, entonces se deja nulo, lo que permite que se muestre el mensaje,
        pero como existe, entonces se ignora el nombre existente, actualiza y muestra el mensaje*/
        $categoryId = $this->route('category') ? $this->route('category')->id : null;

        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:50',
                Rule::unique('categories', 'name')->ignore($categoryId),
            ],
            'description' => ['nullable', 'string', 'min:3', 'max:100'],
        ];
    }
}
