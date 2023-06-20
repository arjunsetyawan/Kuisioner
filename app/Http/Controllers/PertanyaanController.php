<?php

namespace App\Http\Controllers;

use App\Models\DataKriteria;
use App\Models\Periode;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pertanyaan = DB::table('pertanyaan')
            ->join('periode', 'pertanyaan.periode_id', '=', 'periode.id_periode')
            ->join('kriteria', 'pertanyaan.kriteria_id', '=', 'kriteria.id_kriteria')
            ->paginate(6);
        // dd($pertanyaan);
        return view('admin.datapertanyaan.viewpertanyaan', ['pertanyaan' => $pertanyaan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.datapertanyaan.tambahpertanyaan', ['kriterias' => DataKriteria::all(), 'periodes' => Periode::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'kriteria_id' => 'required',
            'nama_pertanyaan' => 'required',
            'periode_id' => 'required'
        ]);


        Pertanyaan::create($validateData);
        return redirect()->route('viewpertanyaan')->with('success', 'Pertanyaan baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pertanyaan $pertanyaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $data = Pertanyaan::find($id);
        // dd($data);
        return view('admin.datapertanyaan.updatepertanyaan', ['kriterias' => DataKriteria::all(), 'periodes' => Periode::all(), 'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pertanyaan $id)
    {
        $validateData = $request->validate([
            'kriteria_id' => 'required',
            'nama_pertanyaan' => 'required',
            'periode_id' => 'required'
        ]);

        // dd($validateData);
        $id->update($validateData);
        return redirect()->route('viewpertanyaan')->with('sukses', 'Data Pertanyaan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pertanyaan $id)
    {
        Pertanyaan::destroy($id->id);
        return redirect()->route('viewpertanyaan')->with('sukses', 'Data Pertanyaan berhasil dihapus!');
    }
}
