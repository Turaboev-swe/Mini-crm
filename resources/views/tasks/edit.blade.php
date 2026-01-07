@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Task</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('tasks.update', [$lead, $task]) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Task title -->
            <div>
                <label for="title" class="block font-semibold">Title</label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    value="{{ old('title', $task->title) }}"
                    class="border p-2 rounded w-full @error('title') border-red-500 @enderror"
                >
                @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Task due date -->
            <div>
                <label for="due_at" class="block font-semibold">Due Date</label>
                <input
                    type="datetime-local"
                    name="due_at"
                    id="due_at"
                    value="{{ old('due_at', optional($task->due_at)->format('Y-m-d\TH:i')) }}"
                    class="border p-2 rounded w-full @error('due_at') border-red-500 @enderror"
                >
                @error('due_at')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Task is_done -->
            <div class="flex items-center space-x-2">
                <input
                    type="checkbox"
                    name="is_done"
                    id="is_done"
                    value="1"
                    {{ old('is_done', $task->is_done) ? 'checked' : '' }}
                >
                <label for="is_done" class="font-semibold">Completed</label>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update Task
            </button>
        </form>
    </div>
@endsection
