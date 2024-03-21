<div class="x_content">
    <div class="table-responsive">
        <table class="table table-compact table stripped" id="tbl-category">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($category  as $p)
            <tr>
                <td>{{ $i = !isset ($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->nama }}</td>
                <td>
                    <button class="btn text-warning" data-toggle="modal" data-target="#modalFormCategory" data-mode="edit"
                        data-id="{{ $p->id }}" data-nama="{{ $p->nama }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="post" action="{{ route('category.destroy', $p->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn text-danger delete-data" data-nama="{{ $p->nama_category }}">
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