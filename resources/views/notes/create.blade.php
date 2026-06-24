@extends('layouts.app')

@section('content')
    <h1>Crear nota</h1>

    <form action="{{ route('notes.store') }}" method="POST" class="ml-40 mt-10">
        @csrf
        <div class="mb-3 flex flex-col gap-4">
            <label class="form-label text-white">Título</label>
            <input name="title" class="form-control w-96" value="{{ old('title') }}">
            @error('title')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3 flex flex-col gap-4">
            <label class="form-label text-white ">Contenido</label>
            <textarea name="content" class="form-control w-96">{{ old('content') }}</textarea>
            @error('content')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3 flex flex-col gap-4">
            <label class="form-label text-white">Categoría</label>
            <select name="category_id" class="form-select w-96">
                <option value="">-- Seleccione --</option>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                <option value=""></option>
            </select>
            @error('category_id')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <button class="btn btn-primary text-white bg-blue-700 p-2 rounded-lg">Guardar</button>
    </form>

@endsection
