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

     //menampilkan halaman data divisi
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

     //menampilkan halaman tambah data divisi
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

     //menyimpan data divisi
    public function store(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'nama_divisi' => 'required',
            'kode_divisi' => 'required'
        ]);
        // dd($validateData);
        DataDivisi::create($validateData);
        return redirect()->route('viewdivisi')->with('success',  'Divisi baru telah ditambahkan!');
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

    //menampilkan halaman edit data divisi
    public function edit($id)
    {
        $data = DataDivisi::find($id);

        return view('admin.datadivisi.updatedivisi', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataDivisi  $dataDivisi
     * @return \Illuminate\Http\Response
     */

     //menyimpan data divisi yang telah diupdate
    public function update(Request $request, DataDivisi $id)
    {
        $validateData = $request->validate([
            'nama_divisi' => 'required',
            'kode_divisi' => 'required'
        ]);
        // dd($id);
        $id->update($validateData);
        // DataDivisi::create($validateData);
        return redirect()->route('viewdivisi')->with('success', 'Sukses update!');
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
        return redirect()->route('viewdivisi')->with('sukses', 'Divisi telah dihapus!');
    }
}
