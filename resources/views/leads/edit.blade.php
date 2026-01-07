@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Leadni tahrirlash</h1>

    <form action="{{ route('leads.update', $lead) }}" method="POST" class="bg-white p-4 shadow rounded space-y-4">
        @csrf
        @method('PATCH')
        <div>
            <label class="block font-medium">Full Name</label>
            <input type="text" name="full_name" value="{{ old('full_name', $lead->full_name) }}" class="w-full border rounded px-2 py-1">
            @error('full_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block font-medium">Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $lead->phone) }}" class="w-full border rounded px-2 py-1">
            @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block font-medium">Status</label>
            <select name="status" class="w-full border rounded px-2 py-1">
                <option value="new" {{ old('status', $lead->status)=='new' ? 'selected' : '' }}>New</option>
                <option value="in_progress" {{ old('status', $lead->status)=='in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="done" {{ old('status', $lead->status)=='done' ? 'selected' : '' }}>Done</option>
            </select>
            @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block font-medium">Note</label>
            <textarea name="note" class="w-full border rounded px-2 py-1">{{ old('note', $lead->note) }}</textarea>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Saqlash</button>
    </form>
@endsection

