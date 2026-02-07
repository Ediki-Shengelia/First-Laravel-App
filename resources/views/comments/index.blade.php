<x-main-layout>
    <h1>
        <span class="text-green-800 text-2xl ">{{ $post->title }} </span>
        <span class="text-red-800 text-4xl font-bold">by {{ $post->user->name }}</span>
    </h1>
    @forelse ($post->comments as $item)
        <li class="flex flex-col gap-2">
            <div>
                <span class="text-red-500">{{ $item->comment }}</span>
                <span> {{ $item->user->name }}</span>
            </div>
        </li>
    @empty
        <p>No comment Yet</p>
    @endforelse

</x-main-layout>
