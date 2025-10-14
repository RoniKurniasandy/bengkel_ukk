@extends('layouts.app')

@section('title', 'Dashboard Mekanik')

@section('content')
<div class="row g-3">
  <div class="col-md-6 col-xl-3">
    <div class="card border-0 shadow-sm">
      <div class="card-body">
        <h6 class="text-muted mb-1"><i class="bi bi-gear-fill me-1"></i> Servis Dikerjakan</h6>
        <h3 class="fw-bold text-primary">{{ $servis_dikerjakan ?? 0 }}</h3>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-3">
    <div class="card border-0 shadow-sm">
      <div class="card-body">
        <h6 class="text-muted mb-1"><i class="bi bi-check-circle me-1"></i> Servis Selesai</h6>
        <h3 class="fw-bold text-success">{{ $servis_selesai ?? 0 }}</h3>
      </div>
    </div>
  </div>
</div>
@endsection
