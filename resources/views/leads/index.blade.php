@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Leadlar</h1>

    <a href="{{ route('leads.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Yangi Lead qo‘shish</a>

    <table class="min-w-full mt-4 bg-white shadow rounded">
        <thead>
        <tr class="bg-gray-200 text-left">
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Full Name</th>
            <th class="px-4 py-2">Phone</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($leads as $lead)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $lead->id }}</td>
                <td class="px-4 py-2">{{ $lead->full_name }}</td>
                <td class="px-4 py-2">{{ $lead->phone }}</td>
                <td class="px-4 py-2 capitalize">{{ $lead->status }}</td>
                <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('leads.show', $lead) }}" class="text-blue-500 hover:underline">Ko‘rish</a>
                    <a href="{{ route('leads.edit', $lead) }}" class="text-yellow-500 hover:underline">Tahrirlash</a>
                    <form action="{{ route('leads.destroy', $lead) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Haqiqatan o‘chirishni xohlaysizmi?')">O‘chirish</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="px-4 py-2 text-center">Leadlar yo‘q</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
