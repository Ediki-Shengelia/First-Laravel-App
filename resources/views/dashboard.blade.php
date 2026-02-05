<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div>
        <form action="{{ route('allRead') }}" method="post">
            @csrf
            <button class="bg-red-100"> Read all messages</button>
        </form>
        @auth
            <p>You have {{ auth()->user()->unreadNotifications->count() }} messages</p>
        @endauth

        @if (auth()->user()->notifications->count() > 0)
            @foreach (auth()->user()->notifications as $notification)
                {{ $notification->data['message'] ?? '' }} {{ $notification->data['title'] ?? '' }}
                <form action="{{ route('readOne', $notification) }}" method="post">
                    @csrf
                    <button class="bg-green-200">mark as read</button>
                </form>
            @endforeach
        @endif
    </div>
    <a href="{{ route('post.index') }}">post page</a>
</x-app-layout>
