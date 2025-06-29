@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content_header')
    <h1>Profil Saya</h1>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-primary text-white d-flex align-items-center">
                        <i class="fas fa-user-circle fa-2x me-2"></i>
                        <h5 class="mb-0">Informasi Akun</h5>
                    </div>
                    <div class="card-body text-center">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($profil->name) }}&background=random&size=100" class="rounded-circle mb-3" width="100" height="100" alt="Avatar">

                        <table class="table table-bordered table-striped w-75 mx-auto">
                            <tr>
                                <th class="text-start">Nama</th>
                                <td class="text-start">{{ $profil->name }}</td>
                            </tr>
                            <tr>
                                <th class="text-start">Email</th>
                                <td class="text-start">{{ $profil->email }}</td>
                            </tr>
                            <tr>
                                <th class="text-start">Role</th>
                                <td class="text-start text-capitalize">{{ $profil->role }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('home') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <a href="{{ route('dokter.profil.edit', $profil->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
