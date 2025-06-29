@extends('layouts.app')

@section('subtitle', 'Periksa')
@section('content_header_title', 'Periksa')

@section('content_body')

<div class="container">

    {{-- CARD: Form Periksa --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <strong>Pengajuan Periksa</strong>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover mb-0">
                <thead>
                    <tr>
                        <th>Pasien</th>
                        <th>Dokter</th>
                        <th>Tanggal Periksa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($periksas as $periksa)
                        <tr>
                            <td>{{ $periksa->pasien->name ?? '-' }}</td>
                            <td>{{ $periksa->dokter->name ?? '-' }}</td>
                            <td>{{ $periksa->tgl_periksa }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-right mt-3">
                <a href="{{ route('pasien.periksa.create') }}" class="btn btn-primary">
                    <i class="fas fa-paper-plane"></i> Ajukan Periksa
                </a>
            </div>
        </div>
    </div>

    {{-- CARD: Riwayat Periksa --}}
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <strong>Riwayat Periksa</strong>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead>
                    <tr>
                        <th>Pasien</th>
                        <th>Dokter</th>
                        <th>Tanggal Periksa</th>
                        <th>Catatan</th>
                        <th>Biaya Periksa</th>
                        <th>Obat</th>
                        <th>Biaya Obat</th>
                        <th>Total Biaya</th> {{-- Kolom baru --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($periksas as $periksa)
                        @php
                            $totalObat = $periksa->obats->sum('harga');
                            $totalBiaya = $periksa->biaya_periksa + $totalObat;
                        @endphp
                        <tr>
                            <td>{{ $periksa->pasien->name ?? '-' }}</td>
                            <td>{{ $periksa->dokter->name ?? '-' }}</td>
                            <td>{{ $periksa->tgl_periksa }}</td>
                            <td>{{ $periksa->catatan }}</td>
                            <td>Rp{{ number_format($periksa->biaya_periksa, 0, ',', '.') }}</td>
                            <td>
                                @if($periksa->obats->count())
                                    <ul class="mb-0 ps-3" style="list-style: none; padding-left: 0;">
                                        @foreach($periksa->obats as $obat)
                                            <li>{{ $obat->nama_obat }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span>-</span>
                                @endif
                            </td>
                            <td>
                                @if($periksa->obats->count())
                                    <ul class="mb-0 ps-3" style="list-style: none; padding-left: 0;">
                                        @foreach($periksa->obats as $obat)
                                            <li>Rp{{ number_format($obat->harga, 0, ',', '.') }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span>-</span>
                                @endif
                            </td>
                            <td><strong>Rp{{ number_format($totalBiaya, 0, ',', '.') }}</strong></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
