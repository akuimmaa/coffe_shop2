
<div class="modal fade" id="modalFormStok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">  
          <h5 class="modal-title" id="exampleModalLabel">Edit Stok</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="stok">
              @csrf

              <div class="form-group row">
                <label for="jenis_id" class="col-sm-4 col-form-label">Menu ID</label>
                  <div class="col-sm-8">
                    <select name="menu_id" id="menu_id" class="form-control">
                      {{-- <option value="">Pilih Menu ID</option> --}}
                      @foreach ($menu as $c)
                      <option value="{{ $c->id }}">{{ $c->nama_menu }}</option>
                      @endforeach
                    </select>
                </div>
              </div>

              <div id="method"></div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">Jumlah</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="jumlah" value="" name="jumlah">
                </div>
              </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
          </form>
    </div>
</div>
