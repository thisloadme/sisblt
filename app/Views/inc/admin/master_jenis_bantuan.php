<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Master Jenis Bantuan</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" style="margin: 0px 1px 0px 1px" class="btn btn-sm btn-primary text-white btn-tambah">Tambah</button>
                <button type="button" style="margin: 0px 1px 0px 1px" class="btn btn-sm btn-warning text-white btn-ubah">Ubah</button>
                <button type="button" style="margin: 0px 1px 0px 1px" class="btn btn-sm btn-danger text-white btn-hapus">Hapus</button>
            </div>
        </div>
    </div>

    <div class="card">
      <div class="card-body">
        <table id="example2" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No.</th>
            <th>Nama Jenis Bantuan</th>
            <th>Nominal</th>
            <th>Satuan</th>
          </tr>
          </thead>
        <tbody>
            <?php foreach ($jenis as $key => $val): ?>
                <tr>
                    <td><?php echo $key+1 ?></td>
                    <td><?php echo $val->nama_jenis_bantuan ?></td>
                    <td><?php echo $val->nominal ?></td>
                    <td><?php echo $val->satuan ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
        </table>
      </div>
  </div>
  <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Status</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
    </div>
</main>