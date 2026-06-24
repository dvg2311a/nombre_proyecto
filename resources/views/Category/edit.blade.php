@extends('layouts.app')

@section('content')
    <h1>Editar categoría</h1>

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label text-white">Nombre</label>
            <input name="name" class="form-control" value="{{ old('name', $category->name) }}">
            @error('name')
                <div class="text-danger text-red-400">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label text-white">Descripción</label>
            <textarea name="description" class="form-control">{{ old('description', $category->description) }}</textarea>
            @error('description')
                <div class="text-danger text-red-400">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary text-white bg-blue-700 p-2 rounded-lg">Actualizar</button>
    </form>
@endsection
