<div class="x_content">
    <div class="table-responsive">
        <table class="table table-compact table stripped" id="tbl-aplikasi">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Supplier</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Keterangan</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($aplikasi  as $p)
            <tr>
                <td>{{ $i = !isset ($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->nama_produk }}</td>
                <td>{{ $p->nama_suppllier }}</td>
                <td>{{ $p->harga_beli }}</td>
                <td>{{ $p->harga_jual }}</td>
                <td>{{ $p->stok }}</td>
                <td>{{ $p->keterangan }}</td>
                <td>

                    <button class="btn text-warning" data-toggle="modal" data-target="#modalFormAplikasi" data-mode="edit"
                        data-id="{{ $p->id }}" data-nama_produk="{{ $p->nama_produk }}" 
                        data-nama_suppllier="{{ $p->nama_suppllier }}" data-harga_beli="{{ $p->harga_beli }}" 
                        data-harga_jual="{{ $p->harga_jual }}" data-stok="{{ $p->stok }}" data-keterangan="{{ $p->keterangan }}">
                        <i class="fas fa-edit"></i>
                    </button>

                    <form method="post" action="{{ route('aplikasi.destroy', $p->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn text-danger delete-data" data-nama="{{ $p->aplikasi }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
        </table>
    </div>
</div>