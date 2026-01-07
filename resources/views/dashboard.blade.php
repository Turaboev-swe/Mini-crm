@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    {{-- Welcome card --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">

                    <div class="me-3 p-3 bg-primary text-white rounded">
                        <i class="fas fa-hand-sparkles fa-2x"></i>
                    </div>

                    <div>
                        <h4 class="card-title mb-1">
                            Xush kelibsiz, {{ Auth::check() ? Auth::user()->name : 'Mehmon' }}!
                        </h4>

                        <p class="card-text text-muted mb-0">
                            CRM tizimiga xush kelibsiz. Quyida tizim statistikasi va tezkor harakatlar.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Stats --}}
    <div class="row mb-4">

        <div class="col-md-4 mb-3">
            <div class="card text-center shadow-sm border-0">
                <div class="card-body">
                    <i class="fas fa-users fa-2x text-primary mb-2"></i>

                    {{-- <h5 class="card-title">{{ $leadsCount }}</h5> --}}
                    <p class="card-text text-muted mb-0">
                        Jami mijozlar soni
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card text-center shadow-sm border-0">
                <div class="card-body">
                    <i class="fas fa-tasks fa-2x text-success mb-2"></i>

                    {{-- <h5 class="card-title">{{ $tasksCount }}</h5> --}}
                    <p class="card-text text-muted mb-0">
                        Jami vazifalar
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card text-center shadow-sm border-0">
                <div class="card-body">
                    <i class="fas fa-exclamation-circle fa-2x text-danger mb-2"></i>

                    {{-- <h5 class="card-title">{{ $incompleteTasks }}</h5> --}}
                    <p class="card-text text-muted mb-0">
                        Hali bajarilmagan vazifalar
                    </p>
                </div>
            </div>
        </div>

    </div>

    {{-- Quick actions --}}
    @if(Auth::check())
        <div class="row">

            <div class="col-md-6 mb-3">
                <a href="{{ route('leads.create') }}" class="card text-decoration-none shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">

                        <div class="me-3 p-3 bg-primary text-white rounded">
                            <i class="fas fa-user-plus"></i>
                        </div>

                        <div>
                            <h6 class="mb-0">Yangi mijoz</h6>
                            <small class="text-muted">Mijoz qo'shish</small>
                        </div>

                    </div>
                </a>
            </div>

            <div class="col-md-6 mb-3">
                <a href="{{ route('leads.index') }}" class="card text-decoration-none shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">

                        <div class="me-3 p-3 bg-success text-white rounded">
                            <i class="fas fa-list"></i>
                        </div>

                        <div>
                            <h6 class="mb-0">Mijozlar ro'yxati</h6>
                            <small class="text-muted">Barcha mijozlar</small>
                        </div>

                    </div>
                </a>
            </div>

        </div>
    @endif

@endsection
