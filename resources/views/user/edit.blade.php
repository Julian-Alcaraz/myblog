<x-app-layout>
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 shadow-md rounded p-6  w-full max-w-3xl">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl text-gray-800 dark:text-gray-200">Editar Usuario</h1>
                <a href="{{ route('user.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold py-1 px-3 rounded">
                    Volver
                </a>
            </div>
            <div>
                <form action="{{ route('user.update', $user) }}" method="post" class="shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="block text-white text-sm font-bold mb-2">Nombre</label>
                        <input type="text"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               id="name" name="name" value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-white text-sm font-bold mb-2">Correo Electrónico</label>
                        <input type="email"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               id="email" name="email" value="{{ $user->email }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="habilitated" class="block text-white text-sm font-bold mb-2">Habilitado</label>
                        <label for="habilitated" class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="habilitated" name="habilitated" class="sr-only peer" {{ $user->habilitated ? 'checked' : '' }}>
                            <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300"></span>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label for="idRole" class="block text-white text-sm font-bold mb-2">Rol</label>
                        <select name="idRole" id="idRole" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ $role->id == $user->idRole ? 'selected' : '' }}>{{ $role->nameRole }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <button type="submit" id="submit" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold py-2 px-4 rounded">
                            Actualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
