@extends('layouts.app')
@section('title', 'Подать заявку')
@section('content')
    <h1 class="text-3xl font-bold mb-6">Подать заявку на участие</h1>
    <a href="{{ route('home') }}" class="text-blue-600 mb-4 inline-block">Вернуться к списку выступлений</a>
    @if ($hasApplied)
        <div class="bg-yellow-100 text-yellow-700 p-4 rounded">
            Вы уже отправили заявку! Мы свяжемся с Вами в ближайшее время.
        </div>
    @else
        <form method="POST" action="{{ route('apply') }}" enctype="multipart/form-data" class="max-w-md mx-auto">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">ФИО выступающего</label>
                <input type="text" name="fullname" class="w-full p-2 border rounded" value="{{ old('fullname') }}">
                @error('fullname') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Тема выступления</label>
                <input type="text" name="theme" class="w-full p-2 border rounded" value="{{ old('theme') }}">
                @error('theme') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Секция</label>
                <select name="section_id" class="w-full p-2 border rounded">
                    @foreach ($sections as $section)
                        <option value="{{ $section->id }}" {{ old('section_id') == $section->id ? 'selected' : '' }}>{{ $section->title }}</option>
                    @endforeach
                </select>
                @error('section_id') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Фотография</label>
                <input type="file" name="photo" class="w-full p-2 border rounded">
                @error('photo') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Отправить заявку</button>
        </form>
    @endif
@endsection