@extends('layouts.app')
@section('title', 'Панель администратора')
@section('content')
    <h1 class="text-3xl font-bold mb-6">Панель администратора</h1>
    <table class="w-full bg-white rounded shadow">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-4">ФИО</th>
                <th class="p-4">Телефон</th>
                <th class="p-4">Email</th>
                <th class="p-4">Тема</th>
                <th class="p-4">Секция</th>
                <th class="p-4">Статус</th>
                <th class="p-4">Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td class="p-4">{{ $report->fullname }}</td>
                    <td class="p-4">{{ $report->user->tel }}</td>
                    <td class="p-4">{{ $report->user->email }}</td>
                    <td class="p-4">{{ $report->theme }}</td>
                    <td class="p-4">{{ $report->section->title }}</td>
                    <td class="p-4">{{ $report->status }}</td>
                    <td class="p-4">
                        <form action="{{ route('admin.approve', $report) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-green-600 text-white px-2 py-1 rounded mr-2">Одобрить</button>
                        </form>
                        <form action="{{ route('admin.reject', $report) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded">Отклонить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection