<div class="modal fade" id="FormImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Import Data Meja</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">

              <form method="POST" action="{{ route('import-meja') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                      <div class="form-group">
                          <label for="meja">File Excel</label>
                          <input type="file" name="import" id="import">
                      </div>
                  </div>
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Upload</button>
          </div>
      </div>
  </div>
</div>
</form>