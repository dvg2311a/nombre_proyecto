<x-app-layout>
    @section('content')
        <div class="">

            <form action="{{ route('categories.store') }}" method="POST" class="ml-40 mt-10">
                <h1 class="text-white">Crear categoría</h1>
                @csrf
                <div class="mb-3 flex flex-col gap-4">
                    <label for="name" class="form-label text-white">Nombre</label>
                    <input name="name" class="form-control w-96" value="{{ old('name', $category->name) }}" />
                    @error('name')
                        <div class="text-danger text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 flex flex-col gap-4">
                    <label class="form-label text-white">Descripción</label>
                    <textarea name="description" class="form-control text-dark w-96">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-primary text-white bg-blue-700 p-2 rounded-lg">Guardar</button>
            </form>
        </div>
    @endsection
</x-app-layout>
