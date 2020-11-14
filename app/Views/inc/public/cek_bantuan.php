<div class="modal fade" id="modal-cari" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" style="text-align: center;" id="judul_modal_cari"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <center><div id="nama_penerima">Atas Nama Bagas Ariefia Pribady</div>
            <p>
            <div id="status">Disetujui Lurah</div></center>
        </div>
        <div class="modal-footer justify-content-between">
            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
            <div id="noantri">Disetujui Lurah</div></center>
        </div>
        </div>
    </div>
    </div>

<form class="form-signin">
    <div class="text-center mb-4">
        <img class="mb-4" src="media/img/pwni.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal text-white h3-text-min">Silahkan Masukan Nomor Identitas Cek Status Bantuan Anda
        </h1>
    </div>

    <div class="form-label-group">
        <input type="text" id="inputnik" class="form-control" required autofocus>
        <label for="inputnik">Nomor Identitas NIK / SIM</label>
    </div>
    <button class="btn btn-lg btn-primary btn-block btn-proses-cari" type="button">Proses</button>
</form>

<script>

    $('.btn-proses-cari').click(function(){
        $('#judul_modal_cari').html('Status Pengajuan Anda')
        $('#modal-cari').modal('show')
        var nik = $('#inputnik').val();
        
        $.ajax({
            method: "POST",
            data: {
                nik: nik,
            },
            url: "/transaksi/get_data_bynik",
            success: function(row, data, i){
                var row = JSON.parse(row);
                
                var i;
                var tag_sel = '';
                
                if(row.data.length > 0){
                    for (i = 0; i < row.data.length; i++) {
                        $('#nama_penerima').text('Atas Nama '+row.data[i].nama_penduduk);
                        $('#status').text('Status '+row.data[i].nama_status);
                        $('#noantri').text('No Antrian '+row.data[i].id_pengajuan);
                    }
                }else{
                    $('#nama_penerima').text('Anda Belum Terdaftar Sebagai Penerima');
                    $('#status').text('Silahkan Konfirmasi RT Setempat');
                }
            }
      });

    })
    
</script>