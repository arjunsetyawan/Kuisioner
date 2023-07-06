<?php

namespace App\Http\Controllers;

use App\Models\DataKriteria;
use App\Models\Kuisioner;
use App\Models\Pertanyaan;
use App\Models\User;
use Carbon\Carbon;
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
    //menampilkan halaman kuisioner
    public function index()
    {
        $bulansekarang = Carbon::now()->month;
        $periodeId = DB::table('periode')
            ->where('id_periode', $bulansekarang)
            ->value('id_periode');
        $pertanyaan = DB::table('pertanyaan')
            ->join('kriteria', 'pertanyaan.kriteria_id', '=', 'kriteria.id_kriteria')
            ->join('periode', 'pertanyaan.periode_id', '=', 'periode.id_periode')
            ->where('id_periode', $periodeId)
            ->get();

        //mengambil data user aktif
        $userActive = User::where('users.id', Auth::user()->id)->join('karyawan', 'users.id', '=', 'karyawan.user_id')
            ->first();

        //mengambil data pegawai yang sudah diisi kuisioner
        $userJoin = User::join('hasil', 'users.id', '=', 'hasil.karyawan_id2')->where('hasil.karyawan_id2', Auth::user()->id)->where('hasil.periode_id',  $periodeId)->get();

        //mengambil data karyawan yang satu divisi
        $user = User::where('users.role_id', 2)->join('karyawan', 'users.id', '=', 'karyawan.user_id')->where('karyawan.divisi_id', $userActive->divisi_id)->get();

        // dd($userJoin, $user, $periodeId);

        //filter data
        $filterUser = [];
        $idUserJoin = [];
        // mengambil id data pegawai yang sudah mengisi
        foreach ($userJoin as $item) {
            array_push($idUserJoin, $item->karyawan_id);
        }
        //menambah id user aktif
        array_push($idUserJoin, Auth::user()->id);

        //mengambil id user yang saatu divisi
        $idUser = [];
        foreach ($user as $item) {
            array_push($idUser, $item->user_id);
        }

        //memfilter
        foreach ($idUser as $item) {
            if (!in_array($item, $idUserJoin)) {
                array_push($filterUser, $item);
            }
        }

        //mengambil data user yang sudah difilter
        $users = [];
        foreach ($filterUser as $item) {
            $user = User::where('id', $item)->first();
            array_push($users, $user);
        }
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

    //menyimpan data kuisioner
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
        return redirect()->route('viewkuisioner')->with('success', 'Kuisioner berhasil diisi!');
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
