@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6 text-white">Leadlar</h1>

        <a href="{{ route('leads.create') }}"
           class="inline-block mb-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition-colors duration-200">
            Yangi Lead qo‘shish
        </a>

        <div class="overflow-x-auto shadow-lg rounded-lg bg-white/10">
            <table class="min-w-full text-white">
                <thead class="bg-white/20">
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Full Name</th>
                    <th class="px-4 py-2 text-left">Phone</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($leads as $lead)
                    <tr class="border-t border-white/20">
                        <td class="px-4 py-2">{{ $lead->id }}</td>
                        <td class="px-4 py-2">{{ $lead->full_name }}</td>
                        <td class="px-4 py-2">{{ $lead->phone }}</td>
                        <td class="px-4 py-2 capitalize">{{ $lead->status }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('leads.show', $lead) }}" class="text-blue-400 hover:underline">Ko‘rish</a>
                            <a href="{{ route('leads.edit', $lead) }}" class="text-yellow-400 hover:underline">Tahrirlash</a>
                            <form action="{{ route('leads.destroy', $lead) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:underline"
                                        onclick="return confirm('Haqiqatan o‘chirishni xohlaysizmi?')">
                                    O‘chirish
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-4 text-center text-white/70">Leadlar yo‘q</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
