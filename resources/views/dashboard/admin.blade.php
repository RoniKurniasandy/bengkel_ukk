@extends('layouts.app')
@section('title', 'Dashboard Admin - Bengkel Mobil Sejahtera')

@section('content')
<div class="container-fluid py-4">
  <div class="row g-3 mb-4">
    <div class="col-md-6 col-xl-3">
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <h6 class="text-muted mb-2"><i class="bi bi-tools me-2"></i>Servis Aktif</h6>
          <h3 class="fw-bold">{{ $servis_aktif ?? 0 }}</h3>
          <small class="text-muted">Pekerjaan sedang berlangsung</small>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xl-3">
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <h6 class="text-muted mb-2"><i class="bi bi-receipt me-2"></i>Total Transaksi</h6>
          <h3 class="fw-bold">{{ $transaksi_hari_ini ?? 0 }}</h3>
          <small class="text-muted">Transaksi hari ini</small>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xl-3">
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <h6 class="text-muted mb-2"><i class="bi bi-people me-2"></i>Total Pelanggan</h6>
          <h3 class="fw-bold">{{ $jumlah_user ?? 0 }}</h3>
          <small class="text-muted">Akun pelanggan terdaftar</small>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xl-3">
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <h6 class="text-muted mb-2"><i class="bi bi-person-gear me-2"></i>Total Mekanik</h6>
          <h3 class="fw-bold">{{ $jumlah_mekanik ?? 0 }}</h3>
          <small class="text-muted">Mekanik aktif</small>
        </div>
      </div>
    </div>
  </div>

  <!-- Servis Terbaru -->
  <div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
      <h5 class="mb-0"><i class="bi bi-car-front me-2"></i>Servis Terbaru</h5>
      <a href="#" class="btn btn-light btn-sm">Lihat Semua</a>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover mb-0 align-middle">
          <thead class="table-light">
            <tr>
              <th>No.</th>
              <th>Nama Pelanggan</th>
              <th>Kendaraan</th>
              <th>Jenis Servis</th>
              <th>Status</th>
              <th>Tanggal</th>
            </tr>
          </thead>
          <tbody>
            @forelse($servis_terbaru ?? [] as $index => $s)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ data_get($s, 'nama_pelanggan', '—') }}</td>
              <td>{{ data_get($s, 'kendaraan', '—') }}</td>
              <td>{{ data_get($s, 'jenis_servis', '—') }}</td>
              <td>
                <span class="badge bg-{{ data_get($s, 'status') == 'selesai' ? 'success' : 'warning' }}">
                  {{ ucfirst(data_get($s, 'status', 'proses')) }}
                </span>
              </td>
              <td>{{ data_get($s, 'tanggal', '-') }}</td>
            </tr>
            @empty
            <tr>
              <td colspan="6" class="text-center text-muted py-4">Belum ada data servis terbaru.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
