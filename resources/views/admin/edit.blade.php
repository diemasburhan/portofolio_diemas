@extends('layouts.layout')

@section('title', 'Ubah Project | ' . $project->name)

@section('content')
<section class="tile-section parchment" style="padding-top: 60px;">
    <div class="container" style="max-width: 680px; text-align: left;">
        <div style="margin-bottom: 30px;">
            <a href="{{ route('admin.dashboard') }}" style="color: var(--color-ink-muted-80); font-size: 14px; font-weight: 600; display: inline-flex; align-items: center; gap: 6px;">
                &larr; Kembali ke Dashboard
            </a>
            <h1 class="display-sm" style="font-size: 32px; font-weight: 600; margin-top: 15px; color: var(--color-ink);">Ubah Data Aplikasi Web</h1>
            <p class="caption" style="color: var(--color-ink-muted-80);">Sesuaikan informasi singkat, alamat tautan, atau perbarui gambar screenshot aplikasi web {{ $project->name }}.</p>
        </div>

        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="contact-form" style="background-color: var(--color-canvas); width: 100%; max-width: 100%; padding: 40px; border-radius: var(--rounded-lg); border: 1px solid var(--color-hairline);">
            @csrf
            
            @if($errors->any())
                <div style="background-color: #ffeef0; border: 1px solid #ffccd3; color: #d9383a; padding: 12px; border-radius: var(--rounded-sm); margin-bottom: 20px; font-size: 14px;">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="form-group">
                <label for="name">Nama Aplikasi Web</label>
                <input type="text" name="name" id="name" class="form-input" required value="{{ old('name', $project->name) }}">
            </div>

            <div class="form-group">
                <label for="category">Kategori Portal</label>
                <input type="text" name="category" id="category" class="form-input" required value="{{ old('category', $project->category) }}" placeholder="Contoh: Web Application, Official Portal">
            </div>

            <div class="form-group">
                <label for="url">Alamat URL (Tautan)</label>
                <input type="url" name="url" id="url" class="form-input" required value="{{ old('url', $project->url) }}">
            </div>

            <div class="form-group">
                <label for="brief">Brief Ringkasan &amp; Deskripsi Tanggung Jawab</label>
                <textarea name="brief" id="brief" class="form-input" required style="min-height: 180px;">{{ old('brief', $project->brief) }}</textarea>
            </div>

            <!-- Screenshot Image Management -->
            <div class="form-group">
                <label style="margin-bottom: 10px;">Gambar Screenshot Portofolio</label>
                
                <!-- Current Screenshot Preview -->
                @if($project->screenshot)
                    <div style="margin-bottom: 15px;">
                        <span style="font-size: 12px; color: var(--color-ink-muted-48); display: block; margin-bottom: 6px;">Screenshot Saat Ini:</span>
                        <div style="max-width: 320px; border: 1px solid var(--color-hairline); border-radius: var(--rounded-sm); overflow: hidden; box-shadow: rgba(0,0,0,0.1) 0px 2px 10px;">
                            <img src="{{ asset('images/screenshots/' . $project->screenshot) }}" alt="Screenshot {{ $project->name }}" style="width: 100%; display: block; object-fit: contain;">
                        </div>
                    </div>
                @endif

                <label for="screenshot" style="background-color: var(--color-canvas-parchment); border: 1px dashed var(--color-hairline); display: block; padding: 20px; border-radius: var(--rounded-sm); text-align: center; cursor: pointer; transition: background-color 0.2s;">
                    <span style="color: var(--color-primary); font-weight: 600; display: block; margin-bottom: 4px;">Pilih Gambar Baru</span>
                    <span style="font-size: 12px; color: var(--color-ink-muted-80); font-weight: normal; text-transform: none;">Mendukung format PNG, JPG, JPEG, WEBP (Max 5MB)</span>
                    <input type="file" name="screenshot" id="screenshot" accept="image/*" style="display: none;" onchange="updateFileLabel(this)">
                </label>
                <span id="file-chosen" style="font-size: 13px; color: var(--color-ink); display: block; margin-top: 8px; font-weight: 600;"></span>
            </div>

            <div style="display: flex; gap: 15px; margin-top: 30px;">
                <button type="submit" class="btn-primary" style="flex: 1; padding: 14px;">Simpan Perubahan</button>
                <a href="{{ route('admin.dashboard') }}" class="btn-secondary" style="flex: 1; padding: 14px; text-align: center; line-height: 1.0;">Batalkan</a>
            </div>

        </form>
    </div>
</section>
@endsection

@section('scripts')
<script>
    function updateFileLabel(input) {
        const fileName = input.files[0] ? input.files[0].name : '';
        const displayLabel = document.getElementById('file-chosen');
        if (fileName) {
            displayLabel.innerText = "File Terpilih: " + fileName;
        } else {
            displayLabel.innerText = "";
        }
    }
</script>
@endsection
