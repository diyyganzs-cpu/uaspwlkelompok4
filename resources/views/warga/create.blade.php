@extends('layouts.app-warga')

@section('content')
<div class="container-fluid py-4">
    <div class="mb-4">
        <h2 class="fw-bold" style="color: #1e1b4b;">Buat Pengaduan Baru</h2>
        <p class="text-muted">Sampaikan keluhan Anda dengan mengisi formulir di bawah ini dengan jelas dan detail.</p>
    </div>

    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-0 h-100" style="background-color: #f8fafc;">
                <div class="card-body p-4 p-md-5">
                    <h5 class="fw-bold mb-3" style="color: #1e1b4b;">
                        <i class="fas fa-lightbulb text-warning me-2"></i> Panduan Pengisian
                    </h5>
                    <hr class="opacity-10 mb-4">
                    
                    <ul class="text-muted ps-3 mb-4" style="line-height: 1.8; font-size: 0.95rem;">
                        <li>Tuliskan <strong>Judul</strong> yang singkat namun langsung merangkum inti masalah.</li>
                        <li>Pastikan memilih <strong>Kategori</strong> yang paling tepat agar laporan diteruskan ke divisi yang benar.</li>
                        <li>Jelaskan <strong>Isi Pengaduan</strong> dengan detail mencakup 5W+1H (Apa, Siapa, Kapan, Di mana, Mengapa, dan Bagaimana).</li>
                        <li>Lampirkan <strong>Foto Bukti</strong> pendukung asli (tanpa editan) untuk mempercepat proses verifikasi.</li>
                    </ul>

                    <div class="alert rounded-3 border-0 d-flex align-items-start shadow-sm" style="background-color: rgba(91, 33, 182, 0.08); color: #5b21b6;">
                        <i class="fas fa-shield-alt fs-4 me-3 mt-1"></i>
                        <div>
                            <strong>Privasi Aman</strong><br>
                            <small>Data dan identitas Anda dijamin kerahasiaannya oleh sistem kami.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-header text-white py-3 rounded-top-4" style="background-color: #1e1b4b;">
                    <h5 class="mb-0 fw-bold"><i class="fas fa-edit me-2"></i> Formulir Laporan Pengaduan</h5>
                </div>

                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('warga.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-4">
                            <div class="col-md-7 mb-3 mb-md-0">
                                <label class="form-label fw-semibold">Judul Pengaduan <span class="text-danger">*</span></label>
                                <input type="text" name="judul" class="form-control form-control-lg @error('judul') is-invalid @enderror" placeholder="Contoh: Jalan berlubang di depan pasar" value="{{ old('judul') }}">
                                @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-5">
                                <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                                <select name="category_id" class="form-select form-select-lg @error('category_id') is-invalid @enderror">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->nama }}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Isi Pengaduan / Kronologi <span class="text-danger">*</span></label>
                            <textarea name="isi" rows="6" class="form-control form-control-lg @error('isi') is-invalid @enderror" placeholder="Jelaskan detail pengaduan Anda di sini dengan lengkap...">{{ old('isi') }}</textarea>
                            @error('isi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-5">
                            <label class="form-label fw-semibold">Upload Foto Bukti <span class="text-danger">*</span></label>
                            <div class="upload-area p-3 border rounded-3 bg-light">
                                <input type="file" name="foto" class="form-control form-control-lg border-0 bg-white shadow-sm @error('foto') is-invalid @enderror" accept=".jpg,.jpeg,.png">
                                @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                <div class="text-muted mt-2 small d-flex align-items-center">
                                    <i class="fas fa-info-circle me-2 text-primary"></i> 
                                    Maksimal ukuran file 2 MB. Format yang didukung: JPG, JPEG, PNG.
                                </div>
                            </div>
                        </div>

                        <hr class="opacity-10 mb-4">

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-light btn-lg me-3 px-4" onclick="window.history.back();">Batal</button>
                            <button type="submit" class="btn btn-lg text-white px-5 fw-bold" style="background-color: #5b21b6; transition: 0.3s;">
                                <i class="fas fa-paper-plane me-2"></i> Kirim Pengaduan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Styling agar input terlihat lebih modern */
    .form-control, .form-select {
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        font-size: 0.95rem;
    }
    .form-control:focus, .form-select:focus {
        border-color: #5b21b6;
        box-shadow: 0 0 0 4px rgba(91, 33, 182, 0.1);
    }
    .form-control::placeholder {
        color: #adb5bd;
        font-size: 0.9rem;
    }
    .upload-area {
        border: 2px dashed #cbd5e1 !important;
    }
    .btn:hover {
        background-color: #4c1d95 !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(76, 29, 149, 0.2);
    }
    .btn-light:hover {
        background-color: #e2e8f0 !important;
        color: #1e1b4b !important;
        transform: none;
        box-shadow: none;
    }
</style>
@endsection