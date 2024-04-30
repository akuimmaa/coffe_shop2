@extends('template/layout')

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
                                    PROJECT UJIKOM
                                </h3>
                            </div>
                            <div class="col-md-6 text-center"> <!-- Tanggal di tengah -->
                                <div id="reportrange"
                                     style="
                                     background: #fff;
                                     cursor: pointer;
                                     padding: 5px 10px;
                                     border: 1px solid #ccc;
                                     display: inline-block; <!-- Tampilkan dalam satu baris -->
                                 ">
                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                    <span>December 30, 2014 - January 28, 2015</span>
                                    <b class="caret"></b>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-3 bg-white">
                            <div class="x_title">
                                <div class="row align-items-center"> <!-- Menggunakan grid dan align-items-center -->
                                    <div class="col-md-4"> <!-- Bagian kiri -->
                                        <div class="input-group date" id="tanggalAwal" data-target-input="nearest">
                                            <input type="date" class="form-control datetimepicker-input"
                                                   data-target="#tanggalAwal" placeholder="Tanggal Awal"/>
                                            <div class="input-group-append" data-target="#tanggalAwal"
                                                 data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4"> <!-- Bagian kanan -->
                                        <div class="input-group date" id="tanggalAkhir" data-target-input="nearest">
                                            <input type="date" class="form-control datetimepicker-input"
                                                   data-target="#tanggalAkhir" placeholder="Tanggal Akhir"/>
                                            <div class="input-group-append" data-target="#tanggalAkhir"
                                                 data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="float-right ml-auto">
                                        <a href="{{ route('export-jenis')}}" class="btn btn-success">
                                            <i class="fa fa-file-excel"></i> Export
                                        </a>
                                        <a href="{{ route('export-jenis-pdf')}}" class="btn btn-danger">
                                            <i class="fa fa-file-pdf"></i> Export PDF
                                        </a>
                                </div>
                                </div>
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
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close">
                                        </button>
                                    </div>
                                @endif
                                <div class="mt-3">
                                    @include('laporan.data')
                                </div>
                                <!-- Button trigger modal -->
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <br/>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $('#tbl-laporan').DataTable()
    </script>
@endpush