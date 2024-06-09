<x-app-layout>
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 shadow-md rounded p-6 w-full max-w-3xl">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl text-gray-800 dark:text-gray-200">Roles</h1>
                <a href="{{ route('role.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold py-1 px-3 rounded">
                    Nuevo Rol
                </a>
            </div>
            <table class="table-auto min-w-full bg-gray-900 border-b text-gray-800 dark:text-gray-200 rounded-lg">
                <thead>
                <tr>
                    <th class="py-2 px-4">idRol</th>
                    <th class="py-2 px-4">nameRole</th>
                    <th class="py-2 px-4">habilitated</th>
                    <th class="py-2 px-4">Creada</th>
                    <th class="py-2 px-4">Actualizada</th>
                    <th class="py-2 px-4">-</th>
                    <th class="py-2 px-4">-</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td class="py-2 px-4">{{ $role->idRole }}</td>
                        <td class="py-2 px-4">{{ $role->nameRole }}</td>
                        <td class="py-2 px-4">{{ $role->habilitated ? 'Sí' : 'No' }}</td>
                        <td class="py-2 px-4">{{ $role->created_at }}</td>
                        <td class="py-2 px-4">{{ $role->updated_at }}</td>
                        <td class="py-2 px-4">
                            <a href="{{ route('role.edit', $role->idRole) }}" class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded">Editar</a>                        </td>

                        @if($role->habilitated)
                        <td class="py-2 px-4">
                            <form action="{{ route('role.destroy', $role->idRole) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">Borrar</button>                            </form>
                        </td>
                        @else
                        <td class="py-2 px-4">
                            <form action="{{ route('role.alta', $role->idRole) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-green-500 text-white py-1 px-3 rounded hover:bg-green-600">Habilitar</button>                            </form>
                        </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
