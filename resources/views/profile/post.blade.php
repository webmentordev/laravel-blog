@extends('layouts.app')
@section('title', 'Dashboard | Blog')
@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 p-4 rounded-lg bg-white">
            @can('update', $post)
                <form action="{{ route('post.update', $post) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <textarea name="body" id="body" cols="30" rows="4"
                    class="bg-gray-200 rounded-lg w-full p-3" placeholder="Message!">{{ $post->body }}</textarea>
                    
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
                        <button type="submit" class="rounded-lg py-2 px-3 bg-blue-500 text-white">Update</button>
                    </div>
                </form>
            @endcan
            <x-profile :post="$post" />
        </div>
    </div>
@endsection