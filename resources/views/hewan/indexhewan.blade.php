@extends('layouts.admin')

@section('judul')
Data Hewan
@endsection

@section('content')

<div class="p-3">
    <a href="/tambahhewan" class="btn btn-primary my-3">Tambah Data Hewan</a>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama </th>
                <th scope="col">Jenis </th>
                <th scope="col">Usia </th>
                <th scope="col">Harga </th>
                <th scope="col">Deskripsi </th>
                <th scope="col">Stok</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($hewan as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->Nama_Hewan }}</td>
                <td>{{ $item->Jenis_Hewan }}</td>
                <td>{{ $item->Usia_Hewan }}</td>
                <td>{{ $item->Harga_Hewan }}</td>
                <td>{{ $item->Deskripsi_Hewan }}</td>
                <td>{{ $item->Stok }}</td>
                <td class="mr-3">
                    <a href="/hewan/{{ $item->ID_hewan }}" class="btn btn-info">Show</a>
                    <a href="/hewan/{{ $item->ID_hewan }}/edit" class="btn btn-primary mr-1">Edit</a>
                    <form action="/hewan/{{ $item->ID_hewan }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" data-confirm-delete="true">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8">No data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection

@section('scripts')
<!-- Your script for DataTables goes here -->
<script src="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example1').DataTable();
    });
</script>
@endsection
