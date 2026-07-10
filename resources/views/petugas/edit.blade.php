@extends('layouts.app-petugas')

@section('content')
<h2 class="mb-4">Detail Pengaduan</h2>

<div class="card shadow">
    <div class="card-body">
        <p><b>Nama :</b> {{ $complaint->user->name }}</p>
        <p><b>Judul :</b> {{ $complaint->judul }}</p>
        <p><b>Kategori :</b> {{ $complaint->category->nama }}</p>
        
        <div class="mb-4">
            <p><b>Isi Pengaduan :</b></p>
            
            @if($complaint->foto)
                <div class="mb-3">
                    <label class="fw-bold">Foto Bukti</label><br>
                    <img src="{{ asset('uploads/'.$complaint->foto) }}" width="350" class="img-thumbnail">
                </div>
            @endif
            
            <p>{{ $complaint->isi }}</p>
        </div>

        <form action="{{ route('petugas.update', $complaint->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-select">
                    <option value="Pending" {{ $complaint->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Diproses" {{ $complaint->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="Selesai" {{ $complaint->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Tanggapan</label>
                <textarea name="tanggapan" class="form-control" rows="5">{{ $complaint->tanggapan }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
@endsection