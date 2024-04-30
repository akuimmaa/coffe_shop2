<div class="x_content">
    <div class="table-responsive">
        <table class="table table-compact table stripped" id="tbl-meja">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Meja</th>
                    <th>Kapasitas</th>
                    <th>Status</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($meja  as $p)
            <tr>
                <td>{{ $i = !isset ($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->nomor_meja }}</td>
                <td>{{ $p->kapasitas }}</td>
                <td>{{ $p->status }}</td>
                <td>
                    <button class="btn text-warning" data-toggle="modal" data-target="#modalFormMeja" data-mode="edit"
                        data-id="{{ $p->id }}" data-nomor_meja="{{ $p->nomor_meja }}" data-kapasitas="{{ $p->kapasitas }}"  data-status="{{ $p->status }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="post" action="{{ route('meja.destroy', $p->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn text-danger delete-data" data-nama="{{ $p->meja }}">
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