@extends('layouts.app')
@section('title', 'Login Page!')
@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 p-4 rounded-lg bg-white">
            <form action="{{ route('login') }}" method="post">
                @csrf

                @if (session('failed'))
                    <p class="bg-red-500 text-white p-3 w-full rounded-lg text-center">{{ session('failed') }}</p>
                @elseif (session('status'))
                    <p class="bg-green-500 text-white p-3 w-full rounded-lg text-center">{{ session('status') }}</p>
                @endif
                
                <div class="my-2">
                    <input type="email" name="email" placeholder="Email"
                    class="w-full rounded-lg p-3 bg-gray-200" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 my-3">{{ $message }}</p>
                    @enderror
                </div>

                <div class="my-2">
                    <input type="password" name="password" placeholder="Password"
                    class="w-full rounded-lg p-3 bg-gray-200">
                    @error('password')
                        <p class="text-red-500 my-3">{{ $message }}</p>
                    @enderror
                </div>

                <div class="my-2">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember">Remember Me</label>
                </div>

                <div class="my-2">
                    <button type="submit" class="w-full rounded-lg p-3 bg-blue-500 text-white">Login</button>
                </div>

            </form>

            <p class="my-3 text-center text-gray-500">Don't remember password? <a class="text-blue-500 underline" href="{{ route('password.request') }}">Reset Password</a></p>
        </div>
    </div>
@endsection