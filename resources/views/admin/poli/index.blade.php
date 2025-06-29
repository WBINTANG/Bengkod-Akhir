@extends('layouts.app')

@section('title', 'Data Poli')
@section('content_header')
    <h1>Data Poli</h1>
@endsection

@section('content')
    <a href="{{ route('poli.create') }}" class="btn btn-primary mb-3">+ Tambah Poli</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Poli</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($poli as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_poli }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <a href="{{ route('poli.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('poli.destroy', $item->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
