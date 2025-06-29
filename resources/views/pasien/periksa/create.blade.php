@extends('layouts.app')

@section('title', 'Tambah Permintaan Periksa')
@section('content_header')
    <h1>Permintaan Periksa Baru</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('pasien.periksa.store') }}">
                @csrf

                <div class="form-group">
                    <label for="jadwal_id">Pilih Jadwal Tersedia</label>
                    <select name="jadwal_id" id="jadwal_id" class="form-control" required>
    <option value="">-- Pilih Jadwal --</option>
    @foreach ($jadwals as $jadwal)
        <option value="{{ $jadwal->id }}">
            {{ $jadwal->dokter->name }} - {{ \Carbon\Carbon::parse($jadwal->waktu)->format('d M Y, H:i') }}
        </option>
    @endforeach
</select>
                </div>

                <div class="d-flex justify-content-end" style="gap:10px;">
                    <button type="submit" class="btn btn-success">Ajukan</button>
                    <a href="{{ route('periksa.pasienindex') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
