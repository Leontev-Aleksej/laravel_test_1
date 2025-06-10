@extends('layouts.app')
@section('title', 'Главная')
@section('content')
    <h1 class="text-3xl font-bold mb-6">Конференции</h1>
    <a href="{{ route('apply.form') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-6 inline-block">Принять участие</a>
    <h2 class="text-2xl font-bold mb-4">Одобренные выступления</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($reports as $report)
            <div class="bg-white p-4 rounded shadow">
                <img src="{{ Storage::url($report->path_img) }}" alt="{{ $report->fullname }}" class="w-full h-48 object-cover mb-4">
                <h3 class="text-xl font-bold">{{ $report->fullname }}</h3>
                <p class="text-gray-600">{{ $report->theme }}</p>
                <p class="text-gray-600">{{ $report->section->title }}</p>
            </div>
        @endforeach
    </div>
@endsection