
@extends('layouts.admin')

@section('judul', 'Detail Data Hewan')

@section('content')

<div class="p-3">
<div class="card" style="width: 24rem;">
    <div class="card-body">
        <h5 class="card-title">Detail Data Hewan ke {{ $hewan->ID_hewan }}</h5>
        <h4>{{ $hewan->Nama_Hewan }}</h4>
        <h4>{{ $hewan->Jenis_Hewan }}</h4>
        <h4>{{ $hewan->Usia_Hewan }}</h4>
        <h4>{{ $hewan->Harga_Hewan }}</h4>
        <h4>{{ $hewan->Deskripsi_Hewan }}</h4>
        <h4>{{ $hewan->Stok }}</h4>
    </div>
</div>
<a href="/hewan" class="btn btn-primary my-3">Kembali</a>

</div>
@endsection