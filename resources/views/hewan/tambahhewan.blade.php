@extends('layouts.admin')

@section('judul', 'Tambah Data Hewan')

@section('content')

<form action="/hewan" method="POST">
    @csrf
    <div class="form-group p-3">
        <label>Nama Hewan</label>
        <input type="text" name='nama' class="form-control" placeholder="Masukkan Nama Hewan">
        @error('nama')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group p-3">
      <label>Jenis Hewan</label>
      <input type="text" name='jenis' class="form-control" placeholder="Masukkan Jenis Hewan">
      @error('jenis')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
  </div>
  
  <div class="form-group p-3">
      <label>Usia Hewan</label>
      <input type="number" name='usia' class="form-control" placeholder="Masukkan Usia Hewan">
      @error('usia')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
  </div>
  
  <div class="form-group p-3">
      <label>Harga Hewan</label>
      <input type="number" name='harga' class="form-control" placeholder="Masukkan Harga Hewan">
      @error('harga')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
  </div>
  
  <div class="form-group p-3">
      <label>Deskripsi Hewan</label>
      <input type="text" name='deskripsi' class="form-control" placeholder="Masukkan Deskripsi Hewan">
      @error('deskripsi')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
  </div>
  
  <div class="form-group p-3">
      <label>Stok</label>
      <input type="number" name='stok' class="form-control" placeholder="Masukkan Stok Hewan">
      @error('stok')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
  </div>
  
  <div class="p-3">
      <button type="submit" class="btn btn-primary ">Submit</button>
  </div>
</form>
@endsection  