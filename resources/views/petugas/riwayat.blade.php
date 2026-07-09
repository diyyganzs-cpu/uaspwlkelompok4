@extends('layouts.app-petugas')
@section('content')
<h2 class="mb-4 fw-bold" style="color: #2c1556;">Riwayat Pengaduan Selesai</h2>
<div class="card shadow-sm border-0">
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead style="background-color: #2c1556; color: white;">

                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tanggapan</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>

                @forelse($complaints as $item)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->category->nama }}</td>
                    <td>{{ $item->tanggapan }}</td>
                    <td>{{ $item->created_at->format('d M Y') }}</td>
                </tr>

                @empty

                <tr>

                    <td colspan="6" class="text-center">
                        Belum ada pengaduan yang selesai.
                    </td>

                </tr>
                
                @endforelse
                
            </tbody>
        </table>
    </div>
</div>
@endsection