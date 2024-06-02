<x-app-layout>
    <div class="text-white container mx-auto h-screen mt-0">
        <div class="flex h-full justify-center items-center">
            <div class="w-full max-w-lg">
                <h3 class="text-2xl font-bold mb-1">Editar post</h3>
                <form action="{{ route('post.update', $post) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="titlePost" class="block text-sm font-bold mb-2 text-white">Titulo</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="titlePost" name="titlePost" value="{{ $post->titlePost }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="contentPost" class="block text-sm font-bold mb-2 text-white">Contenido</label>
                        <textarea
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="contentPost" name="contentPost" rows="3" required>{{ $post->contentPost }}</textarea>
                    </div>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Actualizar post
                    </button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
