<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Transaksi Pengajuan</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" style="margin: 0px 1px 0px 1px" class="btn btn-sm btn-info text-white btn-teruskan">Teruskan</button>
                <button type="button" style="margin: 0px 1px 0px 1px" class="btn btn-sm btn-secondary text-white btn-tolak">Tolak</button>
            </div>
            &nbsp;
            <?php $session = \Config\Services::session(); if($session->get('nama_tingkat_adm') != 'Desa'): ?>
              
            <div class="btn-group mr-2">
                <button type="button" style="margin: 0px 1px 0px 1px" class="btn btn-sm btn-primary text-white btn-tambah">Tambah</button>
                <button type="button" style="margin: 0px 1px 0px 1px" class="btn btn-sm btn-warning text-white btn-ubah">Ubah</button>
                <button type="button" style="margin: 0px 1px 0px 1px" class="btn btn-sm btn-danger text-white btn-hapus">Hapus</button>
            </div>
            
            <?php endif ?>
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
  <div class="modal fade" style="overflow: auto;" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <input type="hidden" id="tipe" value="add">
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
              <label for="jenis_bantuan">Jenis Bantuan</label>
              <select name="jenis_bantuan" id="jenis_bantuan" class="form-control">
                
              </select>
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Luas lantai < 8m2 /orang" name="kategori[]">
                      <label class="form-check-label">Luas lantai < 8m2 /orang</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Lantai tanah/bambu/kayu murah" name="kategori[]">
                      <label class="form-check-label">Lantai tanah/bambu/kayu murah</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Dinding bambu/rumbia/kayu murah/tembok tanpa plester" name="kategori[]">
                      <label class="form-check-label">Dinding bambu/rumbia/kayu murah/tembok tanpa plester</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Buang Air Besar tanpa fasilitas/bersama orang lain" name="kategori[]">
                      <label class="form-check-label">Buang Air Besar tanpa fasilitas/bersama orang lain</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Penerangan tanpa listrik" name="kategori[]">
                      <label class="form-check-label">Penerangan tanpa listrik</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Air minum dari sumur/mata air tidak terlindung/sungai/air hujan" name="kategori[]">
                      <label class="form-check-label">Air minum dari sumur/mata air tidak terlindung/sungai/air hujan</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Bahan bakar kayu bakar/arang/minyak tanah" name="kategori[]">
                      <label class="form-check-label">Bahan bakar kayu bakar/arang/minyak tanah</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Konsumsi daging/susu/ayam hanya 1 kali/minggu" name="kategori[]">
                      <label class="form-check-label">Konsumsi daging/susu/ayam hanya 1 kali/minggu</label>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Satu stel pakaian setahun" name="kategori[]">
                      <label class="form-check-label">Satu stel pakaian setahun</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Makan 1-2 kali/hari" name="kategori[]">
                      <label class="form-check-label">Makan 1-2 kali/hari</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Tidak sanggup berobat ke puskesmas/poliklinik" name="kategori[]">
                      <label class="form-check-label">Tidak sanggup berobat ke puskesmas/poliklinik</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Sumber penghasilan KK petani berlahan <500m2, buruh tani, buruh nelayan,buruh bangunan, buruh perkebunan, pekerjaan lain berupah < Rp 600 ribu/bulan" name="kategori[]">
                      <label class="form-check-label">Sumber penghasilan KK petani berlahan <500m2, buruh tani, buruh nelayan,buruh bangunan, buruh perkebunan, pekerjaan lain berupah < Rp 600 ribu/bulan</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Pendidikan KK Tidak sekolah/tidak tamat SD/tamat SD" name="kategori[]">
                      <label class="form-check-label">Pendidikan KK Tidak sekolah/tidak tamat SD/tamat SD</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Tidak memiliki tabungan/barang mudah dijual minimal Rp 500 ribu" name="kategori[]">
                      <label class="form-check-label">Tidak memiliki tabungan/barang mudah dijual minimal Rp 500 ribu</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Kehilangan Mata Pencaharian Karena Covid" name="kategori[]">
                      <label class="form-check-label">Kehilangan Mata Pencaharian Karena Covid</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Belum pernah menerima bansos lain dari pusat" name="kategori[]">
                      <label class="form-check-label">Belum pernah menerima bansos lain dari pusat</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="upload_bukti">Upload Bukti</label>
              <div class="input-group">
                <input type="file" name="bukti">
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
          <h4 class="modal-title" style="text-align: center;">Yakin ingin meneruskan data ?</h4>
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
    <div class="modal-dialog modal-lg" style="max-width: 1350px!important">
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
          { 
            'data': 'kec',
            render: function ( data, type, row ) {
                return row.kec + ', ' + row.kel + ' RT ' + row.rt + ' RW '+ row.rw + ' ';
            }
          },
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
      var id_pengajuan = $('#example2 tbody tr.selected').data('id');
    }else{
      var id_pengajuan = null;
    }
    
    var tipe = $('#tipe').val();
    // let formData = $("#form-tambah").serializeArray();
    // formData.push({"name":"tipe","value":tipe},{"name":"id","value":id_pengajuan});
    // var data = {};
    // var kategori = []
    
    // $.map(formData, function(n, i){
    //     if (n['name'] == 'kategori[]') {
    //         kategori.push(n['value'])
    //     }else{
    //         data[n['name']] = n['value'];
    //     }
    // });
    // data['kategori[]'] = kategori
    // data['bukti'] = $('input[type=file]')[0].files[0]
    // console.log(data)

    //tak ganti pake gini, biar file bisa diupload --Dion 14/11
    var form = $('#form-tambah')[0];
    var formData = new FormData(form);
    formData.append('tipe', tipe);
    formData.append('id', id_pengajuan);
    formData.append('bukti', $('input[type=file]')[0].files[0]); 

    $.ajax({
      url: '/transaksi/simpan',
      data: formData,
      type: 'POST',
      contentType: false,   
      cache: false,         
      processData:false,
      success: function(data){
        var obj = JSON.parse(data);
        if (obj.success) {
          swal(obj.msg, {icon: 'success'});
          table.ajax.reload();
        }else{
          swal(obj.msg, {icon: 'warning'});
        }
        $('#modal-tambah').modal('hide');
      }
    })
  })

  $('.btn-tambah').click(function(){
    $('#judul_modal_tambah').html('Tambah Pengajuan')
    $('#tipe').val('add')
    $('#adm').val('')
    $("#form-tambah")[0].reset() 
    $('#modal-tambah').modal('show')
      $.ajax({
          type: "POST",
          dataType: "html",
          url: "/master_jenis_bantuan/get_data",
          success: function(row, data, i){
            var row = JSON.parse(row);
            // console.log(row.data[0].id_jenis_bantuan);
            var i;
            var tag_sel = '';
            for (i = 0; i <= row.data.length; i++) {
              tag_sel +='<option value= '+ row.data[i].id_jenis_bantuan +'>' + row.data[i].nama_jenis_bantuan + '</option>';
              $("#jenis_bantuan").html(tag_sel);
            }
          }
      });
  })

  $('.btn-ubah').click(function(){
    var id = $('#example2 tbody tr.selected').length

    var idx = table.cell('.selected', 0).index();
    var data = table.row( idx.row ).data();

    var id_penduduk = data.id_penduduk;
    console.log(data);
    if (id > 0) {
      $('#judul_modal_tambah').html('Ubah Pengajuan')
      $('#tipe').val('edit')
      $('#id_penduduk').val(data.id_penduduk)
      $('#nama_penduduk').val(data.nama_penduduk)
      $('#No_KTP').val(data.no_ktp)
      $('#No_KK').val(data.no_kk)
      $('#kec').val(data.kec)
      $('#kel').val(data.kel)
      $('#rw').val(data.rw)
      $('#rt').val(data.rt)
      $('#pekerjaan').val(data.pekerjaan)
      $('#jenis_bantuan').val(data.id_jenis_bantuan)
      $('#modal-tambah').modal('show')
      $.ajax({
          type: "POST",
          dataType: "html",
          url: "/master_jenis_bantuan/get_data",
          success: function(row, data, i){
            var row = JSON.parse(row);
            // console.log(row.data[0].id_jenis_bantuan);
            var i;
            var tag_sel = '';
            for (i = 0; i <= row.data.length; i++) {
              tag_sel +='<option value= '+ row.data[i].id_jenis_bantuan +'>' + row.data[i].nama_jenis_bantuan + '</option>';
              $("#jenis_bantuan").html(tag_sel);
            }
          }
      });
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
    var id_pengajuan = data.id_pengajuan;
    
    $.ajax({
      url: '/transaksi/hapus',
      data: {
        id: id_pengajuan,
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
    var id = $('#example2 tbody tr.selected').length
    if(id > 0){
      $('#modal-setuju').modal('show')
    }else{
      swal('Tidak ada data yang terpilih', {icon: 'warning'});
    }
  })

  $('.btn-proses-teruskan').click(function(){
    var idx = table.cell('.selected', 0).index();
    var data = table.row( idx.row ).data();
    var id_pengajuan = data.id_pengajuan;

    $.ajax({
      url: '/transaksi/teruskan',
      method: 'post',
      data: {
        id: id_pengajuan,
      },
      success: function(data){
        var obj = JSON.parse(data);
        if (obj.success) {
          swal('Berhasil', {icon: 'success'});
          table.ajax.reload();
        }else{
          swal('Gagal', {icon: 'warning'});
        }
        $('#modal-setuju').modal('hide');
      }
    })
  })

  $('.btn-tolak').click(function(){
    var id = $('#example2 tbody tr.selected').length
    if(id > 0){
      $('#modal-tolak').modal('show')
    }else{
      swal('Tidak ada data yang terpilih', {icon: 'warning'});
    }
  })

  $('.btn-proses-tolak').click(function(){
    var idx = table.cell('.selected', 0).index();
    var data = table.row( idx.row ).data();
    var id_pengajuan = data.id_pengajuan;

    $.ajax({
      url: '/realisasi/tolak',
      method: 'post',
      data: {
        id: id_pengajuan,
      },
      success: function(data){
        var obj = JSON.parse(data);
        if (obj.success) {
          swal('Berhasil', {icon: 'success'});
          table.ajax.reload();
        }else{
          swal('Gagal', {icon: 'warning'});
        }
        $('#modal-tolak').modal('hide');
      }
    })
  })

</script>