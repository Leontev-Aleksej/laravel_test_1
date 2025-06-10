@extends('layouts.app')
@section('title', 'Регистрация')
@section('content')
    <h1 class="text-3xl font-bold mb-6">Регистрация</h1>
    <form method="POST" action="{{ route('register') }}" class="max-w-md mx-auto">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Имя</label>
            <input type="text" name="name" class="w-full p-2 border rounded" value="{{ old('name') }}">
            @error('name') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Телефон</label>
            <input type="text" name="tel" class="w-full p-2 border rounded" value="{{ old('tel') }}">
            @error('tel') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>
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
        <div class="mb-4">
            <label class="block text-gray-700">Подтверждение пароля</label>
            <input type="password" name="password_confirmation" class="w-full p-2 border rounded">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Зарегистрироваться</button>
    </form>
@endsection