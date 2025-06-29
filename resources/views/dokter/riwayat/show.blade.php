@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Riwayat Pemeriksaan {{ $pasien->name }}</h2>

    @if ($riwayat->isEmpty())
        <p>Belum ada riwayat pemeriksaan.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Catatan</th>
                    <th>Biaya Periksa</th>
                    <th>Obat</th>
                    <th>Total Biaya</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($riwayat as $r)
                @php
                    $totalObat = $r->obats->sum('harga');
                    $totalBiaya = $r->biaya_periksa + $totalObat;
                @endphp
                <tr>
                    <td>{{ $r->tgl_periksa }}</td>
                    <td>{{ $r->catatan }}</td>
                    <td>Rp{{ number_format($r->biaya_periksa, 0, ',', '.') }}</td>
                    <td>
                        @if ($r->obats->count())
                            <ul class="mb-0 ps-3">
                                @foreach ($r->obats as $obat)
                                    <li>{{ $obat->nama_obat }} (Rp{{ number_format($obat->harga, 0, ',', '.') }})</li>
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
    @endif
</div>
@endsection
