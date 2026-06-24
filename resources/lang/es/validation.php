<?php

return [
    'required' => 'El campo :attribute es obligatorio',
    'string' => 'El campo :attribute debe ser una cadena de texto',
    'max' => [
        'string' => 'El campo :attribute no debe superar :max caracteres',
    ],
    'min' => [
        'string' => 'El campo :attribute no puede ser menor a :min caracteres',
    ],
    'unique' => 'El campo :attribute ya existe'
    ,
    // Traducción para los nombres de los campos de la BD
    'attributes' => [
        'name' => 'nombre',
        'description' => 'descripción',
        'content' => 'contenido',
    ],
];
