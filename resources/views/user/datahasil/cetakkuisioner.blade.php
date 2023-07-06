@php
use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Hasil</title>
</head>

<body>
    <div class="form-group">
        <h3 align="center"><b>Laporan Hasil Penilaian</b></h3>
        <p style="margin-left:10px; margin-top:40px;"> <b>Nama : {{ auth()->user()->nama }}</b> </p>
        <p style="margin-left:10px;"> <b>Periode : {{ $hasil1->  bulan}}</b> </p>
        <p style="margin-left:10px"> <b>Tanggal : {{ Carbon::parse($hasil1->tanggal_pengisian)->format('d-m-Y') }}</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width:100%;">
            <thead>
                <tr>
                    <th rowspan="2" style="width: 5%;" class="text-center">No</th>
                    <!-- <th rowspan="2" style="width: 15%" class="text-center">Kriteria</th> -->
                    <th rowspan="2" style="width: 15%" class="text-center">Kriteria</th>
                    <th colspan="2" class="text-center" class="text-center">Penilaian</th>
                    @if ($saran->count()>1)
                    <th rowspan="2" colspan="{{$saran->count() }}" class="text-center" style="width:40%">Saran</th>
                    @endif
                </tr>
                <tr>
                    <th class="text-center" style="width: 5%">Hasil</th>
                    <th class="text-center" style="width: 40%">Konversi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <td>Atitude</td>
                    <td>{{ number_format($hasil->averageAttitude * 100/12 ) }}%</td>
                    <td>
                        @if ($hasil->averageAttitude <= 3) Anda memiliki attitude yang kurang aik @elseif($hasil->averageAttitude <= 6) Anda memiliki attitude yang cukup baik @elseif($hasil->averageAttitude <= 9) Anda memiliki attitude yang baik @elseif($hasil->averageAttitude <= 12) Anda memiliki attitude yang sangat baik @endif </td>
                                        @foreach ($saran as $data )
                    <td rowspan="8">{{ $data->value_essay }}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Kedisiplinan</td>
                    <td>{{ number_format($hasil->averageKedisplinan * 100/12) }}%</td>
                    <td>
                        @if ($hasil->averageKedisplinan <= 3) Anda memiliki kedisiplinan yang kurang baik @elseif($hasil->averageKedisplinan <= 6) Anda memiliki kedisiplinan yang cukup baik @elseif($hasil->averageKedisplinan <= 9) Anda memiliki kedisiplinan yang baik @elseif($hasil->averageKedisplinan <= 12) Anda memiliki kedisiplinan yang sangat baik @endif </td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Inisiatif</td>
                    <td>{{ number_format($hasil->averageInisiatif * 100/12) }}%</td>
                    <td>
                        @if ($hasil->averageInisiatif <= 3) Anda memiliki inisiatif yang kurang baik @elseif($hasil->averageInisiatif <= 6) Anda memiliki inisiatif yang cukup baik @elseif($hasil->averageInisiatif <= 9) Anda memiliki inisiatif yang baik @elseif($hasil->averageInisiatif <= 12) Anda memiliki inisiatif yang sangat baik @endif </td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>Leadership</td>
                    <td>{{ number_format($hasil->averageLeadership *100/12) }}%</td>
                    <td>
                        @if ($hasil->averageLeadership <= 3) Anda memiliki leadership yang kurang baik @elseif($hasil->averageLeadership <= 6) Anda memiliki leadership yang cukup baik @elseif($hasil->averageLeadership <= 9) Anda memiliki leadership yang baik @elseif($hasil->averageLeadership <= 12) Anda memiliki leadership yang sangat baik @endif </td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td>Kerjasama</td>
                    <td>{{ number_format($hasil->averageKerjasama *100/12) }}%</td>
                    <td>
                        @if ($hasil->averageKerjasama <= 3) Anda memiliki kerjasama yang kurang baik @elseif($hasil->averageKerjasama <= 6) Anda memiliki kerjasama yang cukup baik @elseif($hasil->averageKerjasama <= 9) Anda memiliki kerjasama yang baik @elseif($hasil->averageKerjasama <= 12) Anda memiliki kerjasama yang sangat baik @endif </td>
                </tr>
                <tr>
                    <td>6.</td>
                    <td>Kehadiran</td>
                    <td>{{ number_format($hasil->averageKehadiran *100/12) }}%</td>
                    <td>
                        @if ($hasil->averageKehadiran <= 3) Anda memiliki kehadiran yang kurang baik @elseif($hasil->averageKehadiran <= 6) Anda memiliki kehadiran yang cukup baik @elseif($hasil->averageKehadiran <= 9) Anda memiliki kehadiran yang baik @elseif($hasil->averageKehadiran <= 12) Anda memiliki kehadiran yang sangat baik @endif </td>
                </tr>
                <tr>
                    <td>7.</td>
                    <td>Tanggung Jawab</td>
                    <td>{{ number_format($hasil->averageTanggungjawab *100/12) }}%</td>
                    <td>
                        @if ($hasil->averageTanggungjawab <= 3) Anda memiliki tanggung jawab yang kurang baik @elseif($hasil->averageTanggungjawab <= 6) Anda memiliki tanggung jawab yang cukup baik @elseif($hasil->averageTanggungjawab <= 9) Anda memiliki tanggung jawab yang baik @elseif($hasil->averageTanggungjawab <= 12) Anda memiliki tanggung jawab yang sangat baik @endif </td>
                </tr>
                <tr>
                    <td>8.</td>
                    <td>Komunikasi</td>
                    <td>{{ number_format($hasil->averageKomunikasi *100/12) }}%</td>
                    <td>
                        @if ($hasil->averageKomunikasi <= 3) Anda memiliki komunikasi yang kurang baik @elseif($hasil->averageKomunikasi <= 6) Anda memiliki komunikasi yang cukup baik @elseif($hasil->averageKomunikasi <= 9) Anda memiliki komunikasi yang baik @elseif($hasil->averageKomunikasi <= 12) Anda memiliki komunikasi yang sangat baik @endif </td>
                </tr>
            </tbody>

        </table>
    </div>

    <p style="margin-left:20px; margin-top:30px;"><b>Keterangan</b></p>
    <p style="margin-left:20px; ">>75% : Sangat Baik</p>
    <p style="margin-left:20px; ">
        <=75% : Baik</p>
            <p style="margin-left:20px; ">
                <=50% : Cukup</p>
                    <p style="margin-left:20px; ">
                        <=25% : Kurang</p>

                            <p style="text-align: right; margin-top:70px; margin-right: 52px;"><b>Surakarta, {{ Carbon::now()->format('d-m-Y') }}</b></p>
                            <p style="text-align: right; margin-right: 40px;"><b>HRD Monster Group Solo</b></p>
                            <p style="text-align: right; margin-right: 75px; margin-top:100px;"><b>Burhan Riyadi</b></p>

                            <script type="text/javascript">
                                window.print();
                            </script>
</body>

</html>