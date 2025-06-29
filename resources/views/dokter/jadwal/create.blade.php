@extends('layouts.app')
@section('title', 'Tambah Jadwal')
@section('content_header')
<h1>Tambah Jadwal Periksa</h1>
@endsection
@section('content')
<form method="POST" action="{{ route('jadwal.store') }}">
    @csrf
    <div class="form-group">
        <label for="waktu">Waktu Periksa</label>
        <input type="datetime-local" name="waktu" class="form-control" required>
    </div>
    <button class="btn btn-success mt-3">Simpan</button>
    <a href="{{ route('jadwal.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</form>
@endsection
