<x-app-layout>
  @php
    $objProfileController = new App\Http\Controllers\ProfileController();
  @endphp
    <div class="text-white m-4">
      <a href="{{ route('post.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold py-1 px-3 rounded">
          Nuevo post
      </a>
  </div>
    @foreach ($colPosts as $post)
    @php
      $nombreUsuario = $objProfileController->returnUser($post->idUserPoster);
    @endphp
        <div class=" text-white m-4">
            <div class="bg-gray-800 rounded-lg shadow-lg">
                <div class="bg-gray-700 px-4 py-2 rounded-t-lg">
                    <h5 class="text-lg font-bold">{{ $post->titlePost }}</h5>
                    <h6 class="text-sm font-bold">Poster: {{ $nombreUsuario }}</h6>
                    {{-- SACAR DESPUES!!! --}}
                    <h6 class="text-sm font-bold">Estado: @if ($post->habilitated == 0)Deshabilitado @else Habilitado @endif  </h6>
                </div>
                <div class="p-4">
                    <p class="text-base">{{ $post->contentPost }}</p>
                </div>
                
                <div class="bg-gray-700 px-4 py-2 rounded-b-lg">
                    <div class="flex justify-between">
                        <a href="{{ route('post.show', $post) }}"
                            class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold py-1 px-3 rounded">Ver</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
