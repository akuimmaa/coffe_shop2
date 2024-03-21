<div class="x_content">
    <div class="table-responsive">
        <table class="table table-compact table stripped" id="tbl-stok">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Menu Id</th>
                    <th>Jumlah</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($stok  as $p)
            <tr>
                <td>{{ $i = !isset ($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->menu->nama_menu }}</td>
                <td>{{ $p->jumlah }}</td>
                <td>
                    <button class="btn text-warning" data-toggle="modal" data-target="#modalFormStok" data-mode="edit"
                        data-id="{{ $p->id }}" data-menu_id="{{ $p->menu_id }}" data-jumlah="{{ $p->jumlah }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="post" action="{{ route('stok.destroy', $p->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn text-danger delete-data" data-nama="{{ $p->menu_id }}">
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