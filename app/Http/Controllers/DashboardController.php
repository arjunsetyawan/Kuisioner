<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //menampilkan halaman dashboard
    public function index()
    {
        $bulansekarang = Carbon::now()->month;
        $periodeId = DB::table('periode')
            ->where('id_periode', $bulansekarang)
            ->value('id_periode');

        if (Auth::user()) {
            //menampilkan dashboard admin
            if (Auth::user()->role_id == 1 && Auth::user()->status == "Active") {
                $users = DB::table('users')->count();
                $divisi = DB::table('divisi')->count();
                $kriteria = DB::table('kriteria')->count();
                $pertanyaan = DB::table('pertanyaan')->count();
                $ajuan = DB::table('ajuan')->count();
                return view('admin.index', ['users' => $users, 'divisi' => $divisi, 'kriteria' => $kriteria, 'pertanyaan' => $pertanyaan, 'ajuan' => $ajuan]);

                //Menampilkan dashboard Hrd
            } elseif (Auth::user()->role_id == 3 && Auth::user()->status == "Active") {
                $users = DB::table('users')->count();
                $divisi = DB::table('divisi')->count();
                $kriteria = DB::table('kriteria')->count();
                $pertanyaan = DB::table('pertanyaan')->count();
                $hasil = DB::table('hasil')->where('periode_id', $periodeId)->count();
                $karyawan = DB::table('users')->where('role_id', 2)->count();
                $selisih = $karyawan - $hasil;
                return view('admin.index', ['users' => $users, 'divisi' => $divisi, 'kriteria' => $kriteria, 'pertanyaan' => $pertanyaan, 'hasil' => $hasil, 'selisih' => $selisih, 'karyawan' => $karyawan]);

                //Menampilkan dashboard User
            } elseif (Auth::user()->role_id == 2 && Auth::user()->status == "Active") {
                $data = DB::table('kriteria')
                    ->get();
                return view('user.index', ['data' => $data]);
            }
            return view('auth.login');
        }
        $data = DB::table('kriteria')
            ->get();
        return view('user.index', ['data' => $data]);
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
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
