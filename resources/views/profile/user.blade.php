@extends('layouts.app')
@section('title', 'Dashboard | Blog')
@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 p-4 ">
            <h1 class="py-1 text-2xl text-white font-bold">{{ $user->name }}</h1>
            <p class="py-2 text-gray-800">Posted {{ $user->posts()->count() }} Posts and received {{ $user->receivedLikes()->count() }} {{ Str::plural('like', $user->receivedLikes()->count()) }}</p>
            <div class="rounded-lg bg-white p-2">
                @foreach ($posts as $post)
                        <x-profile :post="$post" />
                @endforeach
            {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection