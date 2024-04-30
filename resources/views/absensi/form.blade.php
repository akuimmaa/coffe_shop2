<div class="modal fade" id="modalFormAbsensi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form method="post" action="absensi">
      <div class="modal-header">  
        <h5 class="modal-title" id="exampleModalLabel">Edit Absensi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            @csrf
            <div id="method"></div>
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label">Nama Karyawan </label>
              <div class="col-sm-8">
              <input type="text" class="form-control" id="nama_karyawan" value="" name="nama_karyawan">
              </div>
            </div>

            <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal Masuk</label>
              <div class="col-sm-8">
              <input type="date" class="form-control" id="tanggal_masuk" value="" name="tanggal_masuk">
              </div>
            </div>

            <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label">Waktu Masuk</label>
              <div class="col-sm-8">
              <input type="time" class="form-control" id="waktu_masuk" value="" name="waktu_masuk">
              </div>
            </div>

            <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label">Status </label>
              <div class="col-sm-8">
              <select name="status" id="status" class="form-control">
                <option value="sakit">Sakit</option>
                <option value="masuk">Masuk</option>
                <option value="cuti">Cuti</option>
              </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label">Waktu Selesai kerja</label>
              <div class="col-sm-8">
              <input type="time" class="form-control" id="waktu_selesai" value="" name="waktu_selesai">
              </div>
            </div>

          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
      </div>
    </div>
</div>