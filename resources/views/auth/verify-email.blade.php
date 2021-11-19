@extends('layouts.app')
@section('title', 'Home Page | Blog')
@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 p-4 rounded-lg bg-white">
            <p class="mb-3">Verification Email has been sent!</p>
            <form action="{{ route('verification.send') }}" method="post">
                @csrf
                <button type="submit" class="p-3 rounded-lg w-full bg-gray-900 text-white">Resend Email</button>
            </form>
        </div>
    </div>
@endsection