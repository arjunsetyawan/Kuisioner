<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Hasil;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view = DB::table('karyawan')
            ->join('users', 'karyawan.user_id', '=', 'users.id')
            ->orderByDesc('divisi_id')
            ->get();
        return view('admin.datahasil.viewhasil', ['view' => $view]);
    }

    public function cetak()
    {
        $bulansekarang = Carbon::now()->month;
        $periodeId = DB::table('periode')
            ->where('id_periode', $bulansekarang)
            ->value('id_periode');
        $cetak = DB::table('hasil')
            ->join('periode', 'hasil.periode_id', '=', 'periode.id_periode')
            ->join('users', 'hasil.karyawan_id', '=', 'users.id')
            ->leftJoin('users as u2', 'hasil.karyawan_id2', '=', 'u2.id')
            ->select('hasil.*', 'users.nama as nama_karyawan', 'u2.nama as nama_karyawan2', 'periode.bulan')
            ->where('id_periode', $periodeId)
            ->get();
        // dd($cetak);
        return view('admin.datahasil.cetakhasil', ['cetak' => $cetak]);
    }

    //menampilkan halaman hasil kuisioner user
    public function hasilPenilaian()
    {
        $hasil = DB::table('hasil')
            ->selectRaw('AVG(attitude) as averageAttitude,
                     AVG(kedisiplinan) as averageKedisplinan,
                     AVG(inisiatif) as averageInisiatif,
                     AVG(leadership) as averageLeadership,
                     AVG(kerjasama) as averageKerjasama,
                     AVG(kehadiran) as averageKehadiran,
                     AVG(tanggungjawab) as averageTanggungjawab,
                     AVG(komunikasi) as averageKomunikasi')
            ->where('karyawan_id', auth()->user()->id)
            ->first();

        $pengisi = DB::table('hasil')
            ->where('karyawan_id', auth()->user()->id)
            ->count();
        // dd($pengisi);

        $users = Auth::user();
        $karyawan = Karyawan::where('divisi_id', $users->karyawan2->divisi_id)->count();

        $saran = DB::table('hasil')
            ->where('karyawan_id', auth()->user()->id)
            ->get();

        return view('user.datahasil.hasilkuisioner', ['hasil' => $hasil, 'saran' => $saran, 'pengisi' => $pengisi, 'karyawan' => $karyawan]);
    }

    //mencetak halaman hasil kuisioner user
    public function cetakPenilaian()
    {
        $hasil = DB::table('hasil')
            ->selectRaw('AVG(attitude) as averageAttitude,
                 AVG(kedisiplinan) as averageKedisplinan,
                 AVG(inisiatif) as averageInisiatif,
                 AVG(leadership) as averageLeadership,
                 AVG(kerjasama) as averageKerjasama,
                 AVG(kehadiran) as averageKehadiran,
                 AVG(tanggungjawab) as averageTanggungjawab,
                 AVG(komunikasi) as averageKomunikasi')
            ->where('karyawan_id', auth()->user()->id)
            ->first();

        $saran = DB::table('hasil')
            ->where('karyawan_id', auth()->user()->id)
            // ->orderByDesc('id')
            ->get();

        $hasil1 = DB::table('hasil')
            ->where('karyawan_id', '=', auth()->user()->id)
            ->join('periode', 'hasil.periode_id', '=', 'periode.id_periode')
            ->orderByDesc('id')
            ->first();
        // dd($hasil1);

        return view('user.datahasil.cetakkuisioner', ['hasil1' => $hasil1, 'hasil' => $hasil, 'saran' => $saran]);
    }

    public function detail($id, Request $request)
    {
        // dd($request->bulan);

        $searchBulan = $request->bulan;
        $bulansekarang = Carbon::now()->month;
        $periodeId = DB::table('periode')
            ->where('id_periode', $bulansekarang)
            ->value('id_periode');

        $datadetail = DB::table('hasil')
            ->where('karyawan_id', $id)
            ->where('periode_id', $bulansekarang)
            ->get();
        // dd($datadetail);

        // dd($dataAvg);
        if ($searchBulan != null) {
            $datadetail = DB::table('hasil')
                ->where('karyawan_id', $id)
                ->where('periode_id', $searchBulan)
                ->get();
        }

        $dataAvg =  [
            'attitude' => 0,
            'kedisiplinan' => 0,
            'inisiatif' => 0,
            'leadership' => 0,
            'kerjasama' => 0,
            'kehadiran' => 0,
            'tanggungjawab' => 0,
            'komunikasi'    => 0,
        ];

        $count = count($datadetail);
        // dd($count);

        foreach ($datadetail as $detail) {
            $dataAvg['attitude'] += $detail->attitude;
            $dataAvg['kedisiplinan'] += $detail->kedisiplinan;
            $dataAvg['inisiatif'] += $detail->inisiatif;
            $dataAvg['leadership'] += $detail->leadership;
            $dataAvg['kerjasama'] += $detail->kerjasama;
            $dataAvg['kehadiran'] += $detail->kehadiran;
            $dataAvg['tanggungjawab'] += $detail->tanggungjawab;
            $dataAvg['komunikasi'] += $detail->komunikasi;
        }

        $dataAvg['attitude'] = $dataAvg['attitude'] / $count;
        $dataAvg['kedisiplinan'] = $dataAvg['kedisiplinan'] / $count;
        $dataAvg['inisiatif'] = $dataAvg['inisiatif'] / $count;
        $dataAvg['leadership'] = $dataAvg['leadership'] / $count;
        $dataAvg['kerjasama'] = $dataAvg['kerjasama'] / $count;
        $dataAvg['kehadiran'] = $dataAvg['kehadiran'] / $count;
        $dataAvg['tanggungjawab'] = $dataAvg['tanggungjawab'] / $count;
        $dataAvg['komunikasi'] = $dataAvg['komunikasi'] / $count;

        // dd($datadetail, $detail, $dataAvg);
        $periode = DB::table('periode')
            ->get();

        $datakaryawan = DB::table('hasil')
            ->join('karyawan', 'hasil.karyawan_id', '=', 'karyawan.user_id')
            ->where('karyawan_id', $id)
            ->first();
        // dd($datakaryawan);

        return view('/admin/datahasil/detailhasil', ['datadetail' => $dataAvg, 'periode' => $periode, 'searchBulan' => $searchBulan, 'datakaryawan' => $datakaryawan]);
    }

    public function datadetail($id)
    {
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
     * @param  \App\Models\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function show(Hasil $hasil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function edit(Hasil $hasil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hasil $hasil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hasil $hasil)
    {
        //
    }
}
