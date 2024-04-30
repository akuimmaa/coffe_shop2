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

<h1>Data Produk Titipan</h1>
<table id="customers">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Supplier</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th>Stok</th>
        <th>Keterangan</th>
    </tr>
    @php
        $no = 1;
    @endphp
    @foreach ($aplikasi as $p)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $p->nama_produk }}</td>
        <td>{{ $p->nama_suppllier }}</td>
        <td>{{ $p->harga_beli }}</td>
        <td>{{ $p->harga_jual }}</td>
        <td>{{ $p->stok }}</td>
        <td>{{ $p->keterangan }}</td>
    </tr>
    @endforeach
</table>

</body>
</html>
