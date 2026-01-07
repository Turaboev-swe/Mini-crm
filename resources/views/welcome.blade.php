@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="text-center">
            <!-- Icon -->
            <div class="mb-6">
                <svg class="w-16 h-16 mx-auto text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>

            <!-- Title -->
            <h1 class="text-2xl font-bold text-gray-900 mb-2">
                Mini CRM Tizimi
            </h1>
            <p class="text-gray-600 mb-8">
                Xush kelibsiz!
            </p>

            <!-- Buttons -->
            @guest
                <div class="space-y-3 max-w-xs mx-auto">
                    <a href="{{ route('login') }}"
                       class="block bg-blue-600 text-black py-3 px-6 rounded-lg font-medium hover:bg-blue-700">
                        Kirish
                    </a>
                    <a href="{{ route('register') }}"
                       class="block border border-gray-300 text-gray-700 py-3 px-6 rounded-lg font-medium hover:bg-gray-50">
                        Ro'yxatdan o'tish
                    </a>
                </div>
            @else
                <a href="{{ route('dashboard') }}"
                   class="inline-block bg-green-600 text-yellow-600 py-3 px-8 rounded-lg font-medium hover:bg-green-700">
                    Dashboard
                </a>
            @endguest
        </div>
    </div>
@endsection
