@extends('layouts.app')
@section('title', 'Forgot Password Page!')
@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 p-4 rounded-lg bg-white">
            <form action="{{ route('password.email') }}" method="post">
                @csrf

                @if (session('status'))
                    <p class="bg-green-500 text-white p-3 w-full rounded-lg text-center">{{ session('status') }}</p>
                @elseif (session('email'))
                    <p class="bg-red-500 text-white p-3 w-full rounded-lg text-center">{{ session('email') }}</p>
                @endif
                
                <div class="my-2">
                    <input type="email" name="email" placeholder="Email"
                    class="w-full rounded-lg p-3 bg-gray-200" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 my-3">{{ $message }}</p>
                    @enderror
                </div>

                <div class="my-2">
                    <button type="submit" class="w-full rounded-lg p-3 bg-blue-500 text-white">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
@endsection