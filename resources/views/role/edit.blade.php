<x-app-layout>
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 shadow-md rounded p-6 w-full max-w-3xl">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl text-gray-800 dark:text-gray-200">Editar Rol</h1>
                <a href="{{ route('role.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold py-1 px-3 rounded">
                    Volver
                </a>
            </div>
            <div>
                <form action="{{ route('role.update', $role) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="nameRole" class="block text-sm font-bold mb-2 text-white">Nombre del ROL</label>
                        <input type="text"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               id="nameRole" name="nameRole" value="{{ $role->nameRole }}" required>
                    </div>
                    <div class="mb-4">
                        <h1 class="block text-sm font-bold mb-2 text-white">Habilitado</h1>
                        <label for="habilitated" class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="habilitated" name="habilitated" class="sr-only peer" {{ $role->habilitated ? 'checked' : '' }}>
                            <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300"></span>
                        </label>
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
<script>
    var check = document.querySelectorAll('#habilitated')
    var button = document.getElementById('submit')

    button.addEventListener('click', function(){
        console.log(check)
    })
</script>


