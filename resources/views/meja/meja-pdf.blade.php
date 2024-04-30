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

<h1>Data Meja</h1>
<table id="customers">
    <tr>
        <th>No</th>
        <th>Nomor Meja</th>
        <th>Kapasitas</th>
        <th>Status</th>
        <th>Tools</th>
    </tr>
    @php
        $no = 1;
    @endphp
    @foreach ($meja as $p)
    <tr>
        <td>{{ $p->nomor_meja }}</td>
        <td>{{ $p->kapasitas }}</td>
        <td>{{ $p->status }}</td>
    </tr>
    @endforeach
</table>

</body>
</html>