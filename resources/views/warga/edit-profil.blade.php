@extends('layouts.app-warga')

@section('content')

<h2 class="mb-4">Edit Profil</h2>

<div class="card shadow">

    <div class="card-header bg-warning">
        Edit Data Profil
    </div>

    <div class="card-body">

        <form action="{{ route('warga.update.profil') }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>NIK</label>
                <input type="text"
                       class="form-control"
                       value="{{ $user->nik }}"
                       readonly>
            </div>

            <div class="mb-3">
                <label>Nama</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ old('name', $user->name) }}">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ old('email', $user->email) }}">
            </div>

            <div class="mb-3">
                <label>No HP</label>
                <input type="text"
                       name="no_hp"
                       class="form-control"
                       value="{{ old('no_hp', $user->no_hp) }}">
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat"
                          class="form-control"
                          rows="4">{{ old('alamat', $user->alamat) }}</textarea>
            </div>

            <button class="btn btn-warning">
                Simpan Perubahan
            </button>

            <a href="{{ route('warga.profil') }}"
               class="btn btn-secondary">

                Batal

            </a>

        </form>

    </div>

</div>

@endsection