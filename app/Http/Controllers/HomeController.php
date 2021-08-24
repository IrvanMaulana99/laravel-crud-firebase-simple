<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use PDF;

class HomeController extends Controller
{
    public function users()
    {
        return view('mahasiswa');
    }
    public function cetak_pdf()
    {
        $mhs = User::all();

        $pdf = PDF::loadview('mahasiswa_pdf', ['mahasiswa' => $mhs]);
        return $pdf->download('laporan-mahasiswa-pdf');
    }
}
