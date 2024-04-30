<div class="x_content">
    <div class="table-responsive">
        <table class="table table-compact table stripped" id="tbl-absensi">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Tanggal Masuk</th>
                    <th>Waktu Masuk</th>
                    <th>Status</th>
                    <th>Waktu Selesai Kerja</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($absensi  as $p)
            <tr>
                <td>{{ $i = !isset ($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->nama_karyawan }}</td>
                <td>{{ $p->tanggal_masuk }}</td>
                <td>{{ $p->waktu_masuk }}</td>
                <td>{{ $p->status }}</td>
                <td>{{ $p->waktu_selesai }}</td>
                <td>
                    <button class="btn text-warning" data-toggle="modal" data-target="#modalFormAbsensi" data-mode="edit"
                        data-id="{{ $p->id }}" data-nama_karyawan="{{ $p->nama_karyawan }}" data-tanggal_masuk="{{ $p->tanggal_masuk }}" data-waktu_masuk="{{ $p->waktu_masuk }}" 
                        data-status="{{ $p->status }}" data-waktu_selesai="{{ $p->waktu_selesai }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="post" action="{{ route('absensi.destroy', $p->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn text-danger delete-data" data-nama="{{ $p->nama_karyawan }}" data-tanggal_masuk="{{ $p->tanggal_masuk }}" 
                            data-waktu_masuk="{{ $p->waktu_masuk }}" data-status="{{ $p->status }}" data-waktu_selesai="{{ $p->waktu_selesai }}">
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