<x-main-layout>
    <h1 class="text-red-800 text-2xl text-center">Create Post Page</h1>
    <div class="w-fit mx-auto mt-20 ">
        <form action="{{ route('post.store') }}" method="post">
            @csrf
            <input type="text" name="title" value="{{ old('title') }}" id="">
            @error('title')
                <p>{{ $message }}</p>
            @enderror
            <br>
            <textarea name="content" id="" cols="30" rows="10">{{ old('content') }}</textarea>
            @error('content')
                <p>{{ $message }}</p>
            @enderror
            <br>
            <button class="hover:bg-red-50 hover:scale-150 py-2 px-8">Create</button>
        </form>
    </div>
</x-main-layout>
