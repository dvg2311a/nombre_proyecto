@extends('layouts.app')

@section('content')
    <h1 class="text-white">{{ $note->title }}</h1>
    <p class="text-white"><strong>Categoría:</strong> {{ optional($note->category)->name }}</p>
    <div class="card">
        <div class="card-body text-white">Descripción: {{ $note->content }}</div>
    </div>

    <a href="{{ route('notes.index') }}" class="btn btn-link mt-3 text-white bg-blue-700 p-2 rounded-lg">Volver</a>
@endsection
