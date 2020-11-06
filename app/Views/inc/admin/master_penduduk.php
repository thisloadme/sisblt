<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Master Penduduk</h1>
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
              <label for="no_ktp">No KTP</label>
              <input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="No KTP">
              <input type="hidden" id="tipe" value="add">
            </div>
            <div class="form-group">
              <label for="no_kk">No KK</label>
              <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="No KK">
            </div>
            <div class="form-group">
              <label for="nama_penduduk">Nama Sesuai KTP</label>
              <input type="text" class="form-control" name="nama_penduduk" id="nama_penduduk" placeholder="Nama Sesuai KTP">
            </div>
            <div class="form-group">
              <label for="sel1">Alamat Sesuai KTP</label>
              <select class="form-control" name="kecamatan" id="kec">
                <option value="" selected disabled>Pilih Kecamatan</option>
                <option value="Banjarnegara">Banjarnegara</option>
                <option value="Sokanandi">Sokanandi</option>
                <option value="Mandiraja">Mandiraja</option>
                <option value="Wanadadi">Wanadadi</option>
              </select>
              </p>
              <select class="form-control" id="kel" name="kelurahan">
                <option value="" selected disabled>Pilih Kelurahan/Desa</option>
                <option value="Kutabanjarnegara">Kutabanjarnegara</option>
                <option value="Kukurambut">Kukurambut</option>
                <option value="Mandiraja">Mandiraja</option>
                <option value="Wanadadi">Wanadadi</option>
              </select>
              </p>
              <select class="form-control" id="rw" name="rw">
                <option value="" selected disabled>Pilih RW</option>
                <option value="1">01</option>
                <option value="2">02</option>
                <option value="3">03</option>
                <option value="4">04</option>
                <option value="5">05</option>
                <option value="6">06</option>
              </select>
              </p>
              <select class="form-control" id="rt" name="rt">
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
              <label for="tempat_lahir">Tempat Lahir</label>
              <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir">
            </div>
            <div class="form-group">
              <label for="tanggal_lahir">Tanggal Lahir</label>
              <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir">
            </div>
            <div class="form-group">
              <label for="jenis_kelamin">Jenis Kelamin</label>
              <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                <option value="" disabled="" selected="">Pilih satu</option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="agama">Agama</label>
              <select name="agama" id="agama" class="form-control">
                <option value="" disabled="" selected="">Pilih satu</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
                <option value="Konghuchu">Konghuchu</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>
            <div class="form-group">
              <label for="status_kawin">Status Kawin</label>
              <select name="status_kawin" id="status_kawin" class="form-control">
                <option value="" disabled="" selected="">Pilih satu</option>
                <option value="Menikah">Menikah</option>
                <option value="Lajang">Lajang</option>
              </select>
            </div>
            <div class="form-group">
              <label for="pekerjaan">Pekerjaan</label>
              <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan">
            </div>
            <div class="form-group">
              <label for="kewarganegaraan">Kewarganegaraan</label>
              <input type="text" class="form-control" name="kewarganegaraan" id="kewarganegaraan" placeholder="Kewarganegaraan">
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
          <h4 class="modal-title" style="text-align: center;">Yakin ingin hapus Status ini?</h4>
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
        "ajax": '/master_penduduk/get_data',
        "columns": [
          { 'data': 'no' },
          { 'data': 'no_ktp' },
          { 'data': 'nama_penduduk' },
          { 'data': 'ttl' },
          { 'data': 'jenis_kelamin' },
          { 
            'data': 'kec',
            render: function ( data, type, row ) {
                return row.kec + ', ' + row.kel + ' RT ' + row.rt + ' RW '+ row.rw + ' ';
            }
          },
          { 'data': 'agama' },
          { 'data': 'status_kawin' },
          { 'data': 'pekerjaan' },
          { 'data': 'kewarganegaraan' },
          { 'data': 'id_kk' },
        ],
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        createdRow: function( row, data, dataIndex ) {
            $(row).attr('data-id', data.id_penduduk);
        },
      });
  }

  $('.btn-simpan').click(function(){
    if (true) {
      var id_penduduk = $('#example2 tbody tr.selected').data('id');
    }else{
      var id_penduduk = null;
    }
    var tipe = $('#tipe').val();
    let formData = $("#form-tambah").serializeArray();
    formData.push({"name":"id","value":id_penduduk},{"name":"tipe","value":tipe});
    var data = {};
    
    $.map(formData, function(n, i){
        data[n['name']] = n['value'];
    });
    console.log(data);
    $.ajax({
      url: '/master_penduduk/simpan',
      data: data,
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
    $('#judul_modal_tambah').html('Tambah Data Penduduk')
    $('#tipe').val('add')
    $('#modal-tambah').modal('show')
  })

  $('.btn-ubah').click(function(){
    var id = $('#example2 tbody tr.selected').length

    var idx = table.cell('.selected', 0).index();
    var data = table.row( idx.row ).data();

    var id_penduduk = data.id_penduduk;

    if (id > 0) {
      $('#judul_modal_tambah').html('Ubah Data Penduduk')
      $('#tipe').val('edit')
      $('#agama').val(data.agama)
      $('#no_kk').val(data.id_kk)
      $('#jenis_kelamin').val(data.jenis_kelamin)
      $('#kec').val(data.kec)
      $('#kel').val(data.kel)
      $('#rw').val(data.rt)
      $('#no_ktp').val(data.no_ktp)
      $('#nama_penduduk').val(data.nama_penduduk)
      $('#rt').val(data.rt)
      $('#tempat_lahir').val(data.tempat_lahir)
      $('#tanggal_lahir').val(data.tanggal_lahir)
      $('#status_kawin').val(data.status_kawin)
      $('#pekerjaan').val(data.pekerjaan)
      $('#kewarganegaraan').val(data.kewarganegaraan)
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
    var idx = table.cell('.selected', 0).index();
    var data = table.row( idx.row ).data();
    var id_penduduk = data.id_penduduk;
    
    $.ajax({
      url: '/master_penduduk/hapus',
      data: {
        id: id_penduduk,
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