@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">{{ $lead->full_name }}</h1>
    <p class="mb-2">Phone: {{ $lead->phone }}</p>
    <p class="mb-2">Status: {{ $lead->status }}</p>
    <p class="mb-4">Note: {{ $lead->note ?? '-' }}</p>

    <h2 class="text-xl font-semibold mb-2">Tasks</h2>
    <table class="min-w-full bg-white shadow rounded mb-4">
        <thead>
        <tr class="bg-gray-200 text-left">
            <th class="px-4 py-2">Title</th>
            <th class="px-4 py-2">Due At</th>
            <th class="px-4 py-2">Done</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($lead->tasks as $task)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $task->title }}</td>
                <td class="px-4 py-2">{{ $task->due_at?->format('Y-m-d H:i') ?? '-' }}</td>
                <td class="px-4 py-2">{{ $task->is_done ? 'Yes' : 'No' }}</td>
                <td class="px-4 py-2">
                    <form action="{{ route('tasks.update', [$lead, $task]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="checkbox" name="is_done" onchange="this.form.submit()" {{ $task->is_done ? 'checked' : '' }}>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="px-4 py-2 text-center">Tasks yo‘q</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <a href="{{ route('leads.edit', $lead) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Leadni tahrirlash</a>
@endsection
