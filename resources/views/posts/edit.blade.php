<x-main-layout>
    <h1 class="text-red-800 text-2xl text-center">Edit Post Page for <span
            class="text-yellow-700">{{ $post->title }}</span></h1>
    <div class="w-fit mx-auto mt-20 ">
        <form action="{{ route('post.update', $post) }}" method="post">
            @csrf
            @method('PUT')
            <input type="text" name="title" value="{{ $post->title }}" id="">
            @error('title')
                <p>{{ $message }}</p>
            @enderror
            <br>
            <textarea name="content" id="" cols="30" rows="10">{{ $post->content }}</textarea>
            @error('content')
                <p>{{ $message }}</p>
            @enderror
            <br>
            <button class="hover:bg-red-50 hover:scale-150 py-2 px-8">Create</button>
        </form>
    </div>
</x-main-layout>
