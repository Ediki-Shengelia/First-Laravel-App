<section>
    <form action="{{ route('user.photo') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="flex gap-4 flex-column bg-green-200 rounded-l-xl px-4 py-2">
            <input type="file" name="upload_file" id="" required>
            <button
                class="bg-red-200 text-white text-2xl px-4 py-1 font-bold hover:bg-blue-200 hover:scale-150 hover:text-black">Upload</button>
        </div>
    </form>
</section>
