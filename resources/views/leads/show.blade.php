@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white/10 rounded-lg shadow-lg text-white">
        <h1 class="text-3xl font-bold mb-4">{{ $lead->full_name }}</h1>

        <p class="mb-2"><span class="font-semibold">Phone:</span> {{ $lead->phone }}</p>
        <p class="mb-2"><span class="font-semibold">Status:</span> {{ ucfirst($lead->status) }}</p>
        <p class="mb-4"><span class="font-semibold">Note:</span> {{ $lead->note ?? '-' }}</p>

        <h2 class="text-2xl font-semibold mb-2">Tasks</h2>
        <div class="overflow-x-auto mb-4 rounded-lg bg-white/10 shadow-md">
            <table class="min-w-full text-white">
                <thead class="bg-white/20">
                <tr>
                    <th class="px-4 py-2 text-left">Title</th>
                    <th class="px-4 py-2 text-left">Due At</th>
                    <th class="px-4 py-2 text-left">Done</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($lead->tasks as $task)
                    <tr class="border-t border-white/20">
                        <td class="px-4 py-2">{{ $task->title }}</td>
                        <td class="px-4 py-2">{{ $task->due_at?->format('Y-m-d H:i') ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $task->is_done ? 'Yes' : 'No' }}</td>
                        <td class="px-4 py-2">
                            <form action="{{ route('tasks.update', [$lead, $task]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="title" value="{{ $task->title }}">
                                <input type="hidden" name="due_at" value="{{ $task->due_at?->format('Y-m-d\TH:i') }}">
                                <input type="hidden" name="is_done" value="0">
                                <input type="checkbox" name="is_done" value="1" onchange="this.form.submit()" {{ $task->is_done ? 'checked' : '' }}>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-4 text-center text-white/70">Tasks yo‘q</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <form action="{{ route('tasks.store', $lead) }}" method="POST" class="flex flex-col md:flex-row items-start md:items-end gap-3 mb-6 bg-white/10 p-4 rounded-lg shadow-md text-white max-w-2xl">
            @csrf

            <div class="flex-1 w-full">
                <label for="title" class="block mb-1 font-medium">Task nomi</label>
                <input type="text" name="title" id="title" placeholder="Yangi task nomi" required
                       class="w-full px-3 py-2 rounded-md bg-white/5 border border-white/30 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-white/50">
            </div>

            <div class="flex-1 w-full">
                <label for="due_at" class="block mb-1 font-medium">Muddat</label>
                <input type="datetime-local" name="due_at" id="due_at"
                       class="w-full px-3 py-2 rounded-md bg-white/5 border border-white/30 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-white/50">
            </div>

            <div class="mt-3 md:mt-0">
                <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white font-bold px-4 py-2 rounded-md transition-colors duration-200">
                    Qo'shish
                </button>
            </div>
        </form>


        <a href="{{ route('leads.edit', $lead) }}"
           class="inline-block bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition-colors duration-200">
            Leadni tahrirlash
        </a>
    </div>
@endsection
