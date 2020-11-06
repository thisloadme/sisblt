<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Transaksi Pengajuan</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" style="margin: 0px 1px 0px 1px" class="btn btn-sm btn-info text-white btn-teruskan">Teruskan</button>
                <!--<button type="button" style="margin: 0px 1px 0px 1px" class="btn btn-sm btn-secondary text-white btn-tolak">Tolak</button>-->
            </div>
            &nbsp;
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
            <th width="5%">No.</th>
            <th>Tgl Pengajuan</th>
            <th>No KK</th>
            <th>No KTP</th>
            <th>Nama Lengkap</th>
            <th>Nama Kepala Keluarga</th>
            <th>Alamat</th>
            <th>Pekerjaan</th>
            <th>Bantuan</th>
            <th>Status</th>
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
          <h4 class="modal-title" id="judul_modal_tambah">Tambah Penduduk</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form-tambah">
            <div class="form-group">
              <label for="password">Nama Penduduk</label>
              <div class="input-group">
                <input type="hidden" name="id_penduduk" id="id_penduduk">
                <input type="text" name="nama_penduduk" id="nama_penduduk" class="form-control" readonly="" value="">
                <span class="input-group-append">
                  <button type="button" class="btn btn-primary btn-flat btn-cari">Cari...</button>
                </span>
              </div>
            </div>
            <div class="form-group">
              <label for="No_KTP">No KTP</label>
              <input type="text" class="form-control" id="No_KTP" readonly="" value="">
            </div>
            <div class="form-group">
              <label for="No_KK">No KK</label>
              <input type="text" class="form-control" id="No_KK" readonly="" value="">
            </div>
            <div class="form-group">
              <label for="sel1">Alamat Sesuai KTP</label>
              <select class="form-control" name="kecamatan" readonly="" id="kec">
                <option value="" selected disabled>Pilih Kecamatan</option>
                <option value="Banjarnegara">Banjarnegara</option>
                <option value="Sokanandi">Sokanandi</option>
                <option value="Mandiraja">Mandiraja</option>
                <option value="Wanadadi">Wanadadi</option>
              </select>
              </p>
              <select class="form-control" readonly="" id="kel" name="kelurahan">
                <option value="" selected disabled>Pilih Kelurahan/Desa</option>
                <option value="Kutabanjarnegara">Kutabanjarnegara</option>
                <option value="Kukurambut">Kukurambut</option>
                <option value="Mandiraja">Mandiraja</option>
                <option value="Wanadadi">Wanadadi</option>
              </select>
              </p>
              <select class="form-control" readonly="" id="rw" name="rw">
                <option value="" selected disabled>Pilih RW</option>
                <option value="1">01</option>
                <option value="2">02</option>
                <option value="3">03</option>
                <option value="4">04</option>
                <option value="5">05</option>
                <option value="6">06</option>
              </select>
              </p>
              <select class="form-control" readonly="" id="rt" name="rt">
                <option value="" selected disabled>Pilih RT</option>
                <option value="1">01</option>
                <option value="2">02</option>
                <option value="3">03</option>
                <option value="4">04</option>
                <option value="5">05</option>
                <option value="6">06</option>
              </select>
            </div>
            <div class="form-group">
              <label for="pekerjaan">Pekerjaan</label>
              <input type="text" class="form-control" id="pekerjaan" readonly="" value="">
            </div>
            <div class="form-group">
              <label for="bantuan">Besaran Bantuan</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Rp</span>
                </div>
                <input type="number" class="form-control" name="bantuan" id="bantuan">
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
  <div class="modal fade" id="modal-setuju" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="text-align: center;">Yakin ingin meneruskan data ke RW ?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-info btn-proses-teruskan">Teruskan</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal-cari-penduduk" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width: 1250px!important">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="text-align: center;">Daftar Penduduk</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table id="tablependuduk" class="table table-bordered">
            <thead>
              <tr>
                <th width="5%">No.</th>
                <th>No KTP</th>
                <th>Nama</th>
                <th>Tempat Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Agama</th>
                <th>Status Kawin</th>
                <th>Pekerjaan</th>
                <th>Kewarganegaraan</th>
                <th>No. KK</th>
              </tr>
              </thead>
            <tbody>
                
            </tbody>
          </table>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary btn-proses-ajukan">Ajukan</button>
        </div>
      </div>
    </div>
  </div>
