@extends('template.layout')

@push('style')
@endpush
@section('content')
    <!-- page content -->

    <div class="right_col" role="main">
        <div class="">
            <div class="row" style="display: inline-block;">
                <div class="top_tiles">
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                            <div class="count">{{ $count_transaksi }}</div>
                            <h3>Transaksi </h3>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-comments-o"></i></div>
                            <div class="count">RP. {{ $pendapatan }}</div>
                            <h3>Jumlah Pendapatan</h3>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                            <div class="count">Rp. 345.000</div>
                            <h3>Laba Rugi</h3>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-users"></i></div>
                            <div class="count">{{ $count_pelanggan }}</div>
                            <h3>Pelanggan</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Grafik Pendapatan</h2>
                            <div class="filter">
                                <div id="reportrange" class="pull-right"
                                    style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                    <span>December 30, 2023 - January 28, 2025</span> <b class="caret"></b>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="col-12 " style="margin-bottom: 10rem">
                                <div class="demo-container" style="height:280px">
                                    <div id="chart" class=""></div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">

                            <!-- top 5 penjualan -->
                            <div class="col-4">
                                <div class="col-md-5 col-sm-12 ">
                                    <div style="width: 320px; padding-right: 15px;">
                                        <div>
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Top 5 Penjualan</h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                        </li>
                                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                        </li>
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                    <div style="display: flex; margin-top: 10px;">
                                                        <button class="btn btn-primary flex-grow-1">Produk</button>
                                                        <button class="btn btn-info flex-grow-1">Pelanggan</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            @foreach ($stok as $p)
                                                <div class="card p-3">
                                                    <img class="img-fluid" style="max-width: 100px;"
                                                        src="{{ asset('storage/menu-image/' . $p->menu->image) }}"
                                                        alt="">
                                                    <strong>{{ $p->menu->nama_menu }}</strong><br>
                                                    <p>{{ $p->jumlah }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- jumlah stok terendah -->
                            <div class="col-4">
                                <div>
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Stok Menu</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <ul class="list-unstyled top_profiles scroll-view">
                                            @foreach ($stok as $p)
                                                <li class="media event">
                                                    <a>
                                                        <img width="70px" src="{{ asset('image') }}/{{ $p->menu->image }}"
                                                            alt="" style="margin-right: 20px;">
                                                    </a>
                                                    <div class="media-body">
                                                        <a class="title" style="font-size: 18px;">Menu :
                                                            {{ $p->menu->nama_menu }}</a>
                                                        <p style="font-size: 14px;"><strong>Stok :
                                                                {{ $p->jumlah }}</strong></p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Transaksi Terbaru -->
                            <div class="col-4">
                                <div style="width: 320px;">
                                    <div class="x_title">
                                        <h2>Transaksi Terbaru</h2>
                                    </div>
                                    <div>
                                        <!-- Tambahkan kode untuk menampilkan transaksi terbaru di sini -->
                                        @foreach ($transaksi as $transaksi)
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p>{{ $transaksi->created_at }}</p>
                                        <p>Total: Rp{{ $transaksi->total_harga }}</p>
                                    </div>
                                </li>
                                @endforeach
                                    </div>
                                </div>
                            </div>
                          </div>

                        </div>
                    </div>
                </div>
            </div>
        @endsection

        @push('script')

<script src="https://cdn.canvasjs.com/ga/canvasjs.min.js"></script>

            <script>
                window.onload = function() {
                    var dataPenjualan = [];
                    var dataJmlTransaksi = [];

                    var chart;

                    $.get("{{ url('data_penjualan') }}/0", function(data) {
                        console.log(data)
                        $.each(data, function(key, value) {
                            let dat = value['tanggal'];
                            let year = dat.substring(0, 4);
                            let month = dat.substring(5, 7) - 1;
                            let day = dat.substring(8, 10);
                            // console.log(year+"-"+month+"-"+day);
                            dataPenjualan.push({
                                x: new Date(year, month, day),
                                y: parseInt(value['total_bayar'])
                            });

                            dataJmlTransaksi.push({
                                x: new Date(year, month, day),
                                y: parseInt(value['jumlah'])
                            });
                        });

                        chart = new CanvasJS.Chart("chart", {
                            title: {
                                text: "Grafik Pendapatan"
                            },
                            axisY: {
                                title: "Penjualan",
                                lineColor: "#C24642",
                                tickColor: "#C24642",
                                labelFontColor: "#C24642",
                                titleFontColor: "#C24642",
                                includeZero: true,
                                suffix: ""
                            },
                            axisY2: {
                                title: "Pendapatan",
                                lineColor: "#7F6084",
                                tickColor: "#7F6084",
                                labelFontColor: "#7F6084",
                                titleFontColor: "#7F6084",
                                includeZero: true,
                                prefix: "",
                                suffix: ""
                            },
                            toolTip: {
                                shared: true
                            },
                            legend: {
                                cursor: "pointer",
                                itemclick: toggleDataSeries
                            },
                            data: [{
                                    type: "line",
                                    name: "Penjualan",
                                    color: "#C24642",
                                    axisYIndex: 0,
                                    showInLegend: true,
                                    dataPoints: dataJmlTransaksi
                                },
                                {
                                    type: "line",
                                    name: "Pendapatan",
                                    color: "#7F6084",
                                    axisYType: "secondary",
                                    showInLegend: true,
                                    dataPoints: dataPenjualan
                                }
                            ]
                        });
                        chart.render();
                        updateChart();
                    });


                    function updateChart() {
                        $.get("{{ url('data_penjualan') }}/" + dataJmlTransaksi.length, function(data) {
                            console.log(data)
                            $.each(data, function(key, value) {
                                let date = value['tanggal'];
                                let year = date.substring(0, 4);
                                let month = date.substring(5, 7) - 1;
                                let day = date.substring(8, 10);
                                console.log(year + "-" + month + "-" + day);
                                dataPenjualan.push({
                                    x: new Date(year, month, day),
                                    y: parseInt(value['total_bayar'])
                                });

                                if (dataPenjualan.length == 1)
                                    dataJmlTransaksi.pop({
                                        x: new Date(year, month, day),
                                        y: parseInt(value['jumlah'])
                                    });
                                else
                                    dataJmlTransaksi.push({
                                        x: new Date(year, month, day),
                                        y: parseInt(value['jumlah'])
                                    });

                            });
                        });
                        chart.render();
                        setTimeout(function() {
                            updateChart()
                        }, 10000);
                    }

                    function toggleDataSeries(e) {
                        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                            e.dataSeries.visible = false;
                        } else {
                            e.dataSeries.visible = true;
                        }
                        e.chart.render();
                    }

                }
            </script>
        @endpush
