<!DOCTYPE html>
<html>
<head>
<style>
    #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #d10404;
    color: white;
    text-align: center;
    }

    h1{
        text-align: center;
    }
</style>
</head>
<body>

<h1>Data Karyawan</h1>
<table id="customers">
    <tr>
        <th>No</th>
        <th>Nama Karyawan</th>
        <th>Tanggal Masuk</th>
        <th>Waktu Masuk</th>
        <th>Status</th>
        <th>Waktu Selesai Kerja</th>
    </tr>
    @php
        $no = 1;
    @endphp
    @foreach ($absensi as $p)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $p->nama_karyawan }}</td>
        <td>{{ $p->tanggal_masuk }}</td>
        <td>{{ $p->waktu_masuk }}</td>
        <td>{{ $p->status }}</td>
        <td>{{ $p->waktu_selesai }}</td>
    </tr>
    @endforeach
</table>

</body>
</html>