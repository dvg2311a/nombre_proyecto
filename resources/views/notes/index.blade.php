@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4 text-white ml-4">
        <h1 class="mb-4">Notas</h1>
        <a href="{{ route('notes.create') }}"
            class="btn btn-primary text-white bg-blue-500 p-2 rounded-lg mt-4 hover:bg-blue-800 transition">Nueva
            nota</a>
    </div>

    <table class="min-w-full divide-y divide-gray-200 text-white">
        <thead>
            <tr>
                <th>#</th>
                <th>Título</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        {{-- Estilos para poner una cuadricula en la tabla --}}
        <tbody class="divide-y divide-gray-600 default:divide-gray-700 divide-x *:divide-gray-600">
            @foreach ($notes as $note)
                <tr>
                    <td class="text-center">{{ $note->id }}</td>
                    <td class="text-center">{{ $note->title }}</td>
                    <td class="text-center">

                        {{ optional($note->category)->name }}

                    </td>
                    <td class="flex gap-4 justify-center">
                        <a href="{{ route('notes.show', $note) }}" class="btn btn-sm btn-secondary text-blue-500">Ver</a>
                        <a href="{{ route('notes.edit', $note) }}" class="btn btn-sm btn-warning text-green-500">Editar</a>
                        <form action="{{ route('notes.destroy', $note) }}" method="POST" style="display:inline-block"
                            onsubmit="return confirm('Eliminar?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger text-red-500">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
