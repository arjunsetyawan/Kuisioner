<?php

namespace App\Http\Controllers;

use App\Models\DataKriteria;
use App\Models\Kuisioner;
use App\Models\Pertanyaan;
use App\Models\User;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KuisionerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pertanyaan = DB::table('pertanyaan')
            ->join('kriteria', 'pertanyaan.kriteria_id', '=', 'kriteria.id_kriteria')
            ->get();
        $userJoin = User::join('hasil', 'users.id', '=', 'hasil.karyawan_id')->where('hasil.karyawan_id2', Auth::user()->id)->get();
        $user = User::where('role_id', 2)->get();
        $filterUser = [];

        $idUserJoin = [];
        foreach ($userJoin as $item) {
            array_push($idUserJoin, $item->karyawan_id);
        }
        array_push($idUserJoin, Auth::user()->id);

        $idUser = [];
        foreach ($user as $item) {
            array_push($idUser, $item->id);
        }

        foreach ($idUser as $item) {
            if (!in_array($item, $idUserJoin)) {
                array_push($filterUser, $item);
            }
        }
        // dd($filterUser, $idUserJoin);

        $users = [];
        foreach ($filterUser as $item) {
            $user = User::where('id', $item)->first();
            array_push($users, $user);
        }


        // $userFilter = User::where('id', '!=', $user[0]->id)->where('role_id', 2)->get();
        // dd($userFilter);
        return view('user.viewkuisioner', ['pertanyaan' => $pertanyaan, 'kriteria' => DataKriteria::all(), 'users' => $users]);
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
        $datas = $request->all();
        // dd($datas);

        $attitude = 0;
        $kedisiplinan = 0;
        $inisiatif = 0;
        $leadership = 0;
        $kerjasama = 0;
        $kehadiran = 0;
        $tanggungjawab = 0;
        $komunikasi = 0;
        foreach ($datas as $index => $value) {
            if ($index != '_token' || $index != 'value_essay' || $index != 'periode' || $index != 'karyawan_id') {
                // dd($index);
                $dataKriteria = Pertanyaan::where('id', $index)->first();
                // dd($dataKriteria);
                if ($dataKriteria != null) {

                    if ($dataKriteria->kriteria_id == 1) {
                        $attitude += (int)$value;
                    } elseif (
                        $dataKriteria->kriteria_id == 2
                    ) {
                        $kedisiplinan += (int)$value;
                    } elseif (
                        $dataKriteria->kriteria_id == 3
                    ) {
                        $inisiatif += (int)$value;
                    } elseif (
                        $dataKriteria->kriteria_id == 4
                    ) {
                        $leadership += (int)$value;
                    } elseif (
                        $dataKriteria->kriteria_id == 5
                    ) {
                        $kerjasama += (int)$value;
                    } elseif (
                        $dataKriteria->kriteria_id == 6
                    ) {
                        $kehadiran += (int)$value;
                    } elseif (
                        $dataKriteria->kriteria_id == 7
                    ) {
                        $tanggungjawab += (int)$value;
                    } elseif (
                        $dataKriteria->kriteria_id == 8
                    ) {
                        $komunikasi += (int)$value;
                    }
                }
            }
        }

        $data = [
            'karyawan_id' => $request->karyawan_id,
            'karyawan_id2' => auth()->user()->id,
            'tanggal_pengisian' => Carbon::now(),
            'attitude' => $attitude,
            'kedisiplinan' => $kedisiplinan,
            'inisiatif' => $inisiatif,
            'leadership' => $leadership,
            'kerjasama' => $kerjasama,
            'kehadiran' => $kehadiran,
            'tanggungjawab' => $tanggungjawab,
            'komunikasi' => $komunikasi,
            'value_essay' => $request->value_essay,
            'periode_id' => $request->periode,
        ];
        Kuisioner::create($data);
        // dd($attitude, $kedisiplinan, $inisiatif, $leadership, $kerjasama, $kehadiran, $tanggungjawab, $komunikasi);
        // dd($request->all()); //cek data

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kuisioner  $kuisioner
     * @return \Illuminate\Http\Response
     */
    public function show(Kuisioner $kuisioner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kuisioner  $kuisioner
     * @return \Illuminate\Http\Response
     */
    public function edit(Kuisioner $kuisioner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kuisioner  $kuisioner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kuisioner $kuisioner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kuisioner  $kuisioner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kuisioner $kuisioner)
    {
        //
    }
}
