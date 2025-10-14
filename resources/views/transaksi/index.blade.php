@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Transaksi</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Invoice</th>
                <th>Nama Pelanggan</th>
                <th>Kendaraan</th>
                <th>Total Biaya</th>
                <th>Dibayar</th>
                <th>Status</th>
                <th>Riwayat Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi as $t)
            <tr>
                <td>{{ $t->invoice_no }}</td>
                <td>{{ $t->servis->booking->user->nama }}</td>
                <td>{{ $t->servis->booking->kendaraan->merk }} - {{ $t->servis->booking->kendaraan->no_plat }}</td>
                <td>Rp{{ number_format($t->total_biaya,0,',','.') }}</td>
                <td>Rp{{ number_format($t->dibayar,0,',','.') }}</td>
                <td>{{ ucfirst($t->status_invoice) }}</td>
                <td>
                    <ul>
                        @foreach($t->pembayaran as $p)
                        <li>{{ $p->tanggal_bayar }} - Rp{{ number_format($p->jumlah_bayar,0,',','.') }} ({{ $p->keterangan }})</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
