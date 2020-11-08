<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Plafon Anggaran</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
           <div class="btn-group mr-2">
                <button type="button" style="margin: 0px 1px 0px 1px" class="btn btn-sm btn-warning text-white btn-edit">Edit Plafon</button>
                <button type="button" style="margin: 0px 1px 0px 1px; display: none;" class="btn btn-sm btn-primary text-white btn-simpan">Simpan</button>
            </div>
        </div>
    </div>

    <div class="card">
      <div class="card-body">
        <table id="table-plafon" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Satuan Wilayah</th>
              <th width="20%">Plafon Anggaran</th>
            </tr>
          </thead>
        <tbody>
          
        </tbody>
        </table>
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
  <div class="modal fade" id="modal-cari-penduduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

  $(document).ready(function(){
    get_data();
  })

  function get_data() {
    var html = '';
    $.ajax({
      url: '/plafon/get_data',
      success: function(data){
        var obj = JSON.parse(data);
        $.each(obj, function(i, val){
          html += `
            <tr data-id="`+val.id_tingkat_adm+`">
              <td>`+val.nama_tingkat_adm+`</td>`
          
          if (val.rt == null && val.rw == null) {
            html += `<td style="text-align: right;">`+val.plafon+`</td>`
          }else{
            html += `<td class="edit-mode-off" style="text-align: right;">`+val.plafon+`</td>`
            html += `<td class="edit-mode-on" style="display: none; padding: 5px;"><input type="number" name="plafon" class="form-control" style="text-align: right;height: 32px!important;" value="`+val.plafon+`"></td>`
          }
          
          html += `</tr>`
        })

        $('#table-plafon tbody').html(html)
      }
    })
  }

  $('#table-plafon tbody').on('click', 'tr', function(){
    if ( $(this).hasClass('selected') ) {
      $(this).removeClass('selected');
    }else {
      $('#table-plafon tbody tr').removeClass('selected');
      $(this).addClass('selected');
    }
  })

  $('.btn-edit').click(function(){
    $('.btn-edit').hide();
    $('.btn-simpan').show();
    $('.edit-mode-on').show()
    $('.edit-mode-off').hide()
  })

  $('.btn-simpan').click(function(){
    var array = [];
    var no = 2;
    var max = $('#table-plafon tbody tr').length;
    for (var i = no; i <= max; i++) {
      var td = $('#table-plafon tbody tr:nth-child('+i+')');
      var id = td.data('id')
      var plafon = td.find('.edit-mode-on').find('input').val();
      array.push({
        id: id,
        plafon: plafon
      })
    }

    $.ajax({
      url: '/plafon/simpan',
      data: {data: array},
      method: 'post',
      success: function(data){
        var obj = JSON.parse(data);
        if (obj.success) {
          swal(obj.msg, {icon: 'success'});
          $('.btn-edit').show();
          $('.btn-simpan').hide();
          $('.edit-mode-on').hide()
          $('.edit-mode-off').show()
          get_data();
        }else{
          swal(obj.msg, {icon: 'warning'});
        }
      }
    })
  })
</script>