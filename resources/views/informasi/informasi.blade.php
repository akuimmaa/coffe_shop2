@extends('template/layout2')

@push('style')
@endpush

@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tentang Aplikasi</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tentang Aplikasi <small>informasi</small></h2>
                    <div class="clearfix"></div>
                    </div>
                    <div class="info-section">
                        <div class="info-card">
                            <h2>Tentang Aplikasi</h2>
                            <p>Deskripsi singkat tentang aplikasi ini.</p>
                        </div>
                        <div class="info-card">
                            <h2>Layanan Aplikasi</h2>
                            <p>Informasi tentang layanan yang disediakan oleh aplikasi.</p>
                        </div>
                        <div class="info-card">
                            <h2>Sejarah Pembuatan</h2>
                            <p>Sejarah singkat pembuatan aplikasi ini.</p>
                        </div>
                  
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection

        .info-section {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 20px;
            background-color: #f2f2f2;
        }

        .info-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: calc(33.3333% - 20px);
            transition: all 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
        }

        .info-card h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .info-card p {
            color: #666;
            line-height: 1.5;
        }
