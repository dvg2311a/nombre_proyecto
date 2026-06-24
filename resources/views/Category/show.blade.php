@extends('layouts.app')

@section('content')
    <div class="card flex flex-col justify-center items-center h-auto gap-6 pt-4">
        <div class="flex justify-evenly items-center w-full">
            <a href="{{ route('categories.index') }}"
            class="btn btn-link mt-3 text-white bg-blue-500 p-2 rounded-lg hover:bg-blue-700 transition">Volver</a>
            <h1 class="text-white"><b>Ver categoría</b></h1>
        </div>
        <div class="card-body text-white flex flex-col gap-6">
            <h5 class="card-title text-xl"><b>Nombre:</b> {{ $category->name }}</h5>
            <p class="card-text text-xl"><b>Descripción:</b> {{ $category->description }}</p>
        </div>
    </div>
@endsection

