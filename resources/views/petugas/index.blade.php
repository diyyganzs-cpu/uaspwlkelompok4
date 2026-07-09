@extends('layouts.app-petugas')

@section('content')

<h2 class="mb-4 fw-bold" style="color: #2c1556;">Data Pengaduan</h2>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead style="background-color: #2c1556; color: white;">
                <tr>
                    <th>No</th>
                    <th>Nama Warga</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($complaints as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->category->nama }}</td>
                    <td>
                        @if($item->status == 'Pending')
                            <span class="badge" style="background-color: #2c1556;">Pending</span>
                        @elseif($item->status == 'Diproses')
                            <span class="badge" style="background-color: #6a4c93;">Diproses</span>
                        @elseif($item->status == 'Selesai')
                            <span class="badge" style="background-color: #4a2f70;">Selesai</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('petugas.edit', $item->id) }}" 
                           class="btn btn-sm text-white" 
                           style="background-color: #2c1556;">
                           Detail
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada pengaduan.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection