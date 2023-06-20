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
        <p style="margin-left:10px;"> <b>Periode : {{ $hasil->  bulan}}</b> </p>
        <p style="margin-left:10px"> <b>Tanggal Pengisian : {{ Carbon::parse($hasil->tanggal_pengisian)->format('d-m-Y') }}</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width:100%;">
            <thead>
                <tr>
                    <th rowspan="2" style="width: 5%;" class="text-center">No</th>
                    <!-- <th rowspan="2" style="width: 15%" class="text-center">Kriteria</th> -->
                    <th rowspan="2" style="width: 15%" class="text-center">Kriteria</th>
                    <th colspan="2" class="text-center" class="text-center">Penilaian</th>
                    <th rowspan="2" class="text-center" style="width:40%">Saran</th>
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
                    <td>{{ number_format($hasil->attitude * 100/12 ) }}%</td>
                    <td>
                        @if ($hasil->attitude <= 3) Anda memiliki attitude yang kurang aik @elseif($hasil->attitude <= 6) Anda memiliki attitude yang cukup baik @elseif($hasil->attitude <= 9) Anda memiliki attitude yang baik @elseif($hasil->attitude <= 12) Anda memiliki attitude yang sangat baik @endif </td>
                    <td rowspan="8" style="text-align : justify;">{{ $hasil->value_essay }}</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Kedisiplinan</td>
                    <td>{{ number_format($hasil->kedisiplinan * 100/12) }}%</td>
                    <td>
                        @if ($hasil->kedisiplinan <= 3) Anda memiliki kedisiplinan yang kurang baik @elseif($hasil->kedisiplinan <= 6) Anda memiliki kedisiplinan yang cukup baik @elseif($hasil->kedisiplinan <= 9) Anda memiliki kedisiplinan yang baik @elseif($hasil->kedisiplinan <= 12) Anda memiliki kedisiplinan yang sangat baik @endif </td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Inisiatif</td>
                    <td>{{ number_format($hasil->inisiatif * 100/12) }}%</td>
                    <td>
                        @if ($hasil->inisiatif <= 3) Anda memiliki inisiatif yang kurang baik @elseif($hasil->inisiatif <= 6) Anda memiliki inisiatif yang cukup baik @elseif($hasil->inisiatif <= 9) Anda memiliki inisiatif yang baik @elseif($hasil->inisiatif <= 12) Anda memiliki inisiatif yang sangat baik @endif </td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>Leadership</td>
                    <td>{{ number_format($hasil->leadership *100/12) }}%</td>
                    <td>
                        @if ($hasil->leadership <= 3) Anda memiliki leadership yang kurang baik @elseif($hasil->leadership <= 6) Anda memiliki leadership yang cukup baik @elseif($hasil->leadership <= 9) Anda memiliki leadership yang baik @elseif($hasil->leadership <= 12) Anda memiliki leadership yang sangat baik @endif </td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td>Kerjasama</td>
                    <td>{{ number_format($hasil->kerjasama *100/12) }}%</td>
                    <td>
                        @if ($hasil->kerjasama <= 3) Anda memiliki kerjasama yang kurang baik @elseif($hasil->kerjasama <= 6) Anda memiliki kerjasama yang cukup baik @elseif($hasil->kerjasama <= 9) Anda memiliki kerjasama yang baik @elseif($hasil->kerjasama <= 12) Anda memiliki kerjasama yang sangat baik @endif </td>
                </tr>
                <tr>
                    <td>6.</td>
                    <td>Kehadiran</td>
                    <td>{{ number_format($hasil->kehadiran *100/12) }}%</td>
                    <td>
                        @if ($hasil->kehadiran <= 3) Anda memiliki kehadiran yang kurang baik @elseif($hasil->kehadiran <= 6) Anda memiliki kehadiran yang cukup baik @elseif($hasil->kehadiran <= 9) Anda memiliki kehadiran yang baik @elseif($hasil->kehadiran <= 12) Anda memiliki kehadiran yang sangat baik @endif </td>
                </tr>
                <tr>
                    <td>7.</td>
                    <td>Tanggung Jawab</td>
                    <td>{{ number_format($hasil->tanggungjawab *100/12) }}%</td>
                    <td>
                        @if ($hasil->tanggungjawab <= 3) Anda memiliki tanggung jawab yang kurang baik @elseif($hasil->tanggungjawab <= 6) Anda memiliki tanggung jawab yang cukup baik @elseif($hasil->tanggungjawab <= 9) Anda memiliki tanggung jawab yang baik @elseif($hasil->tanggungjawab <= 12) Anda memiliki tanggung jawab yang sangat baik @endif </td>
                </tr>
                <tr>
                    <td>8.</td>
                    <td>Komunikasi</td>
                    <td>{{ number_format($hasil->komunikasi *100/12) }}%</td>
                    <td>
                        @if ($hasil->komunikasi <= 3) Anda memiliki komunikasi yang kurang baik @elseif($hasil->komunikasi <= 6) Anda memiliki komunikasi yang cukup baik @elseif($hasil->komunikasi <= 9) Anda memiliki komunikasi yang baik @elseif($hasil->komunikasi <= 12) Anda memiliki komunikasi yang sangat baik @endif </td>
                </tr>
            </tbody>
        </table>
    </div>

    <p style="margin-left:20px; margin-top:30px;"><b>Keterangan</b></p>
    <p style="margin-left:20px; ">>75%  : Sangat Baik</p>
    <p style="margin-left:20px; "><=75% : Baik</p>
    <p style="margin-left:20px; "><=50% : Cukup</p>
    <p style="margin-left:20px; "><=25% : Kurang</p>

    <p style="text-align: right; margin-top:70px; margin-right: 52px;"><b>Surakarta, {{ Carbon::now()->format('d-m-Y') }}</b></p>
    <p style="text-align: right; margin-right: 40px;"><b>HRD Monster Group Solo</b></p>
    <p style="text-align: right; margin-right: 75px; margin-top:100px;"><b>Burhan Riyadi</b></p>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
