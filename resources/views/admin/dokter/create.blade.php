@extends('layouts.app') 

@section('title', 'Tambah User')
@section('content_header')
    <h1>Tambah User</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.dokter.store') }}" method="POST">
                @csrf {{-- Proteksi CSRF wajib --}}
                
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" placeholder="Nama lengkap" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Alamat email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Minimal 6 karakter" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Ulangi password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <x-adminlte-select name="role">
                        <x-adminlte-options :options="['admin' => 'Admin', 'dokter' => 'Dokter', 'pasien' => 'Pasien']" empty-option="Pilih role"/>
                    </x-adminlte-select>
                </div>

                <div class="wrapper d-flex justify-content-end" style="gap:10px;">
                    <button type="submit" class="btn btn-success">Tambah</button>
                    <a href="{{ route('admin.dokter') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
