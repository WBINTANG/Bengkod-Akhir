@extends('layouts.app')
@section('title', 'Jadwal Periksa')
@section('content_header')
<h1>Jadwal Periksa</h1>
@endsection
@section('content')
<a href="{{ route('jadwal.create') }}" class="btn btn-primary mb-3">+ Tambah Jadwal</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Waktu</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jadwals as $jadwal)
        <tr>
            <td>{{ \Carbon\Carbon::parse($jadwal->waktu)->format('d M Y H:i') }}</td>
            <td>{{ $jadwal->tersedia ? 'Tersedia' : 'Terpakai' }}</td>
            <td>
                <form method="POST" action="{{ route('jadwal.destroy', $jadwal->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus jadwal ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
