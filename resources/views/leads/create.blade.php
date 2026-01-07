@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4 text-white">Yangi Lead qo‘shish</h1>

    <div class="card shadow-lg rounded-lg bg-white/10 p-6 max-w-lg mx-auto">
        <form action="{{ route('leads.store') }}" method="POST" class="space-y-4 text-white">
            @csrf
            <div>
                <label class="block font-medium mb-1">Full Name</label>
                <input type="text" name="full_name" value="{{ old('full_name') }}"
                       class="w-full border border-white/30 rounded px-3 py-2 bg-white/5 text-white placeholder-white/70">
                @error('full_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-medium mb-1">Phone</label>
                <input type="text" name="phone" value="{{ old('phone') }}"
                       class="w-full border border-white/30 rounded px-3 py-2 bg-white/5 text-white placeholder-white/70">
                @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-medium mb-1">Status</label>
                <select name="status"
                        class="w-full border border-white/30 rounded px-3 py-2 bg-white/5 text-white">
                    <option value="new" {{ old('status')=='new' ? 'selected' : '' }}>New</option>
                    <option value="in_progress" {{ old('status')=='in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="done" {{ old('status')=='done' ? 'selected' : '' }}>Done</option>
                </select>
                @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-medium mb-1">Note</label>
                <textarea name="note"
                          class="w-full border border-white/30 rounded px-3 py-2 bg-white/5 text-white placeholder-white/70">{{ old('note') }}</textarea>
            </div>
            <button type="submit"
                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Saqlash</button>
        </form>
    </div>
@endsection
