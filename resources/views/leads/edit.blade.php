@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 p-6 bg-white/10 rounded-lg shadow-lg text-white">
        <h1 class="text-3xl font-bold mb-6">Leadni tahrirlash</h1>

        <form action="{{ route('leads.update', $lead) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="full_name" class="block font-medium mb-1">Full Name</label>
                <input type="text" name="full_name" value="{{ old('full_name', $lead->full_name) }}" required
                       class="w-full px-4 py-2 border border-white/30 rounded-md bg-white/5 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-white/50">
                @error('full_name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="phone" class="block font-medium mb-1">Phone</label>
                <input type="text" name="phone" value="{{ old('phone', $lead->phone) }}" required
                       class="w-full px-4 py-2 border border-white/30 rounded-md bg-white/5 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-white/50">
                @error('phone') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="status" class="block font-medium mb-1">Status</label>
                <select name="status"
                        class="w-full px-4 py-2 border border-white/30 rounded-md bg-white/5 text-white focus:outline-none focus:ring-2 focus:ring-white/50">
                    <option value="new" {{ $lead->status === 'new' ? 'selected' : '' }}>New</option>
                    <option value="in_progress" {{ $lead->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="done" {{ $lead->status === 'done' ? 'selected' : '' }}>Done</option>
                </select>
            </div>

            <div>
                <label for="note" class="block font-medium mb-1">Note</label>
                <textarea name="note" rows="4"
                          class="w-full px-4 py-2 border border-white/30 rounded-md bg-white/5 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-white/50">{{ old('note', $lead->note) }}</textarea>
            </div>

            <button type="submit"
                    class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-md transition-colors duration-200">
                Update Lead
            </button>
        </form>
    </div>
@endsection
