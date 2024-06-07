@php
    $objMenuController = new App\Http\Controllers\MenuController();
    $objRoleController = new App\Http\Controllers\RoleController();
@endphp
<x-app-layout>
    <div class="flex items-center justify-center min-h-screen">
        <div
            class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 shadow-md rounded p-6  overflow-visible">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl text-gray-800 dark:text-gray-200">Menú</h1>
            </div>
            <a href="{{ route('menu.create') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold py-1 px-3 rounded">
                Nuevo Menu
            </a>
            <table class="table-auto bg-gray-900 border-b text-gray-800 dark:text-gray-200 rounded-lg">
                <thead>
                    <tr>
                        <th class="py-2 px-4">#</th>
                        <th class="py-2 px-4">Nombre</th>
                        <th class="py-2 px-4">Ruta</th>
                        <th class="py-2 px-4">Roles asociados</th>
                        <th class="py-2 px-4"># Parent</th>
                        <th class="py-2 px-4">Orden</th>
                        <th class="py-2 px-4">Habilitado</th>
                        <th class="py-2 px-4">Fecha creacion</th>
                        <th class="py-2 px-4">Fecha ultima modificación</th>
                        <th class="py-2 px-4" colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $menu)
                        @php
                            $colRoles = $objMenuController->buscarRolesMenu($menu);
                        @endphp
                        <tr>
                            <td class="py-2 px-4">{{ $menu->idMenu }}</td>
                            <td class="py-2 px-4">{{ $menu->nameMenu }}</td>
                            <td class="py-2 px-4">{{ $menu->urlMenu }}</td>
                            <td class="py-2 px-4">
                                @if (count($colRoles) !== 0)
                                    @foreach ($colRoles as $role)
                                        {{ $role->nameRole }}
                                    @endforeach
                                @else
                                    @php echo "No tiene roles asociados"; @endphp
                                @endif
                            </td>
                            <td class="py-2 px-4">
                                @if ($menu->parentId == null)
                                    -
                                @else
                                    {{ $menu->parentId }}
                                @endif
                            </td>
                            <td class="py-2 px-4">{{ $menu->order }}</td>
                            <td class="py-2 px-4">
                                @if ($menu->habilitated == 1)
                                    Si
                                @else
                                    No
                                @endif
                            </td>
                            <td class="py-2 px-4">{{ $menu->created_at }}</td>
                            <td class="py-2 px-4">{{ $menu->updated_at }}</td>
                            <td class="py-2 px-4">
                                <a href="{{ route('menu.edit', $menu) }}"
                                    class="text-white bg-blue-500 hover:bg-blue-700 rounded-md px-4 py-2">Editar</a>
                            </td>
                            <td class="py-2 px-4">
                                <form action="{{ route('menu.destroy', $menu->idMenu) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-700 text-white rounded-md px-4 py-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
