@php
use Carbon\Carbon;
@endphp



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Hasil Penilaian</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width:95%;">
            <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Tanggal Pengisian</th>
                <th>Attitude</th>
                <th>Kedisiplinan</th>
                <th>Inisiatif</th>
                <th>Leadership</th>
                <th>Kerjasama</th>
                <th>Kehadiran</th>
                <th>Tanggung Jawab</th>
                <th>Komunikasi</th>
                <th>Saran untuk karyawan</th>
                <th>Periode</th>
            </tr>

            @php $no = 1; @endphp
            @foreach ($cetak as $data)
            <tr>
                <th>{{ $no++ }}</th>
                <td>{{ $data->nama }}</td>
                <td>{{ Carbon::parse($data->tanggal_pengisian)->format('d-m-Y') }}</td>
                <td>
                                @if ($data->attitude <= 3)
                                Kurang
                                @elseif($data->attitude <= 6)
                                Cukup
                                @elseif($data->attitude <= 9)
                                Baik
                                @elseif($data->attitude <= 12)
                                Sangat Baik
                                @endif
                            </td>
                            <td>
                                @if ($data->kedisiplinan <= 3)
                                Kurang
                                @elseif($data->kedisiplinan <= 6)
                                Cukup
                                @elseif($data->kedisiplinan <= 9)
                                Baik
                                @elseif($data->kedisiplinan <= 12)
                                Sangat Baik
                                @endif
                            </td>
                            <td>
                                @if ($data->inisiatif <= 3)
                                Kurang
                                @elseif($data->inisiatif <= 6)
                                Cukup
                                @elseif($data->inisiatif <= 9)
                                Baik
                                @elseif($data->inisiatif <= 12)
                                Sangat Baik
                                @endif
                            </td>
                            <td>
                                @if ($data->leadership <= 3)
                                Kurang
                                @elseif($data->leadership <= 6)
                                Cukup
                                @elseif($data->leadership <= 9)
                                Baik
                                @elseif($data->leadership <= 12)
                                Sangat Baik
                                @endif
                            </td>
                            <td>
                                @if ($data->kerjasama <= 3)
                                Kurang
                                @elseif($data->kerjasama <= 6)
                                Cukup
                                @elseif($data->kerjasama <= 9)
                                Baik
                                @elseif($data->kerjasama <= 12)
                                Sangat Baik
                                @endif
                            </td>
                            <td>
                                @if ($data->kehadiran <= 3)
                                Kurang
                                @elseif($data->kehadiran <= 6)
                                Cukup
                                @elseif($data->kehadiran <= 9)
                                Baik
                                @elseif($data->kehadiran <= 12)
                                Sangat Baik
                                @endif
                            </td>
                            <td>
                                @if ($data->tanggungjawab <= 3)
                                Kurang
                                @elseif($data->tanggungjawab <= 6)
                                Cukup
                                @elseif($data->tanggungjawab <= 9)
                                Baik
                                @elseif($data->tanggungjawab <= 12)
                                Sangat Baik
                                @endif
                            </td>
                            <td>
                                @if ($data->komunikasi <= 3)
                                Kurang
                                @elseif($data->komunikasi <= 6)
                                Cukup
                                @elseif($data->komunikasi <= 9)
                                Baik
                                @elseif($data->komunikasi <= 12)
                                Sangat Baik
                                @endif
                            </td>
                <td>{{ $data->value_essay }}</td>
                <td>{{ $data->bulan }}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