</main>

<script type="text/javascript">
  var table;
  var tablependuduk;
  $(document).ready(function(){
    get_data();

    tablependuduk = $('#tablependuduk').DataTable({
      "ajax": '/master_penduduk/get_data',
      "columns": [
        { 'data': 'no' },
        { 'data': 'no_ktp' },
        { 'data': 'nama_penduduk' },
        { 'data': 'ttl' },
        { 'data': 'jenis_kelamin' },
        { 'data': 'alamat' },
        { 'data': 'agama' },
        { 'data': 'status_kawin' },
        { 'data': 'pekerjaan' },
        { 'data': 'kewarganegaraan' },
        { 'data': 'no_kk' },
      ],
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      createdRow: function( row, data, dataIndex ) {
          $(row).attr('data-id', data.id_penduduk);
      },
    });
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

  $('#tablependuduk tbody').on('click', 'tr', function(){
    if ( $(this).hasClass('selected') ) {
      $(this).removeClass('selected');
    }else {
      $('#tablependuduk tbody tr').removeClass('selected');
      $(this).addClass('selected');
    }
  })

  $('.btn-proses-ajukan').click(function(){
    var id = $('#tablependuduk tbody tr.selected').length

    var idx = tablependuduk.cell('.selected', 0).index();
    var data = tablependuduk.row( idx.row ).data();

    if (id > 0) {
      $('#id_penduduk').val(data.id_penduduk)
      $('#nama_penduduk').val(data.nama_penduduk)
      $('#No_KTP').val(data.no_ktp)
      $('#No_KK').val(data.id_kk)
      $('#kec').val(data.kec)
      $('#kel').val(data.kel)
      $('#rw').val(data.rw)
      $('#rt').val(data.rt)
      $('#pekerjaan').val(data.pekerjaan)
      $('#modal-cari-penduduk').modal('hide')
    }else{
      swal('Tidak ada data yang terpilih', {icon: 'warning'});
    }
  })

  function get_data() {
    table = $('#example2').DataTable({
        "ajax": '/transaksi/get_data',
        "columns": [
          { 'data': 'no' },
          { 'data': 'tanggal_pengajuan' },
          { 'data': 'no_kk' },
          { 'data': 'no_ktp' },
          { 'data': 'nama_penduduk' },
          { 'data': 'nama_kepala_keluarga' },
          { 'data': 'alamat' },
          { 'data': 'pekerjaan' },
          { 'data': 'bantu' },
          { 'data': 'nama_status' },
        ],
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        createdRow: function( row, data, dataIndex ) {
            $(row).attr('data-id', data.id_pengajuan);
        },
      });
  }

  $('.btn-simpan').click(function(){
    if ($('#tipe').val() != 'add') {
      var id_pengguna = $('#example2 tbody tr.selected').data('id');
    }else{
      var id_pengguna = null;
    }
    
    let myForm = $('#form-tambah')[0];
    let formData = new FormData(myForm);
    formData.append('id', id_pengguna);
    
    $.ajax({
      url: '/master_pengguna/simpan',
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
    $('#judul_modal_tambah').html('Tambah Pengajuan')
    $('#tipe').val('add')
    $('#nama_user').val('')
    $('.field_password').show()
    $('#password').val('')
    $('#password2').val('')
    $('#adm').val('')
    $('#modal-tambah').modal('show')
  })

  $('.btn-ubah').click(function(){
    var id = $('#example2 tbody tr.selected').length
    var nama = $('#example2 tbody tr.selected td:nth-child(3)').text();
    if (id > 0) {
      $('#judul_modal_tambah').html('Ubah Pengajuan')
      $('#tipe').val('edit')
      $('#nama_user').val(nama)
      $('.field_password').hide()
      $('#password').val('')
      $('#password2').val('')
      $('#adm').val(1) //masinh statis
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
    var id_user = $('#example2 tbody tr.selected').data('id');
    $.ajax({
      url: '/master_pengguna/hapus',
      data: {
        id: id_user,
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

  $('.btn-cari').click(function(){
    $('#modal-cari-penduduk').modal('show')
  })

  $('.btn-teruskan').click(function(){
    $('#modal-setuju').modal('show')
  })
</script>