@extends('template/layout2')

@push('style')
@endpush

@section('content')
    <section class="content">
        <div class="right_col" role="main">
            <!-- /top tiles -->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="dashboard_graph">
                        <div class="row x_title">
                            <div class="col-md-6">
                                <h3>
                                    PROJECT TO 
                                </h3>
                            </div>
                            <div class="col-md-6">
                                <div id="reportrange" class="pull-right"
                                    style="
                                    background: #fff;
                                    cursor: pointer;
                                    padding: 5px 10px;
                                    border: 1px solid #ccc;
                                ">
                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                    <span>December 30, 2014 - January 28, 2015</span>
                                    <b class="caret"></b>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-3 bg-white">
                            <div class="x_title">
                                <h2>Produk Titipan</h2>
                                <div class="float-right ml-auto">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modalFormAplikasi">
                                        Tambah Produk
                                    </button>

                                    <a href="{{ route('export-aplikasi') }}" class="btn btn-success">
                                        <i class="fa fa-file-excel"></i> Export Excel
                                    </a>

                                    <a href="{{ route('aplikasi-export-pdf') }}" class="btn btn-danger">
                                        <i class="fa fa-file-pdf"></i> Export PDF
                                    </a>

                                    <button href="{{ route('import-aplikasi') }}" type="button" class="btn btn-warning btn-import"
                                    data-toggle="modal" data-target="#FormImport">
                                    <i class="fas fa-file-import"></i> Import </button>
                                    
                                </div>
                                <div class="clearfix"></div>
                            </div>


                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                            </ul>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" \
                                            aria-label="Close">
                                        </button>
                                    </div>
                                @endif
                                <div class="mt-3">
                                    @include('aplikasi.data')
                                </div>
                                <!-- Button trigger modal -->

                            </div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <br />
        </div>
        
        @include('aplikasi.form')
        @include('aplikasi.import')
    </section>

@endsection

@push('script')
<script>
    $(document).ready(function() {
        $('#harga_beli').on('input', function(){
            var hargaBeli = $(this).val();
            var hargaJual = Math.round(hargaBeli * 1.7 / 500) * 500; 
            // Menghitung harga jual dengan keuntungan 70% dan pembulatan ke kelipatan 500
            $('#harga_jual').val(hargaJual);
        });
    
        $('#stok').on('click dblclick', function() {
            $('#harga_beli').prop('readonly', false);
            $('#harga_jual').prop('readonly', false);
        });
    
        $('#tbl-aplikasi').DataTable();
    
        $('.alert-success').fadeTo(2000, 500).slideUp(500, function(){
            $('.alert-success').slideUp(500);
        });
    
        $('.alert-danger').fadeTo(2000, 500).slideUp(500, function(){
            $('.alert-danger').slideUp(500);
        });
    
        console.log($('.delete-data'));
    
        $('.delete-data').on('click', function(e){
            e.preventDefault();
            const data = $(this).closest('tr').find('td:eq(1)').text();
            Swal.fire({
                title: `Apakah data <span style="color:red">${data}</span> akan dihapus?`,
                text: "Data tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus data ini!'
            }).then((result) => {
                if (result.isConfirmed)
                    $(e.target).closest('form').submit();
                else
                    swal.close();
            });
        });
    
        $('#modalFormAplikasi').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget);
            const mode = btn.data('mode');
            const nama_produk = btn.data('nama_produk');
            const nama_suppllier = btn.data('nama_suppllier');
            const harga_beli = btn.data('harga_beli');
            const harga_jual = btn.data('harga_jual');
            const stok = btn.data('stok');
            const keterangan = btn.data('keterangan');
            const id = btn.data('id');
            const modal = $(this);
            if(mode === 'edit'){
                modal.find('.modal-title').text('Edit Data');
                modal.find('#nama_produk').val(nama_produk);
                modal.find('#nama_suppllier').val(nama_suppllier);
                modal.find('#harga_beli').val(harga_beli);
                modal.find('#harga_jual').val(harga_jual);
                modal.find('#stok').val(stok);
                modal.find('#keterangan').val(keterangan);
                modal.find('.modal-body form').attr('action', '{{ url('aplikasi')}}/' + id);
                modal.find('#method').html('@method("PATCH")');
            }else{
                modal.find('.modal-title').text('Input Data Aplikasi');
                modal.find('#nama_produk').val('');
                modal.find('#nama_suppllier').val('');
                modal.find('#harga_beli').val('');
                modal.find('#harga_jual').val('');
                modal.find('#stok').val('');
                modal.find('#keterangan').val('');
                modal.find('#method').html('');
                modal.find('.modal-body form').attr('action', '{{ url('aplikasi') }}');
            }
        });
    });
    </script>
@endpush