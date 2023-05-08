<?php

namespace App\Http\Controllers;

use App\Models\DataKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = DB::table('kriteria')
            ->get();
        return view('admin.datakriteria.viewkriteria', ['kriteria' => $kriteria]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.datakriteria.tambahkriteria');
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
            'kriteria' => 'required',
            'detail_kriteria' => 'required'
        ]);
        DataKriteria::create($validateData);
        return redirect()->route('viewkriteria')->with('success', 'Kriteria baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataKriteria  $dataKriteria
     * @return \Illuminate\Http\Response
     */
    public function show(DataKriteria $dataKriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataKriteria  $dataKriteria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DataKriteria::find($id);
        // dd($id);
        return view('admin.datakriteria.updatekriteria', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataKriteria  $dataKriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataKriteria $id)
    {
        $validateData = $request->validate([
            'kriteria' => 'required',
            'detail_kriteria' => 'required'
        ]);
        // dd($id);
        $id->update($validateData);
        return redirect()->route('viewkriteria')->with('success', 'Sukses update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataKriteria  $dataKriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataKriteria $id)
    {
        DataKriteria::destroy($id->id);
        return redirect()->route('viewkriteria')->with('sukses', 'Kriteria telah dihapus!');
    }
}
