<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Master Wilayah Administrasi</h1>
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
            <th width="5%">No.</th>
            <th>Tahun</th>
            <th>Nama Wilayah Administrasi</th>
            <th>RT</th>
            <th>RW</th>
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
              <label for="nama_wilayah_adm">Nama Wilayah Administrasi</label>
              <select name="nama_wilayah_adm" class="form-control" id="nama_wilayah_adm">
                <option value="RT" selected>RT</option>
                <option value="RW">RW</option>
                <option value="Desa">Kepala Desa / Lurah</option>
              </select>
              <input type="hidden" id="tipe" name="tipe" value="add">
            </div>
            <div class="row">
              <div class="form-group col-sm-6 field-rt">
                <label for="rt">RT</label>
                <input type="number" class="form-control" id="rt" name="rt">
              </div>
              <div class="form-group col-sm-6 field-rw">
                <label for="rw">RW</label>
                <input type="number" class="form-control" id="rw" name="rw">
              </div>
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
        "ajax": '/master_tingkat_adm/get_data',
        "columns": [
          { 'data': 'no' },
          { 'data': 'tahun' },
          { 'data': 'nama_tingkat_adm' },
          { 'data': 'rt' },
          { 'data': 'rw' },
        ],
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        createdRow: function( row, data, dataIndex ) {
            $(row).attr('data-id', data.id_tingkat_adm);
        },
      });
  }

  $('.btn-simpan').click(function(){
    if ($('#tipe').val() != 'add') {
      var id_tingkat_adm = $('#example2 tbody tr.selected').data('id');
    }else{
      var id_tingkat_adm = null;
    }
    
    let myForm = $('#form-tambah')[0];
    let formData = new FormData(myForm);
    formData.append('id', id_tingkat_adm);
    
    $.ajax({
      url: '/master_tingkat_adm/simpan',
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
    $('#judul_modal_tambah').html('Tambah Data Wilayah Administrasi')
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
      $('#judul_modal_tambah').html('Ubah Data Wilayah Administrasi')
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
    var id_tingkat_adm = $('#example2 tbody tr.selected').data('id');
    $.ajax({
      url: '/master_tingkat_adm/hapus',
      data: {
        id: id_tingkat_adm,
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

  $('#nama_wilayah_adm').change(function(){
    var val = $(this).val()

    if (val == 'RW') {
      $('.field-rt').hide();
      $('.field-rt').find('input').val('');
      $('.field-rw').show();
    }else if (val == 'Desa') {
      $('.field-rt').hide();
      $('.field-rt').find('input').val('');
      $('.field-rw').hide();
      $('.field-rw').find('input').val('');
    }else{
      $('.field-rt').show();
      $('.field-rw').show();
    }
  })
</script>