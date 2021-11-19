@extends('layouts.app')
@section('title', 'Register Page!')
@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 p-4 rounded-lg bg-white">
            <form action="{{ route('register') }}" method="post">
                @csrf

                @if (session('success'))
                    <p class="bg-green-500 text-white p-3 w-full rounded-lg text-center">{{ session('success') }}</p>
                @endif
                <div class="my-2">
                    <input type="text" name="name" placeholder="FullName"
                    class="w-full rounded-lg p-3 bg-gray-200" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500 my-3">{{ $message }}</p>
                    @enderror
                </div>

                <div class="my-2">
                    <input type="text" name="username" placeholder="Username"
                    class="w-full rounded-lg p-3 bg-gray-200" value="{{ old('username') }}">
                    @error('username')
                        <p class="text-red-500 my-3">{{ $message }}</p>
                    @enderror
                </div>

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
                    <input type="password" name="password_confirmation" placeholder="Repeat Password"
                    class="w-full rounded-lg p-3 bg-gray-200">
                </div>

                <div class="my-2">
                    <button type="submit" class="w-full rounded-lg p-3 bg-blue-500 text-white">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection