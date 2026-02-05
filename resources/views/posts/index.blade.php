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
            <div class="flex gap-2 border-2 px-4 py-1">
                <p>{{ $post->title }}</p>
                <img class="rounded-l-lg shadow-lg shadow-red-200" src="{{ asset($post->user->photo) }}" alt="User photo">
            </div>
        </li>
    @endforeach
</x-main-layout>
