<div class="x_content">
    <div class="table-responsive">
        <table class="table table-compact table stripped" id="tbl-jenis">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($jenis  as $p)
            <tr>
                <td>{{ $i = !isset ($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->nama_jenis }}</td>
                <td>
                    <button class="btn text-warning" data-toggle="modal" data-target="#modalFormJenis" data-mode="edit"
                        data-id="{{ $p->id }}" data-nama_jenis="{{ $p->nama_jenis }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="post" action="{{ route('jenis.destroy', $p->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn text-danger delete-data" data-nama="{{ $p->nama_jenis }}">
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