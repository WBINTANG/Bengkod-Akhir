@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content_header')
    <h1>Edit Profil Saya</h1>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-warning text-white d-flex align-items-center">
                        <i class="fas fa-user-edit fa-2x me-2"></i>
                        <h5 class="mb-0">Form Edit Profil</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dokter.profil.update', ['user' => $profil->id]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $profil->name) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $profil->email) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password Baru <small>(kosongkan jika tidak ingin diubah)</small></label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Isi jika ingin mengubah password">
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('profil.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
