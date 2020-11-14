<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Master Kartu Keluarga</h1>
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
            <th>No KK</th>
            <th>Kepala Keluarga</th>
            <th>RT</th>
            <th>RW</th>
            <th>Kode Pos</th>
            <th>Desa</th>
            <th>Kecamatan</th>
            <th>Kabupaten</th>
            <th>Provinsi</th>
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
          <h4 class="modal-title" id="judul_modal_tambah">Tambah Pengguna</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form-tambah">
            <div class="form-group">
              <label for="nama_kepala_keluarga">Nama Kepala Keluarga</label>
              <input type="text" class="form-control" id="nama_kepala_keluarga" name="nama_kepala_keluarga">
              <input type="hidden" id="tipe" name="tipe" value="add">
            </div>
            <div class="form-group">
              <label for="no_kk">No Kartu Keluarga</label>
              <input type="number" class="form-control" id="no_kk" name="no_kk">
            </div>
            <div class="row">
              <div class="form-group col-sm-4">
                <label for="rt">RT</label>
                <input type="number" class="form-control" id="rt" name="rt">
              </div>
              <div class="form-group col-sm-4">
                <label for="rw">RW</label>
                <input type="number" class="form-control" id="rw" name="rw">
              </div>
              <div class="form-group col-sm-4">
                <label for="kode_pos">Kode Pos</label>
                <input type="number" class="form-control" id="kode_pos" name="kode_pos">
              </div>
            </div>

            <div class="form-group">
              <label for="provinsi">Provinsi</label>
              <select name="provinsi" id="provinsi" class="form-control">
                <option value="" selected disabled>Pilih salah satu</option>
                <option value="Jawa Tengah">Jawa Tengah</option>
              </select>
            </div>

            <div class="form-group">
              <label for="kabupaten">Kabupaten</label>
              <select name="kabupaten" id="kabupaten" class="form-control">
                <option value="" selected disabled>Pilih salah satu</option>
                <option value="Banjarnegara">Banjarnegara</option>
              </select>
            </div>

            <div class="form-group">
              <label for="kecamatan">Kecamatan</label>
              <select name="kecamatan" id="kecamatan" class="form-control">
                <option value="" selected disabled>Pilih salah satu</option>
                <option value="Banjarnegara">Banjarnegara</option>
              </select>
            </div>

            <div class="form-group">
              <label for="desa">Desa</label>
              <select name="desa" id="desa" class="form-control">
                <option value="" selected disabled>Pilih salah satu</option>
                <option value="Ampelsari">Ampelsari</option>
                <option value="Cendana">Cendana</option>
                <option value="Sokayasa">Sokayasa</option>
                <option value="Tlagawera">Tlagawera</option>
                <option value="Argasoka">Argasoka</option>
                <option value="Karangtengah">Karangtengah</option>
                <option value="Krandegan">Krandegan</option>
                <option value="Kutabanjarnegara">Kutabanjarnegara</option>
                <option value="Parakancanggah">Parakancanggah</option>
                <option value="Semampir">Semampir</option>
                <option value="Semarang">Semarang</option>
                <option value="Sokanandi">Sokanandi</option>
                <option value="Wangon">Wangon</option>
              </select>
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
          <h4 class="modal-title" style="text-align: center;">Yakin ingin hapus data ini?</h4>
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

  function get_adm() {
    $.ajax({
      url: '/master_tingkat_adm/get_data',
      method: 'get',
      success: function(data){
        var obj = JSON.parse(data);
        var html = '';
        $.each(obj.data, function(i, val){
          html = html + `
            <option value="`+val.id_tingkat_adm+`">`+val.nama_tingkat_adm+`</option>
          `;
        })
        $('#adm').html(html)
      }
    })
  }

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
        "ajax": '/master_kk/get_data',
        "columns": [
          { 'data': 'no' },
          { 'data': 'no_kk' },
          { 'data': 'nama_kepala_keluarga' },
          { 'data': 'rt' },
          { 'data': 'rw' },
          { 'data': 'kode_pos' },
          { 'data': 'desa' },
          { 'data': 'kecamatan' },
          { 'data': 'kabupaten' },
          { 'data': 'provinsi' },
        ],
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        createdRow: function( row, data, dataIndex ) {
            $(row).attr('data-id', data.id_kk);
        },
      });
  }

  $('.btn-simpan').click(function(){
    if ($('#tipe').val() != 'add') {
      var id_kk = $('#example2 tbody tr.selected').data('id');
    }else{
      var id_kk = null;
    }
    
    let myForm = $('#form-tambah')[0];
    let formData = new FormData(myForm);
    formData.append('id', id_kk);
    
    $.ajax({
      url: '/master_kk/simpan',
      data: formData,
      processData: false,
      contentType: false,
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

  $('.btn-tambah').click(function(){
    $('#judul_modal_tambah').html('Tambah Data Kartu Keluarga')
    $("#form-tambah")[0].reset() 
    $('#tipe').val('add')    
    $('#modal-tambah').modal('show')
  })

  $('.btn-ubah').click(function(){
    var id = $('#example2 tbody tr.selected').length
    var row = $.map(table.rows('.selected').data(), function (item) {
        return item
    }); 
    row = row[0]

    if (id > 0) {
      $('#judul_modal_tambah').html('Ubah Data Kartu Keluarga')
      $('#tipe').val('edit')
      $('#nama_kepala_keluarga').val(row.nama_kepala_keluarga)
      $('#rt').val(row.rt)
      $('#rw').val(row.rw)
      $('#no_kk').val(row.no_kk)
      $('#kode_pos').val(row.kode_pos)
      $('#desa').val(row.desa)
      $('#kecamatan').val(row.kecamatan)
      $('#kabupaten').val(row.kabupaten)
      $('#provinsi').val(row.provinsi)
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

  $('.btn-proses-hapus').click(function(){
    var id_kk = $('#example2 tbody tr.selected').data('id');
    $.ajax({
      url: '/master_kk/hapus',
      data: {
        id: id_kk,
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
</script>