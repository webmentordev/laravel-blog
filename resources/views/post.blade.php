@extends('layouts.app')
@section('title', 'Posts Page!')
@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 p-4 rounded-lg bg-white">
            <form action="{{ route('post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <textarea name="body" id="body" cols="30" rows="4"
                class="bg-gray-200 rounded-lg w-full p-3" placeholder="Message!"></textarea>
                
                @error('body')
                    <p class="text-red-500 my-3">{{ $message }}</p>
                @enderror

                <div class="my-2">
                    <input type="file" name="image" id="">
                </div>
                @error('image')
                    <p class="text-red-500 my-3">{{ $message }}</p>
                @enderror
                
                <div class="my-2">
                    <button type="submit" class="rounded-lg py-2 px-3 bg-blue-500 text-white">Post</button>
                </div>
            </form>

            @foreach ($posts as $post)
                <x-profile :post="$post" />
            @endforeach
            {{ $posts->links() }}
        </div>
    </div>
@endsection