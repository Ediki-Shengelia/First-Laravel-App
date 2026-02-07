<x-main-layout>
    <h1 class="text-center text-yellow-500 text-4xl font-bold">Post page</h1>
    <a href="{{ route('post.create') }}">
        <button class="fixed bottom-10 right-5 border-2 shadow-lg shadow-red-100 px-4 py-1">Add post</button>
    </a>
    @if (session('success'))
        <p class="text-green-500 font-bold text-2xl">{{ session('success') }}</p>
    @endif
    @foreach ($posts as $post)
        <li>
            <div class="flex gap-2 border-2 px-4 py-1 w-fit mt-4 mx-auto">
                <a href="{{ route('post.show', $post) }}">
                    <p>{{ $post->title }}</p>
                </a>
                <br>
                @if ($post->comments->count() > 0)
                    <a class="bg-pink-800 text-white px-2 py-0 rounded-md" href="{{ route('comment.show', $post) }}">show
                        me
                        comments</a>
                @endif
                <form action="{{ route('comment.store', $post) }}" method="POST">

                    @csrf
                    <textarea name="comment" id="" cols="20" rows="1"></textarea>
                    <button type="submit" class="px-4 py-1 bg-gray-600 text-red-400">Comment</button>
                </form>
                <br>
                <x-like-button :post="$post" />
                <form action="{{ route('post.destroy', $post) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="px-3 py-1 bg-red-400 text-white">Delete</button>
                </form>
            </div>
        </li>
    @endforeach
</x-main-layout>
