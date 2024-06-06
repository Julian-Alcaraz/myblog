<x-app-layout>
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 shadow-md rounded p-6  overflow-visible">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl text-gray-800 dark:text-gray-200">Menú</h1>
            </div>
            <table class="table-auto bg-gray-900 border-b text-gray-800 dark:text-gray-200 rounded-lg">
                <thead>
                <tr>
                    <th class="py-2 px-4">idMenu</th>
                    <th class="py-2 px-4">nameMenu</th>
                    <th class="py-2 px-4">route</th>
                    <th class="py-2 px-4">parent</th>
                    <th class="py-2 px-4">order</th>
                    <th class="py-2 px-4">habilitated</th>
                    <th class="py-2 px-4">created_at</th>
                    <th class="py-2 px-4">updated_at</th>
                    <th class="py-2 px-4">-</th>
                    <th class="py-2 px-4">-</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $menu)
                        <tr>
                            <td class="py-2 px-4">{{ $menu->idMenu }}</td>
                            <td class="py-2 px-4">{{ $menu->nameMenu }}</td>
                            <td class="py-2 px-4">{{ $menu->urlMenu }}</td>
                            <td class="py-2 px-4">{{ $menu->parentId }}</td>
                            <td class="py-2 px-4">{{ $menu->order }}</td>
                            <td class="py-2 px-4">{{ $menu->habilitated }}</td>
                            <td class="py-2 px-4">{{ $menu->created_at }}</td>
                            <td class="py-2 px-4">{{ $menu->updated_at }}</td>
                            <td class="py-2 px-4">
                                <a href="{{ route('menu.edit', $menu->idMenu) }}" class="text-white bg-blue-500 hover:bg-blue-700 rounded-md px-4 py-2">Edit</a>
                            </td>
                            <td class="py-2 px-4">
                                <form action="{{ route('menu.destroy', $menu->idMenu) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white rounded-md px-4 py-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
