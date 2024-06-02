<x-app-layout>
    <div class="w-full text-white m-4">
        <a href="{{ route('post.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold py-1 px-3 rounded">
            Nuevo post
        </a>
    </div>
    @foreach ($colPosts as $post)
    <div class="w-full text-white m-4">
        <div class="bg-gray-800 rounded-lg shadow-lg">
            <div class="bg-gray-700 px-4 py-2 rounded-t-lg">
                <h5 class="text-lg font-bold">{{ $post->titlePost }}</h5>
                <h6 class="text-sm font-bold">Poster: {{ $post->idUserPoster }} </h6>
                {{-- SACAR DESPUES!!! --}}
                <h6 class="text-sm font-bold">Estado: @if ($post->habilitated == 0)Deshabilitado @else Habilitado @endif </h6>
            </div>
            <div class="p-4">
                <p class="text-base">{{ $post->contentPost }}</p>
            </div>
            <div class="bg-gray-700 px-4 py-2 rounded-b-lg">
                <div class="flex justify-between">
                    @auth
                    <!-- verificar que sea el dueño tambien -->
                    @if($post->idUserPoster==Auth::user()->id)
                    <a href="{{ route('post.edit', $post) }}" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold py-1 px-3 rounded">Editar</a>
                    @endif
                    @endauth
                    <a href="{{ route('post.show', $post) }}" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold py-1 px-3 rounded">Ver</a>
                    @auth
                    @if($post->idUserPoster==Auth::user()->id)
                    <div>
                        <form action="{{ route('post.destroy', $post) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm font-semibold py-1 px-3 rounded">Borrar
                            </button>
                        </form>
                    </div>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
    @endforeach
</x-app-layout>

{{--
  <div class="note-buttons">
    <a href="{{ route('note.show', $note) }}" class="note-edit-button">View</a>
<a href="{{ route('note.edit', $note) }}" class="note-edit-button">Edit</a>
<form action="{{ route('note.destroy', $note) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="note-delete-button">Delete</button>
</form>
</div>
<a href="{{ route('note.create') }}" class="new-note-btn">
    New Note
</a>
--}}
