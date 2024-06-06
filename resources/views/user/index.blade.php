<x-app-layout>
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 shadow-md rounded p-6  overflow-visible">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl text-gray-800 dark:text-gray-200">Usuario</h1>
            </div>
            <table class="table-auto bg-gray-900 border-b text-gray-800 dark:text-gray-200 rounded-lg">
                <thead>
                <tr>
                    <th class="py-2 px-4">idUser</th>
                    <th class="py-2 px-4">name</th>
                    <th class="py-2 px-4">email</th>
                    <th class="py-2 px-4">email_verified_at</th>
                    <th class="py-2 px-4">habilitated</th>
                    <th class="py-2 px-4">Rol</th>
                    <th class="py-2 px-4">Creada</th>
                    <th class="py-2 px-4">Actualizada</th>
                    <th class="py-2 px-4">-</th>
                    <th class="py-2 px-4">-</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td class="py-2 px-4">{{ $usuario->id }}</td>
                        <td class="py-2 px-4">{{ $usuario->name }}</td>
                        <td class="py-2 px-4">{{ $usuario->email }}</td>
                        <td class="py-2 px-4">{{ $usuario->email_verified_at }}</td>
                        <td class="py-2 px-4">{{ $usuario->habilitated ? 'Sí' : 'No' }}</td>
                        <td class="py-2 px-4">{{ $usuario->idRole }}</td>
                        <td class="py-2 px-4">{{ $usuario->created_at }}</td>
                        <td class="py-2 px-4">{{ $usuario->updated_at }}</td>
                        <td class="py-2 px-4">
                            <a href="{{ route('user.edit', $usuario->id) }}" class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded">Editar</a>
                        </td>
                        <td class="py-2 px-4">
                            <form action="{{ route('user.destroy', $usuario->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

