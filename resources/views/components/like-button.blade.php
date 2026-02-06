<form action="{{ route('like', $post) }}" method="post">
    @csrf
    <button type="submit">
        {{ $post->isLikedByUser(auth()->user()) ? '❤️' : '🤍' }}
        {{ $post->likes()->count() }}
    </button>
</form>
