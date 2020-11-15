<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Realisasi</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2" style="">
              <h5> Jumlah Plafon Anggaran : <?php echo 'Rp.'.$totalplafon; ?></h5>    
              &nbsp;        
              <h5> | Sisa Plafon Anggaran : <?php echo 'Rp.'.$sisa_plafon; ?></h5>            
            </div>
            <div class="btn-group mr-2">
              <?php $session = \Config\Services::session(); if($session->get('nama_tingkat_adm') != 'RT'): ?>
                <button type="button" style="margin: 0px 1px 0px 1px" class="btn btn-sm btn-info text-white btn-teruskan">Dicairkan</button>
              <?php endif ?>
            </div>
            &nbsp;
            <div class="btn-group mr-2">
                
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
          <h4 class="modal-title" style="text-align: center;">Yakin ingin Melakukan Pencairan data ?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-info btn-proses-teruskan">Cairkan</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal-tolak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="text-align: center;">Yakin ingin Menolak data Pengajuan ?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-info btn-proses-tolak">Tolak</button>
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
        "ajax": '/realisasi/get_data',
        "columns": [
          { 'data': 'no' },
          { 'data': 'tanggal_pengajuan' },
          { 'data': 'no_kk' },
          { 'data': 'no_ktp' },
          { 'data': 'nama_penduduk' },
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
    let formData = $("#form-tambah").serializeArray();
    formData.push({"name":"tipe","value":tipe},{"name":"id","value":id_pengajuan});
    var data = {};
    
    $.map(formData, function(n, i){
        data[n['name']] = n['value'];
    });

    $.ajax({
      url: '/transaksi/simpan',
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
      url: '/realisasi/direalisasi',
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

</script>