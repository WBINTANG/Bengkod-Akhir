@extends('layouts.app')

@section('title', 'Edit Poli')
@section('content_header')
    <h1>Edit Poli</h1>
@endsection

@section('content')
    <form action="{{ route('poli.update', $poli->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_poli" class="form-label">Nama Poli</label>
            <input type="text" name="nama_poli" value="{{ old('nama_poli', $poli->nama_poli) }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan', $poli->keterangan) }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('poli.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
