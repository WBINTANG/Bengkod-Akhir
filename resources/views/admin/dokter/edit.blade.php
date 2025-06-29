@extends('layouts.app')

@section('title', 'Edit User')
@section('content_header')
    <h1>Edit User</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.dokter.update', ['dokter' => $dokter->id]) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" placeholder="Nama lengkap" class="form-control"
                        value="{{ old('name', $dokter->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Alamat email" class="form-control"
                        value="{{ old('email', $dokter->email) }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Password (opsional)</label>
                    <input type="password" name="password" id="password" placeholder="Isi jika ingin mengganti password"
                        class="form-control">
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <x-adminlte-select name="role">
                        <option value="admin" {{ $dokter->role === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="dokter" {{ $dokter->role === 'dokter' ? 'selected' : '' }}>Dokter</option>
                        <option value="pasien" {{ $dokter->role === 'pasien' ? 'selected' : '' }}>Pasien</option>
                    </x-adminlte-select>
                </div>

                <div class="wrapper d-flex justify-content-end" style="gap: 10px;">
                    <button type="submit" class="btn btn-success">Ubah</button>
                    <a href="{{ route('admin.dokter') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
