<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    //
    public function create()
    {
        $kategori = Kategori::all();

        return view('kategori.tambah', ['kategori' => $kategori]);
    }

    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama,
        ]);

        Alert::success('Success', 'Data Berhasil');
        return redirect('/kategori'); 
    }
}