<div class="modal fade" id="modalFormAplikasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="formInputAplikasi" method="post" action="{{ route('aplikasi.index') }}">
        @csrf
        <div class="modal-header">  
          <h5 class="modal-title" id="exampleModalLabel">Input Data Produk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label for="nama_produk" class="col-sm-4 col-form-label">Nama Produk</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="nama_produk" name="nama_produk">
            </div>
          </div>

          <div class="form-group row">
            <label for="nama_suppllier" class="col-sm-4 col-form-label">Nama Supplier</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="nama_suppllier" name="nama_suppllier">
            </div>
          </div>

          <div class="form-group row">
            <label for="harga_beli" class="col-sm-4 col-form-label">Harga Beli</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" id="harga_beli" name="harga_beli" readonly>
            </div>
          </div>

          <div class="form-group row">
            <label for="harga_jual" class="col-sm-4 col-form-label">Harga Jual</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" id="harga_jual" name="harga_jual" readonly>
            </div>
          </div>

          <div class="form-group row">
            <label for="stok" class="col-sm-4 col-form-label">Stok</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" id="stok" name="stok">
            </div>
          </div>

          <div class="form-group row">
            <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="keterangan" name="keterangan">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
