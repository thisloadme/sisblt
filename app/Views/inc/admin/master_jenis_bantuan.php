<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Master Jenis Bantuan</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" style="margin: 0px 1px 0px 1px" class="btn btn-sm btn-primary text-white btn-tambah">Tambah</button>
                <button type="button" style="margin: 0px 1px 0px 1px" class="btn btn-sm btn-info text-white btn-ubah">Ubah</button>
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
            <th>Jumlah</th>
            <th>Satuan</th>
          </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div>
  </div>
  <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judul_modal_tambah">Tambah Jenis Bantuan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="jenis_bantuan">Jenis Bantuan</label>
                  <input type="text" class="form-control" id="jenis_bantuan" placeholder="Jenis Bantuan">
                  <input type="hidden" id="tipe" value="add">
                </div>
                <div class="form-group">
                  <label for="jumlah">Jumlah</label>
                  <input type="text" class="form-control" id="jumlah" placeholder="Jumlah">
                </div>
                <div class="form-group">
                  <label for="satuan">Satuan</label>
                  <input type="text" class="form-control" id="satuan" placeholder="Satuan">
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="button" class="btn btn-primary btn-simpan">Simpan</button>
            </div>
          </div>
        </div>
  </div>

  <div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="text-align: center;">Yakin ingin hapus Jenis ini?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-danger btn-proses-hapus">Hapus</button>
        </div>
      </div>
    </div>
  </div>
</main>

<script type="text/javascript">
    var table;

    $(document).ready(function(){
      get_data();
    })

    $('#example2 tbody').on('click', 'tr', function(){
      if ( $(this).hasClass('selected') ) {
        $(this).removeClass('selected');
      }else {
        $('#example2 tbody tr').removeClass('selected');
        $(this).addClass('selected');
      }
    })

    function get_data() {
      table = $('#example2').DataTable({
          "ajax": '/master_jenis_bantuan/get_data',
          "columns": [
            { 'data': 'id_jenis_bantuan' },
            { 'data': 'nama_jenis_bantuan' },
            { 'data': 'nominal' },
            { 'data': 'satuan' }
          ],
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
          createdRow: function( row, data, dataIndex ) {
              $(row).attr('data-id', data.id_jenis_bantuan);
          },
        });
    }

  // Button CRUD

  $('.btn-tambah').click(function(){
    $('#judul_modal_tambah').html('Tambah Jenis Bantuan')
    $('#tipe').val('add')
    $('#modal-tambah').modal('show')
  })

  $('.btn-ubah').click(function(){
    var id = $('#example2 tbody tr.selected').length
    var nama = $('#example2 tbody tr.selected td:nth-child(2)').text();
    var jumlah = $('#example2 tbody tr.selected td:nth-child(3)').text();
    var satuan = $('#example2 tbody tr.selected td:nth-child(4)').text();
    if (id > 0) {
      $('#judul_modal_tambah').html('Ubah Jenis Bantuan')
      $('#tipe').val('edit')
      $('#jenis_bantuan').val(nama)
      $('#jumlah').val(jumlah)
      $('#satuan').val(satuan)
      $('#modal-tambah').modal('show')
    }else{
      swal('Tidak ada data yang terpilih', {icon: 'warning'});
    }
  })

  $('.btn-hapus').click(function(){
    var id = $('#example2 tbody tr.selected').length
    if (id > 0) {
      $('#modal-hapus').modal('show')
    }else{
      swal('Tidak ada data yang terpilih', {icon: 'warning'});
    }
  })

  // Selesai Button CRUD

  // Proses CRUD

  $('.btn-simpan').click(function(){
    if ($('#tipe').val() != 'add') {
      var id_jenis_bantuan = $('#example2 tbody tr.selected').data('id');
    }else{
      var id_jenis_bantuan = null;
    }
    $.ajax({
      url: '/master_jenis_bantuan/simpan',
      data: {
        jenis_bantuan : $('#jenis_bantuan').val(),
        jumlah : $('#jumlah').val(),
        satuan : $('#satuan').val(),
        tipe:$('#tipe').val(),
        id: id_jenis_bantuan
      },
      method: 'post',
      success: function(data){
        var obj = JSON.parse(data);
        if (obj.success) {
          swal('Berhasil', {icon: 'success'});
          table.ajax.reload();
        }else{
          swal('Gagal', {icon: 'warning'});
        }
        $('#modal-tambah').modal('hide');
      }
    })
  })

  $('.btn-proses-hapus').click(function(){
    var id_jenis_bantuan = $('#example2 tbody tr.selected').data('id');
    $.ajax({
      url: '/master_jenis_bantuan/hapus',
      data: {
        id: id_jenis_bantuan,
      },
      method: 'post',
      success: function(data){
        var obj = JSON.parse(data);
        if (obj.success) {
          swal('Berhasil', {icon: 'success'});
          table.ajax.reload();
        }else{
          swal('Gagal', {icon: 'warning'});
        }
        $('#modal-hapus').modal('hide');
      }
    })
  })

  // Selesai Proses
</script>