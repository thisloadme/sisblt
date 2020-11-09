<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Laporan</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
           
        </div>
    </div>

    <div class="card">
      <div class="card-body">
        <table class="table">
          <tbody>
            <tr>
              <th>Daftar Penerima BLT</th>
              <th width="10%"><span data-feather="file" style="cursor: pointer;" id="cetak-daftar-penerima"></span></th>
            </tr>
            <tr>
              <th>Calon Penerima BLT</th>
              <th width="10%"><span data-feather="file" style="cursor: pointer;" id="cetak-calon-penerima"></span></th>
            </tr>
            <tr>
              <th>Total Penduduk</th>
              <th width="10%"><span data-feather="file" style="cursor: pointer;" id="cetak-penduduk"></span></th>
            </tr>
          </tbody>
        </table>
      </div>
  </div>
</main>

<script type="text/javascript">
  $(document).ready(function(){
    $('#cetak-daftar-penerima').click(function(){
      window.location.href = '/laporan/cetak_daftar_penerima';
    })

    $('#cetak-calon-penerima').click(function(){
      window.location.href = '/laporan/cetak_calon_penerima';
    })

    $('#cetak-penduduk').click(function(){
      window.location.href = '/laporan/cetak_penduduk';
    })
  })
</script>