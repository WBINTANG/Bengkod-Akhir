@extends('layouts.app')

@section('title', 'Tambah Poli')
@section('content_header')
    <h1>Tambah Poli</h1>
@endsection

@section('content')
    <form action="{{ route('poli.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_poli" class="form-label">Nama Poli</label>
            <input type="text" name="nama_poli" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('poli.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
