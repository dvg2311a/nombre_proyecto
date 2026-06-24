<x-app-layout>

    @section('content')
        <div class="d-flex justify-center align-items-center mb-3 ml-4">
            {{-- ? White si es modo oscuro --}}
            <h1 class="text-white mb-4">Categorías</h1>
            <a href="{{ route('categories.create') }}" class="text-white bg-blue-500 p-2 rounded-lg hover:bg-blue-800 transition">
                Agregar Nueva categoría
            </a>
        </div>

        <div class="mt-6 p-2">
            <table class="min-w-full divide-y divide-gray-200 text-white">
                <thead>
                    <tr>

                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="text-center"> {{ $category->id }} </td>
                            <td class="text-center"> {{ $category->name }} </td>
                            <td class="text-center"> {{ $category->description }} </td>
                            <td class="flex gap-4 justify-center">
                                <a href="{{ route('categories.show', $category) }}" class="text-blue-500">
                                    Ver
                                </a>
                                <a href="{{ route('categories.edit', $category) }}" class="text-green-500">
                                    Editar
                                </a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                    onsubmit=" return confirm('¿Seguro que lo quiere eliminar?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    @endsection
</x-app-layout>
