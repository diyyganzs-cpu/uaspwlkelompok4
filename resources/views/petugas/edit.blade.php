@extends('layouts.app-petugas')

@section('content')

<h2 class="mb-4">
Detail Pengaduan
</h2>

<div class="card shadow">

<div class="card-body">

<p>

<b>Nama :</b>

{{ $complaint->user->name }}

</p>

<p>

<b>Judul :</b>

{{ $complaint->judul }}

</p>

<p>

<b>Kategori :</b>

{{ $complaint->category->nama }}

</p>

<p>

<b>Isi Pengaduan :</b>

@if($complaint->foto)

<div class="mb-3">

    <label class="fw-bold">Foto Bukti</label><br>

    <img src="{{ asset('uploads/'.$complaint->foto) }}"
         width="350"
         class="img-thumbnail">

</div>

@endif

{{ $complaint->isi }}

</p>

<form
action="{{ route('petugas.update',$complaint->id) }}"
method="POST">

@csrf

@method('PUT')

<div class="mb-3">

<label>Status</label>

<select
name="status"
class="form-select">

<option
{{ $complaint->status=='Pending'?'selected':'' }}>
Pending
</option>

<option
{{ $complaint->status=='Diproses'?'selected':'' }}>
Diproses
</option>

<option
{{ $complaint->status=='Selesai'?'selected':'' }}>
Selesai
</option>

</select>

</div>

<div class="mb-3">

<label>Tanggapan</label>

<textarea
name="tanggapan"
class="form-control"
rows="5">{{ $complaint->tanggapan }}</textarea>

</div>

<button class="btn btn-success">

Simpan

</button>

</form>

</div>

</div>

@endsection