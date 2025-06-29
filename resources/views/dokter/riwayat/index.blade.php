@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Daftar Pasien yang Pernah Diperiksa</h3>
    <ul class="list-group">
        @forelse ($pasiens as $pasien)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $pasien->name }}
                <a href="{{ route('dokter.riwayat.show', $pasien->id) }}" class="btn btn-sm btn-primary">Lihat Riwayat</a>
            </li>
        @empty
            <li class="list-group-item">Belum ada pasien yang diperiksa.</li>
        @endforelse
    </ul>
</div>
@endsection
