@extends('layouts.guest')
@section('title','Login Admin')

@section('content')
<div class="d-flex flex-column align-items-center w-100">
    <div class="card shadow-lg p-4" style="min-width:350px; border-radius: 18px; border: none;">
        <div class="text-center mb-4">
            <div class="bg-primary bg-gradient rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width:60px;height:60px;">
                <i class="fas fa-user-shield text-white fs-2"></i>
            </div>
            <h2 class="fw-bold mb-1" style="letter-spacing:1px;">Login Admin</h2>
            <p class="text-muted mb-0" style="font-size:15px;">Masuk ke dashboard administrator</p>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" name="email" class="form-control form-control-lg" placeholder="admin@email.com" required autofocus style="border-radius:10px;">
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Password</label>
                <input type="password" name="password" class="form-control form-control-lg" placeholder="••••••••" required style="border-radius:10px;">
            </div>
            <button class="btn btn-primary btn-lg w-100 mt-2 shadow-sm" style="border-radius:10px;">Login</button>
        </form>
    </div>
    <div class="mt-4 text-center text-muted" style="font-size:13px;">
        &copy; {{ date('Y') }} Yuni Permata Sari MI2C
    </div>
</div>
@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush
