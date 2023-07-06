<?php

namespace App\Http\Controllers;

use App\Models\DataAdmin;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DataAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Menampilkan halaman data admin
    public function index()
    {
        $users = DB::table('users')
            ->where('role_id', '=', '1')
            ->get();
        return view('admin.dataadmin.viewadmin', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //menampilkan halaman tambah data admin
    public function create()
    {
        return view('admin.dataadmin.tambahadmin', ['roles' => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //menyimpan data admin
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:5',
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:255',
            'role_id' => 'required',
            'status' => 'required'
        ]);
        $validateData['password'] = Hash::make($validateData['password']);
        DataAdmin::create($validateData);
        return redirect()->route('viewadmin')->with('success', 'Admin baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataAdmin  $dataAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(DataAdmin $dataAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataAdmin  $dataAdmin
     * @return \Illuminate\Http\Response
     */

     //menampilkan halaman edit data admin
    public function edit($id)
    {
        $data = DataAdmin::find($id);
        return view('admin.dataadmin.updateadmin', ['data' => $data, 'roles' => Role::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataAdmin  $dataAdmin
     * @return \Illuminate\Http\Response
     */

     //mengupdate data admin
    public function update(Request $request, DataAdmin $id)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:5',
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:255',
            'role_id' => 'required',
            'status' => 'required'
        ]);
        $validateData['password'] = Hash::make($validateData['password']);
        $id->update($validateData);
        return redirect()->route('viewadmin')->with('success', 'Sukses update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataAdmin  $dataAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataAdmin $id)
    {
        DataAdmin::destroy($id->id);
        return redirect()->route('viewadmin')->with('sukses', 'Admin telah dihapus!');
    }
}
