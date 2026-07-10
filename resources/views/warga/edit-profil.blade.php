@extends('layouts.app-warga')

@section('content')
<div class="container-fluid py-4">
    
    <div class="mb-4">
        <h2 class="fw-bold mb-1" style="color: #1e1b4b;">Edit Profil</h2>
        <p class="text-muted">Perbarui informasi data diri Anda di bawah ini.</p>
    </div>

    <div class="card shadow-sm border-0 custom-card" style="border-radius: 12px; overflow: hidden;">
        
        <div class="card-header text-white px-4 py-3" style="background-color: #2e1065; border-bottom: none;">
            <h5 class="mb-0 fw-semibold"><i class="fas fa-user-edit me-2"></i>Edit Data Profil</h5>
        </div>

        <div class="card-body p-4 p-md-5">
            <form action="{{ route('warga.update.profil') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted">NIK</label>
                        <input type="text"
                               class="form-control custom-input bg-light"
                               value="{{ $user->nik }}"
                               readonly
                               style="cursor: not-allowed;">
                        <small class="text-danger mt-1 d-block">*NIK tidak dapat diubah.</small>
                    </div>

                    <div class="col-md-6 mt-3 mt-md-0">
                        <label class="form-label fw-semibold text-muted">Nama Lengkap</label>
                        <input type="text"
                               name="name"
                               class="form-control custom-input"
                               value="{{ old('name', $user->name) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted">Email</label>
                        <input type="email"
                               name="email"
                               class="form-control custom-input"
                               value="{{ old('email', $user->email) }}">
                    </div>

                    <div class="col-md-6 mt-3 mt-md-0">
                        <label class="form-label fw-semibold text-muted">No. Handphone</label>
                        <input type="text"
                               name="no_hp"
                               class="form-control custom-input"
                               value="{{ old('no_hp', $user->no_hp) }}">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold text-muted">Alamat Lengkap</label>
                    <textarea name="alamat"
                              class="form-control custom-input"
                              rows="4">{{ old('alamat', $user->alamat) }}</textarea>
                </div>

                <div class="d-flex gap-2 mt-4 pt-2 border-top">
                    <button type="submit" class="btn text-white px-4 py-2 mt-3 btn-save fw-semibold rounded-3 d-inline-flex align-items-center">
                        <i class="fas fa-save me-2"></i> Simpan Perubahan
                    </button>
                    
                    <a href="{{ route('warga.profil') }}" class="btn btn-outline-secondary px-4 py-2 mt-3 fw-semibold rounded-3 d-inline-flex align-items-center">
                        <i class="fas fa-times me-2"></i> Batal
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>

<style>
    /* Styling agar input form memiliki warna highlight ungu saat di-klik */
    .custom-input {
        border-radius: 8px;
        padding: 0.6rem 1rem;
        border: 1px solid #dee2e6;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }
    .custom-input:focus {
        border-color: #5b21b6;
        box-shadow: 0 0 0 0.25rem rgba(91, 33, 182, 0.15);
    }

    /* Styling tombol simpan selaras dengan tema ungu */
    .btn-save {
        background-color: #5b21b6;
        border: none;
        transition: all 0.3s ease;
    }
    .btn-save:hover {
        background-color: #4c1d95;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(91, 33, 182, 0.3);
        color: white;
    }
</style>
@endsection