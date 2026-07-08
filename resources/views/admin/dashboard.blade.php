@extends('layouts.layout')

@section('title', 'Admin Dashboard | Kelola Portofolio')

@section('content')
<section class="tile-section parchment" style="padding-top: 60px;">
    <div class="container" style="text-align: left;">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px; margin-bottom: 40px; border-bottom: 1px solid var(--color-hairline); padding-bottom: 20px;">
            <div>
                <span class="project-meta">Panel Kontrol</span>
                <h1 class="display-md" style="margin-top: 5px; color: var(--color-ink);">Kelola Portofolio &amp; Gambar</h1>
            </div>
            <div>
                <form action="{{ url('/logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-secondary" style="font-size: 14px; padding: 8px 16px; cursor: pointer;">Keluar Sesi</button>
                </form>
            </div>
        </div>

        <!-- Project Management Card Grid -->
        <h2 class="display-sm" style="font-size: 24px; margin-bottom: 20px; font-weight: 600;">Daftar Aplikasi Web (12 Portal)</h2>
        
        <div style="display: grid; grid-template-columns: 1fr; gap: 20px; margin-bottom: 50px;">
            @foreach($projects as $project)
                <div style="background-color: var(--color-canvas); border: 1px solid var(--color-hairline); border-radius: var(--rounded-lg); padding: 24px; display: flex; gap: 24px; align-items: center; flex-wrap: wrap;">
                    
                    <!-- Screenshot Preview -->
                    <div style="flex: 0 0 160px; max-width: 160px; border-radius: var(--rounded-sm); overflow: hidden; box-shadow: rgba(0,0,0,0.1) 0px 2px 8px; border: 1px solid rgba(0,0,0,0.06); background-color: var(--color-canvas-parchment); display: flex; align-items: center; justify-content: center; height: 100px;">
                        @if($project->screenshot)
                            <img src="{{ asset('images/screenshots/' . $project->screenshot) }}" alt="Screenshot {{ $project->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <span class="caption" style="color: var(--color-ink-muted-48);">Belum ada gambar</span>
                        @endif
                    </div>

                    <!-- Project Details -->
                    <div style="flex: 1; min-width: 250px;">
                        <span class="project-meta" style="color: var(--color-primary); font-size: 11px;">{{ $project->category }}</span>
                        <h3 style="font-size: 20px; font-weight: 600; color: var(--color-ink); margin: 4px 0;">{{ $project->name }}</h3>
                        <p class="caption" style="color: var(--color-ink-muted-80); margin-bottom: 8px;">
                            {{ \Illuminate\Support\Str::limit($project->brief, 140) }}
                        </p>
                        <a href="{{ $project->url }}" target="_blank" class="caption" style="color: var(--color-primary-focus); word-break: break-all;">{{ $project->url }}</a>
                    </div>

                    <!-- Action Button -->
                    <div style="flex: 0 0 auto;">
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn-primary" style="font-size: 13px; padding: 8px 16px;">Ubah Konten &amp; Gambar</a>
                    </div>

                </div>
            @endforeach
        </div>

        <!-- Visitor Messages Table -->
        <h2 class="display-sm" style="font-size: 24px; margin-bottom: 20px; font-weight: 600;">Pesan Masuk (Form Kontak)</h2>
        
        <div style="background-color: var(--color-canvas); border: 1px solid var(--color-hairline); border-radius: var(--rounded-lg); padding: 30px; overflow-x: auto;">
            @if($messages->isEmpty())
                <p style="text-align: center; color: var(--color-ink-muted-48); padding: 20px 0;">Belum ada pesan masuk dari pengunjung.</p>
            @else
                <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 15px;">
                    <thead>
                        <tr style="border-bottom: 2px solid var(--color-hairline);">
                            <th style="padding: 12px 10px; font-weight: 600; width: 20%;">Nama Pengirim</th>
                            <th style="padding: 12px 10px; font-weight: 600; width: 25%;">Alamat Email</th>
                            <th style="padding: 12px 10px; font-weight: 600; width: 40%;">Isi Pesan</th>
                            <th style="padding: 12px 10px; font-weight: 600; width: 15%;">Tanggal Kirim</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $message)
                            <tr style="border-bottom: 1px solid var(--color-hairline); vertical-align: top;">
                                <td style="padding: 16px 10px; font-weight: 600; color: var(--color-ink);">{{ $message->name }}</td>
                                <td style="padding: 16px 10px;"><a href="mailto:{{ $message->email }}" style="color: var(--color-primary);">{{ $message->email }}</a></td>
                                <td style="padding: 16px 10px; color: var(--color-ink-muted-80); line-height: 1.4; white-space: pre-line;">{{ $message->message }}</td>
                                <td style="padding: 16px 10px; font-size: 13px; color: var(--color-ink-muted-48);">{{ $message->created_at->format('d M Y, H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </div>
</section>
@endsection
