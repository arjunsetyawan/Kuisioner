<?php

namespace App\Http\Controllers;

use App\Models\DataDivisi;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //menampilkan halaman profil
    public function index()
    {
        $profil = DB::table('karyawan')
            ->where('user_id', '=', auth()->user()->id)
            ->first();
        // dd($profil);
        return view('user.profil_user', ['divisis' => DataDivisi::all(), 'profil' => $profil]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //menyimpan data profil jika belum ada data
    public function store(Request $request)
    {
        $profile = Profil::where('user_id', '=', auth()->user()->id)->first();
        if (!$profile) {
            $validateData = $request->validate([
                'nama' => 'required',
                'tanggal_masuk' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required|',
                'gender' => 'required',
                'divisi_id' => 'required',
                'no_telp' => 'required|numeric',
                'alamat' => 'required',
                'user_id' => 'required',
            ]);
            Profil::create($validateData);

            // update data profil jika sudah ada data
        } else {
            $validateData = $request->validate([
                'nama' => 'required',
                'tanggal_masuk' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'gender' => 'required',
                'divisi_id' => 'required',
                'no_telp' => 'required|numeric',
                'alamat' => 'required',
                'user_id' => 'required',
            ]);
            $profile->update($validateData);
        }
        return redirect()->route('viewprofil')->with('success', 'Profil berhasil ditambahkan!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(Profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit(Profil $profil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profil $profil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profil $profil)
    {
        //
    }
}
