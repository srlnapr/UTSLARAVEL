<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Hewan; // Correct case for the model name
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPelanggan = Pelanggan::count(); // Counting total number of customers
        $totalStokHewan = Hewan::sum('stok'); // Summing up the 'stok' column from the Hewan table

        // Compact both variables and pass them to the view
        return view('pages.dashboard', compact('totalPelanggan', 'totalStokHewan'));
    }
}
