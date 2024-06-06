<x-app-layout>
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 shadow-md rounded p-6  w-full max-w-3xl">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl text-gray-800 dark:text-gray-200">Editar Menú</h1>
                <a href="{{ route('menu.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold py-1 px-3 rounded">
                    Volver
                </a>
            </div>
            <div>
                <form action="{{ route('menu.update', $menu) }}" method="post" class="shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="nameMenu" class="block text-white text-sm font-bold mb-2">Nombre</label>
                        <input type="text"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               id="nameMenu" name="nameMenu" value="{{ $menu->nameMenu }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="urlMenu" class="block text-white text-sm font-bold mb-2">Ruta</label>
                        <input type="text"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               id="urlMenu" name="urlMenu" value="{{ $menu->urlMenu }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="parentId" class="block text-white text-sm font-bold mb-2">Padre</label>
                        <select name="parentId" id="parentId" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->idMenu }}" {{ $menu->idMenu == $menu->parentId ? 'selected' : '' }}>{{ $menu->nameMenu }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-center justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
