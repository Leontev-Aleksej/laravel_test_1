@extends('layouts.app')
@section('title', 'Вход')
@section('content')
    <h1 class="text-3xl font-bold mb-6">Вход</h1>
    <form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" class="w-full p-2 border rounded" value="{{ old('email') }}">
            @error('email') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Пароль</label>
            <input type="password" name="password" class="w-full p-2 border rounded">
            @error('password') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Войти</button>
    </form>
@endsection