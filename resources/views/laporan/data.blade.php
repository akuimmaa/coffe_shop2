<div class="x_content">
    <div class="table-responsive">
        <table class="table table-compact table stripped" id="tbl-laporan">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Transaksi Id</th>
                    <th>Menu</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($detail_transaksi  as $p)
            <tr>
                <td>{{ $i = !isset ($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->transaksi_id }}</td>
                <td>{{ $p->menu_id }}</td>
                <td>{{ $p->jumlah }}</td>
                <td>{{ $p->subtotal }}</td>

                    <button class="btn text-warning" data-toggle="modal" data-target="#modalFormPelanggan" data-mode="edit"
                        data-id="{{ $p->id }}" data-nama_pelanggan="{{ $p->nama_pelanggan }}" data-email="{{ $p->email }}" data-no_telp="{{ $p->no_telp }}" data-alamat="{{ $p->alamat }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="post" action="{{ route('pelanggan.destroy', $p->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn text-danger delete-data" data-nama="{{ $p->nama_pelanggan }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
            </tr>
        @endforeach
    </tbody>
        </table>
    </div>
</div>