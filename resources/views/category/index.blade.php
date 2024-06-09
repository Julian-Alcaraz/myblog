<x-app-layout>
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 shadow-md rounded p-6  overflow-visible">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl text-gray-800 dark:text-gray-200 pr-5">Categorías</h1>
                 <a href="{{ route('category.create') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold py-1 px-3 rounded">
                Nueva Categoría
                 </a>
            </div>
            <table class="table-auto bg-gray-900 border-b text-gray-800 dark:text-gray-200 rounded-lg">
                <thead>
                    <tr>
                        <th class="py-2 px-4">Id</th>
                        <th class="py-2 px-4">Nombre</th>
                        <th class="py-2 px-4">Habilitated</th>
                        <th class="py-2 px-4">Fecha creación</th>
                        <th class="py-2 px-4">Fecha última modificación</th>
                        <th class="py-2 px-4">-</th>
                        <th class="py-2 px-4">-</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="py-2 px-4">{{ $category->idCategory }}</td>
                            <td class="py-2 px-4">{{ $category->nameCategory }}</td>
                            <td class="py-2 px-4">{{ $category->habilitated }}</td>
                            <td class="py-2 px-4">{{ $category->created_at }}</td>
                            <td class="py-2 px-4">{{ $category->updated_at }}</td>
                            <td class="py-2 px-4">
                                <a href="{{ route('category.edit', $category->idCategory) }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Editar</a>
                            </td>

                            @if($category->habilitated)
                            <td class="py-2 px-4">
                                <form action="{{ route('category.destroy', $category->idCategory) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Eliminar</button>
                                </form>
                            </td>
                            @else
                            <td class="py-2 px-4">
                                <form action="{{ route('category.alta', $category->idCategory) }}" method="POST"
                                    class="inline">
                                    @csrf
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Habilitar</button>
                                </form>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
