<x-app-layout>
    @php
        $objProfileController = new App\Http\Controllers\ProfileController();
        $objPostController = new App\Http\Controllers\PostController();
    @endphp
    <div class="w-full h-full mt-5">
        <div class="flex h-full justify-center items-center">
            <div class="shadow-md rounded-lg mx-4 max-w-2xl">
                <div class="bg-gray-700 text-white p-4 rounded-t-lg">
                    <h5 class="text-xl font-semibold">{{ $post->titlePost }}</h5>
                    <h6 class="text-sm font-bold">Poster: {{ $objProfileController->returnUser($post->idUserPoster) }}</h6>
                    <!-- <h6 class="text-sm font-bold">Poster: {{ $post->idUserPoster }}</h6> -->
                </div>
                <div class="p-4 text-white">
                    <p>{{ $post->contentPost }}</p>
                </div>
                @auth
                    @if (Auth::user()->id == $post->idUserPoster || (Auth::user()->idRole == 2 || Auth::user()->idRole == 3))
                        {{-- PASRALO A CONTROLLER??? --}}
                        {{-- El edit no tendira que ser solo para el poster?? --}}
                        <div class="bg-gray-700 p-4 rounded-b-lg flex justify-between items-center">
                            <a href="{{ route('post.edit', $post) }}"
                                class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded">Editar</a>
                            <form action="{{ route('post.destroy', $post) }}" method="post" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-white bg-red-500 hover:bg-red-600 px-4 py-2 rounded">Borrar</button>
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</x-app-layout>
