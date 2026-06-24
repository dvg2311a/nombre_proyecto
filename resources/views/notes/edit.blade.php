@extends('layouts.app')

@section('content')
    <h1>Editar nota</h1>

    <form action="{{ route('notes.update', $note) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Título</label>
            <input name="title" class="form-control" value="{{ old('title', $note->title) }}">
            @error('title')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Contenido</label>
            <textarea name="content" class="form-control">{{ old('content', $note->content) }}</textarea>
            @error('content')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Categoría</label>
            <select name="category_id" class="form-select">
                <option value="">-- Seleccione --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $note->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <button class="btn btn-primary">Actualizar</button>
    </form>

@endsection
