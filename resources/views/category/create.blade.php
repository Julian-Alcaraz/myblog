<x-app-layout>
    <div class="flex items-center justify-center min-h-screen">
        <div
            class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 shadow-md rounded p-6  overflow-visible">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl text-gray-800 dark:text-gray-200 pr-6">Crear Categoría</h1>
                <a href="{{ route('category.index') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold py-1 px-3 rounded">
                    volver
                </a>
            </div>
            <form action="{{ route('category.store') }}" method="post" class=" rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="mb-4">
                    <label for="nameCategory" class="block text-white text-sm font-bold mb-2">Nombre de la
                        categoría</label>
                    <input type="text"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="nameCategory" name="nameCategory" required>
                </div>
                <div class="flex items-center justify-center">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Crear Categoría
                    </button>
                </div>
            </form>
</x-app-layout>
