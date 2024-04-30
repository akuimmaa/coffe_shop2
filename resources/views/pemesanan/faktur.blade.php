
<body>
    <h2>I M A R T </h2>
    <h5>Jl. BandaNeira No. 45, 280465 </h5>
    <hr>
    <h5>No. Faktur : {{ $transaksi->id }}</h5>
    <h5>{{ $transaksi->tanggal }}</h5>
    <table border="0">
        <thead>
            <tr>
                <td>Qty</td>
                <td>Item</td>
                <td>Harga</td>
                <td>Total</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi->detailTransaksi as $item)
            <tr>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->menu->nama_menu }}</td>
                <td>{{ number_format($item->menu->harga,0,",",".") }}</td>
                <td>{{ number_format($item->subtotal,0,",",".") }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Total</td>
                <td>{{ number_format($transaksi->total_harga,0,",",".") }}</td>
            </tr>
        </tfoot>
    </table>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        h5 {
            margin: 5px 0;
        }

        hr {
            border: 0;
            border-top: 1px solid #ccc;
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border-bottom: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        tfoot td {
            font-weight: bold;
        }

        p {
            text-align: center;
            font-style: italic;
        }
</style>
</body>