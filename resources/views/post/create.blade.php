<x-app-layout>
    <div class="flex justify-center items-center h-screen">
        <div class="w-10/12 md:w-8/12 lg:w-6/12">
            <h3 class="text-xl md:text-2xl lg:text-3xl font-bold mb-4 text-white">Crear un post</h3>
            <form action="{{ route('post.store') }}" method="post" class=" shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="mb-4">
                    <label for="titlePost" class="block text-white text-sm font-bold mb-2">Titulo</label>
                    <input type="text" class="form-input w-full" id="titlePost" name="titlePost" required>
                </div>
                <div class="mb-6">
                    <label for="contentPost" class="block text-white text-sm font-bold mb-2">Texto</label>
                    <textarea class="form-textarea w-full" id="contentPost" name="contentPost" rows="3" required></textarea>
                </div>
                <div class="mb-6">
                    <label for="idCategory" class="block text-white text-sm font-bold mb-2">Categoría</label>
                    <select class="form-select w-full" id="idCategory" name="idCategory" required>
                        <option value="" disabled selected>Selecciona una categoría</option>
                        @foreach ($colCategories as $category)
                            <option value="{{ $category->idCategory }}">{{ $category->nameCategory }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center justify-center">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Crear Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
