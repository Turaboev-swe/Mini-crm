@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 dark:text-gray-100">Leadni tahrirlash</h1>

        <form action="{{ route('leads.update', $lead) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="full_name" class="block text-gray-700 dark:text-gray-200 font-medium mb-1">Full Name</label>
                <input type="text" name="full_name" value="{{ old('full_name', $lead->full_name) }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600">
            </div>

            <div>
                <label for="phone" class="block text-gray-700 dark:text-gray-200 font-medium mb-1">Phone</label>
                <input type="text" name="phone" value="{{ old('phone', $lead->phone) }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600">
            </div>

            <div>
                <label for="status" class="block text-gray-700 dark:text-gray-200 font-medium mb-1">Status</label>
                <select name="status"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600">
                    <option value="new" {{ $lead->status === 'new' ? 'selected' : '' }}>New</option>
                    <option value="in_progress" {{ $lead->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="done" {{ $lead->status === 'done' ? 'selected' : '' }}>Done</option>
                </select>
            </div>

            <div>
                <label for="note" class="block text-gray-700 dark:text-gray-200 font-medium mb-1">Note</label>
                <textarea name="note"
                          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600"
                          rows="4">{{ old('note', $lead->note) }}</textarea>
            </div>

            <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md transition-colors duration-200">
                Update Lead
            </button>
        </form>
    </div>
@endsection
