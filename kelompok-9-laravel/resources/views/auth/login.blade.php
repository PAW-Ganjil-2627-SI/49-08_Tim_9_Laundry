@extends('layouts.guest')

@section('title', 'Login')

@section('content')
    <h2 class="text-lg font-semibold mb-4">Masuk ke akun</h2>

    <form action="{{ route('login') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium mb-1">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" autofocus
                   class="w-full border rounded px-3 py-2">
            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium mb-1">Password</label>
            <input type="password" id="password" name="password"
                   class="w-full border rounded px-3 py-2">
            @error('password')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <label class="flex items-center gap-2 text-sm">
            <input type="checkbox" name="remember" value="1"> Ingat saya
        </label>

        <button type="submit" class="w-full bg-blue-600 text-white rounded py-2 hover:bg-blue-700">
            Login
        </button>
    </form>

    <p class="text-sm text-center mt-4">
        Belum punya akun?
        <a href="{{ route('register') }}" class="text-blue-600 underline">Daftar</a>
    </p>
@endsection