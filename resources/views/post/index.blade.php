<x-app-layout>
    @php
        $objProfileController = new App\Http\Controllers\ProfileController();
        $objPostController = new App\Http\Controllers\PostController();
    @endphp
    <div class="m-4 bg-white dark:bg-gray-800 px-8 border-b border-gray-100 dark:border-gray-700 rounded-full">
        <nav class="flex space-x-4">
            <!-- Enlace para mostrar todos los posts -->
            <a href="{{ route('post.index') }}"
               class="text-gray-800 dark:text-gray-200 {{ request('idCategory') ? '' : 'font-bold' }}">
                Todos
            </a>

            <!-- Enlaces para cada categoría -->
            @foreach ($colCategories as $category)
                <a href="{{ route('post.index', ['idCategory' => $category->idCategory]) }}"
                   class="text-gray-800 dark:text-gray-200 {{ request('idCategory') == $category->idCategory ? 'font-bold' : '' }}">
                    {{ $category->nameCategory }}
                </a>
            @endforeach
        </nav>
    </div>
    <div class="text-white m-4">
        <a href="{{ route('post.create') }}"
            class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold py-1 px-3 rounded">
            Nuevo post
        </a>
    </div>
    @foreach ($colPosts as $post)
        <div class="text-white m-4">
            <div class="bg-gray-800 rounded-lg shadow-lg">
                <div class="bg-gray-700 px-4 py-2 rounded-t-lg">
                    <h5 class="text-lg font-bold">{{ $post->titlePost }}</h5>
                    <h6 class="text-sm font-bold">Posteado por:
                        {{ $objProfileController->returnUser($post->idUserPoster) }}</h6>
                </div>
                <div class="p-4">
                    <p class="text-base">{{ $post->contentPost }}</p>
                </div>
                <div class="bg-gray-700 px-4 py-2 rounded-b-lg">
                    <div class="flex justify-between">
                        <a href="{{ route('post.show', $post) }}"
                            class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold py-1 px-3 rounded">Ver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
