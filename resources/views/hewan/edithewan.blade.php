@extends('layouts.admin')

@section('judul')
  Edit Data Hewan {{ $hewan->ID_hewan }}
@endsection

@section('content')
<div class="p-3">
    <h2>Edit Data Hewan {{ $hewan->ID_hewan }}</h2>
        <form action="/hewan/{{ $hewan->ID_hewan }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama Hewan</label>
                <input type="text" class="form-control" name="nama" value="{{ $hewan->Nama_Hewan }}" id="nama" placeholder="Masukkan Nama Hewan">
                @error('nama')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jenis">Jenis Hewan</label>
                <input type="text" class="form-control" name="jenis" value="{{ $hewan->Jenis_Hewan }}" id="jenis" placeholder="Masukkan Jenis Hewan">
                @error('jenis')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="usia">Usia Hewan</label>
                <input type="number" class="form-control" name="usia" value="{{ $hewan->Usia_Hewan }}" id="usia" placeholder="Masukkan Usia Hewan">
                @error('usia')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="harga">Harga Hewan</label>
                <input type="number" class="form-control" name="harga" value="{{ $hewan->Harga_Hewan }}" id="harga" placeholder="Masukkan Harga Hewan">
                @error('harga')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi Hewan</label>
                <input type="text" class="form-control" name="deskripsi" value="{{ $hewan->Deskripsi_Hewan }}" id="deskripsi" placeholder="Masukkan Deskripsi Hewan">
                @error('deskripsi')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" class="form-control" name="stok" value="{{ $hewan->Stok }}" id="stok" placeholder="Masukkan Stok Hewan">
                @error('stok')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <a href="/hewan" class="btn btn-success my-3">Kembali</a>
            <button type="submit" class="btn btn-primary">Update Data</button>
        </form>
</div>
@endsection
