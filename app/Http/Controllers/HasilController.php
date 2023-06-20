<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hasil = DB::table('hasil')
            ->join('periode', 'hasil.periode_id', '=', 'periode.id')
            ->join('users', 'hasil.karyawan_id', '=', 'users.id')
            ->leftJoin('users as u2', 'hasil.karyawan_id2', '=', 'u2.id')
            ->select('hasil.*', 'users.nama as nama_karyawan', 'u2.nama as nama_karyawan2', 'periode.bulan')
            ->get();
        // dd($hasil);
        return view('admin.datahasil.viewhasil', ['hasil' => $hasil]);
    }

    public function cetak()
    {
        $cetak = DB::table('hasil')
            ->join('periode', 'hasil.periode_id', '=', 'periode.id')
            ->join('users', 'hasil.karyawan_id', '=', 'users.id')
            ->get();
        return view('admin.datahasil.cetakhasil', ['cetak' => $cetak]);
    }

    public function hasilPenilaian()
    {
        $hasil = DB::table('hasil')
            ->where('karyawan_id2', '=', auth()->user()->id)
            ->first();
        return view('user.datahasil.hasilkuisioner', ['hasil' => $hasil]);
    }

    public function cetakPenilaian()
    {
        $hasil = DB::table('hasil')
            ->where('karyawan_id2', '=', auth()->user()->id)
            ->join('periode', 'hasil.periode_id', '=', 'periode.id')
            ->first();
        return view('user.datahasil.cetakkuisioner', ['hasil' => $hasil]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function show(Hasil $hasil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function edit(Hasil $hasil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hasil $hasil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hasil $hasil)
    {
        //
    }
}
