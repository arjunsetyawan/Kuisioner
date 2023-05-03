<?php

namespace App\Http\Controllers;

use App\Models\DataDivisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataDivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisi = DB::table('divisi')
            ->get();
        return view('admin.datadivisi.viewdivisi', ['divisi' => $divisi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.datadivisi.tambahdivisi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_divisi' => 'required'
        ]);
        DataDivisi::create($validateData);
        return redirect()->route('viewdivisi')->with('success', 'Divisi baru telah ditambahkan!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataDivisi  $dataDivisi
     * @return \Illuminate\Http\Response
     */
    public function show(DataDivisi $dataDivisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataDivisi  $dataDivisi
     * @return \Illuminate\Http\Response
     */
    public function edit(DataDivisi $dataDivisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataDivisi  $dataDivisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataDivisi $dataDivisi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataDivisi  $dataDivisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataDivisi $id)
    {
        DataDivisi::destroy($id->id);
        return redirect()->route('viewdivisi')->with('sukses', 'Admin telah dihapus!');
    }
}
