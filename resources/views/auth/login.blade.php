@extends('layouts.layout')

@section('title', 'Login Admin | Portofolio Diemas Burhan Septian')

@section('content')
<section class="tile-section parchment" style="min-height: 80vh; justify-content: center; align-items: center; padding: 40px 0;">
    <div class="container" style="max-width: 440px;">
        <div style="text-align: center; margin-bottom: 30px;">
            <img src="{{ asset('images/logo_dbs.png') }}" alt="DBS Logo" style="height: 60px; width: auto; object-fit: contain; margin-bottom: 15px;">
            <br>
            <span class="project-meta">Akses Administrator</span>
            <h1 class="display-md" style="margin-top: 10px; color: var(--color-ink);">Masuk ke Portal</h1>
        </div>

        <form action="{{ url('/login') }}" method="POST" class="contact-form" style="background-color: var(--color-canvas); width: 100%;">
            @csrf
            
            @if($errors->any())
                <div style="background-color: #ffeef0; border: 1px solid #ffccd3; color: #d9383a; padding: 12px; border-radius: var(--rounded-sm); margin-bottom: 20px; font-size: 14px;">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" name="email" id="email" class="form-input" placeholder="contoh@domain.com" required value="{{ old('email') }}" autofocus>
            </div>

            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" name="password" id="password" class="form-input" placeholder="Masukkan kata sandi" required>
            </div>

            <div class="form-group" style="display: flex; align-items: center; gap: 8px;">
                <input type="checkbox" name="remember" id="remember" style="width: auto; cursor: pointer;">
                <label for="remember" style="margin-bottom: 0; cursor: pointer; text-transform: none; font-size: 14px;">Ingat Sesi Saya</label>
            </div>

            <button type="submit" class="btn-primary" style="width: 100%; padding: 14px; margin-top: 10px;">Masuk</button>
            
            <div style="text-align: center; margin-top: 20px;">
                <a href="{{ url('/') }}" class="caption" style="color: var(--color-ink-muted-80); hover: color: var(--color-primary);">&larr; Kembali ke Beranda</a>
            </div>
        </form>
    </div>
</section>
@endsection
