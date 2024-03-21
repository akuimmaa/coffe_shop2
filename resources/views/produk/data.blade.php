<div class="x_content">
    <div class="table-responsive">
        <table class="table table-compact table stripped" id="tbl-produk">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kode</th>
                    <th>Category</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($produk  as $p)
            <tr>
                <td>{{ $i = !isset ($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->nama_produk }}</td>
                <td>{{ $p->kode_produk}}</td>
                <td>{{ $p->category_id }}</td>
                <td>{{ $p->harga_beli }}</td>
                <td>{{ $p->harga_jual }}</td>
                <td>{{ $p->stok }}</td>
                <td>
                    <button class="btn text-warning" data-toggle="modal" data-target="#modalFormProduk" data-mode="edit"
                        data-id="{{ $p->id }}" data-nama_produk="{{ $p->nama_produk }}" data-kode_produk="{{ $p->kode_produk }}" data-category_id="{{ $p->category_id }}" data-harga_beli="{{ $p->harga_beli }}" data-harga_jual="{{ $p->harga_jual }}" data-stok="{{ $p->stok }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="post" action="{{ route('produk.destroy', $p->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn text-danger delete-data" data-nama="{{ $p->produk }}">
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