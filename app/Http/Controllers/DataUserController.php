<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\DataUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DataUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
            ->where('role_id', '=', '2')
            ->get();
        return view('admin.datauser.viewuser', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.datauser.tambahuser', ['roles' => Role::all()]);
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
            'username' => 'required|min:5',
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:255',
            'role_id' => 'required'
        ]);
        $validateData['password'] = Hash::make($validateData['password']);
        DataUser::create($validateData);
        return redirect()->route('viewuser')->with('success', 'User baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataUser  $dataUser
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataUser  $dataUser
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataUser  $dataUser
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataUser  $dataUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataUser $id)
    {
        DataUser::destroy($id->id);
        return redirect()->route('viewuser')->with('sukses', 'Admin telah dihapus!');
    }
}
