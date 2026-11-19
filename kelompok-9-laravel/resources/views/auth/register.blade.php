@extends('layouts.guest')

@section('title', 'Daftar')

@section('content')
    <h2 class="text-lg font-semibold mb-4">Buat akun baru</h2>

    <form action="{{ route('register') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium mb-1">Nama</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" autofocus
                   class="w-full border rounded px-3 py-2">
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium mb-1">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                   class="w-full border rounded px-3 py-2">
            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium mb-1">Password (min. 8 karakter)</label>
            <input type="password" id="password" name="password"
                   class="w-full border rounded px-3 py-2">
            @error('password')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium mb-1">Ulangi password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                   class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white rounded py-2 hover:bg-blue-700">
            Daftar
        </button>
    </form>

    <p class="text-sm text-center mt-4">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="text-blue-600 underline">Login</a>
    </p>
@endsection