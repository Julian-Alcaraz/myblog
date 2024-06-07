<x-app-layout>
    <div class="flex justify-center items-center h-screen">
        <div class="w-10/12 md:w-8/12 lg:w-6/12">
            <h3 class="text-xl md:text-2xl lg:text-3xl font-bold mb-4 text-white">Crear un menu</h3>
            <form action="{{ route('menu.store') }}" method="post" class=" shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                {{-- Nombre: --}}
                <div class="mb-4">
                    <label for="nameMenu" class="block text-white text-sm font-bold mb-2">Nombre menu</label>
                    <input type="text" class="form-input w-full" id="nameMenu" name="nameMenu" required>
                </div>
                {{-- Url: --}}
                <div class="mb-4">
                    <label for="urlMenu" class="block text-white text-sm font-bold mb-2">Url menu</label>
                    <input type="text" class="form-input w-full" id="urlMenu" name="urlMenu" required>
                </div>
                {{-- Orden: --}}
                <div class="mb-4">
                    <label for="order" class="block text-white text-sm font-bold mb-2">Orden</label>
                    <input type="number" class="form-input w-full" id="order" name="order" required>
                </div>
                {{-- Parent: --}}
                <div class="mb-4">
                    <label for="parentId" class="block text-white text-sm font-bold mb-2">Padre (opcional)</label>
                    <select name="parentId" id="parentId"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">Sin padre</option>
                        @foreach ($menus as $m)
                            <option value="{{ $m->idMenu }}" {{ $m->parentId == $m->idMenu ? 'selected' : '' }}>
                                {{ $m->nameMenu }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- Roles asociados: --}}
                <div class="mb-4">
                    <label class="block text-white text-sm font-bold mb-2">Roles asociados</label>
                    @foreach ($colRoles as $role)
                        <div>
                            <input type="checkbox"
                                class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="role_{{ $role->idRole }}" name="roles[]" value="{{ $role->idRole }}">
                            <label for="role_{{ $role->idRole }}" class="text-white">{{ $role->nameRole }}</label>
                        </div>
                    @endforeach
                </div>
                {{-- Btn. Crear --}}
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Crear Menu
                </button>
        </div>
        </form>
    </div>
    </div>
</x-app-layout>
