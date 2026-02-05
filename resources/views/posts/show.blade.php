<x-main-layout>
    <h1 class="text-green-800 text-4xl font-bold mt-4 text-center">{{ $post->title }}</h1>
    @if ($post->content)
        <p>{{ $post->content }}</p>
    @endif
    <div class="flex gap-3 w-fit mx-auto mt-5">
        <p>This post made by {{$post->user->name}}</p>
        <img  class="w-12 h-12" src="{{ Storage::url($post->user->photo) }}" alt="">
    </div>
</x-main-layout>
