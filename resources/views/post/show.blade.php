<x-app-layout>
    <div class="container h-full mt-5">
        <div class="flex h-full justify-center items-center">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="bg-gray-200 px-6 py-4">
                    <h5 class="text-lg font-bold">{{ $post->titlePost }}</h5>
                </div>
                <div class="px-6 py-4">
                    <p class="text-gray-700">{{ $post->contentPost }}</p>
                </div>
                <div class="bg-gray-100 px-6 py-4 flex justify-between">
                    <a href="{{ route('posts.edit', $post) }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded text-sm">Edit</a>
                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                        <button type="submit"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
