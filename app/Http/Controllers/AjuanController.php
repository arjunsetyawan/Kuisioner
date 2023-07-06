<?php

namespace App\Http\Controllers;

use App\Models\Ajuan;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Menampilkan halaman data ajuan
    public function index()
    {
        $ajuan = DB::table('ajuan')
            ->get();
        return view('/admin/dataajuan/viewajuan', ['ajuan' => $ajuan]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //menampilkan halaman update data ajuan
    public function edit($id)
    {
        $data = Ajuan::find($id);
        return view('/admin/dataajuan/updateajuan', ['data' => $data, 'roles' => Role::all()]);
    }

    /**
     * Update the specified resource in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //menyimpan data ajuan
    public function update(Request $request, Ajuan $id)
    {
        $validateData = $request->validate([
            'status_ajuan' => 'required'
        ]);
        $id->update($validateData);
        return redirect()->route('viewajuan')->with('success', 'Sukses update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
