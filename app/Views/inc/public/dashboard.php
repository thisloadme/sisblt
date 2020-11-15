<?php 
$total = 0;
foreach ($setuju as $val): ?>
  <?php $total += $val->nominal ?>
<?php endforeach ?>

<?php
$real = 0;
foreach ($realisasi as $vals): ?>
  <?php $real += $vals->nominal ?>
<?php endforeach ?>

<div class="row" style="width: 100%; margin: 150px 0px 50px 0px;">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-3">
            <h5>Jumlah Penerima Bantuan</h5>
            <div class="row" style="height: 230px!important">
              <div class="col-sm-3"></div>
              <div class="col-sm-6">
                <canvas id="chartpenerima" style="width: 50%; max-height: 500px!important"></canvas>
              </div>
              <div class="col-sm-3"></div>
              <div class="col-sm-12">
                <ul class="spacertop" style="padding-left: 0px">
                    <li style="list-style: none;"><div style="width: 12px; height: 12px; background: #235ded;display: inline-block;"></div>&nbsp;Penerima Bantuan : <?php echo count($setuju) ?> Orang</li>
                    <li style="list-style: none;"><div style="width: 12px; height: 12px; background: #007bff;display: inline-block;"></div>&nbsp;Bukan Penerima Bantuan : <?php echo $totalpenduduk - count($setuju) ?> Orang</li>
                    <li style="list-style: none;"><div style="width: 12px; height: 12px;display: inline-block;"></div>&nbsp;Total Penduduk : <?php echo $totalpenduduk ?></li>
                </ul>
              </div>
            </div>
            <?php if ($totalplafon != NULL or $totalplafon != 0): ?>
            <h5>Realisasi Penyaluran Dana</h5>
            <div class="row" style="height: 230px!important">
              <div class="col-sm-3"></div>
              <div class="col-sm-6">
                <canvas id="chartrealisasi" style="width: 50%; max-height: 500px!important"></canvas>
              </div>
              <div class="col-sm-3"></div>
              <div class="col-sm-12">
                <ul class="spacertop" style="padding-left: 0px">
                    <li style="list-style: none;"><div style="width: 12px; height: 12px; background: #e84c3d;display: inline-block;"></div>&nbsp;Sudah Direalisasikan : Rp <?php echo number_format($real, null, '', '.') ?></li>
                    <li style="list-style: none;"><div style="width: 12px; height: 12px; background: #f59d1f;display: inline-block;"></div>&nbsp;Belum Direalisasikan : Rp <?php echo number_format($totalplafon - $real, null, '', '.') ?></li>
                    <li style="list-style: none;"><div style="width: 12px; height: 12px;display: inline-block;"></div>&nbsp;Total Dana : Rp <?php echo number_format($totalplafon, null, '', '.') ?></li>
                </ul>
              </div>
            </div>
            <?php endif ?>
          </div>
          <div class="col-sm-9 iftable" id="tabel-semua-penerima" style="display: none">
            <h5>Data Semua Pengajuan Bantuan</h5>
            <table id="" class="table table-bordered table-striped dashboard-table">
              <thead>
              <tr>
                <th width="5%">No.</th>
                <th>No KTP</th>
                <th>Nama Penerima BLT</th>
                <th>Alamat</th>
                <th>Tanggal Diajukan</th>
                <th>Status Pengajuan BLT</th>
              </tr>
              </thead>
              <tbody>
                  <?php foreach ($semua as $key => $val): ?>
                      <tr>
                          <td><?php echo $key+1 ?></td>
                          <td><?php echo $val->no_ktp ?></td>
                          <td><?php echo $val->nama_penduduk ?></td>
                          <td><?php echo 'RT '.$val->rt.' RW '.$val->rw ?></td>
                          <td><?php echo date('d F Y', strtotime($val->tanggal_pengajuan)) ?></td>
                          <td><?php echo $val->nama_status ?></td>
                      </tr>
                  <?php endforeach ?>
              </tbody>
            </table>
          </div>
          <div class="col-sm-9 iftable" id="tabel-penerima">
            <h5>Data Penerima Bantuan</h5>
            <table id="" class="table table-bordered table-striped dashboard-table">
              <thead>
              <tr>
                <th width="5%">No.</th>
                <th>No KTP</th>
                <th>Nama Penerima BLT</th>
                <th>Alamat</th>
                <th>Tanggal Diajukan</th>
                <th>Status Pengajuan BLT</th>
              </tr>
              </thead>
              <tbody>
                
                  <?php foreach ($setuju as $key => $val): ?>
                      <tr>
                          <td><?php echo $key+1 ?></td>
                          <td><?php echo $val->no_ktp ?></td>
                          <td><?php echo $val->nama_penduduk ?></td>
                          <td><?php echo 'RT '.$val->rt.' RW '.$val->rw ?></td>
                          <td><?php echo date('d F Y', strtotime($val->tanggal_pengajuan)) ?></td>
                          <td><?php echo $val->nama_status ?></td>
                      </tr>
                  <?php endforeach ?>
                
              </tbody>
            </table>
          </div>
          <div class="col-sm-9 iftable" id="tabel-realisasi" style="display: none">
            <h5>Data Realiasi Dana</h5>
            <table id="" class="table table-bordered table-striped dashboard-table">
              <thead>
              <tr>
                <th  width="5%">No.</th>
                <th>No KTP</th>
                <th>Nama Penerima BLT</th>
                <th>Bantuan</th>
              </tr>
              </thead>
              <tbody>

                  <?php foreach ($realisasi as $key => $val): ?>
                      <tr>
                          <td><?php echo $key+1 ?></td>
                          <td><?php echo $val->no_ktp ?></td>
                          <td><?php echo $val->nama_penduduk ?></td>
                          <td style="text-align: right;"><?php echo number_format($val->nominal, null, '', '.') ?></td>
                      </tr>
                  <?php endforeach ?>

              </tbody>
            </table>
          </div>
          <div class="col-sm-9 iftable" id="tabel-belum-realisasi" style="display: none">
            <h5>Data Semua Bantuan Dana</h5>
            <table id="" class="table table-bordered table-striped dashboard-table">
              <thead>
              <tr>
                <th width="5%">No.</th>
                <th>No KTP</th>
                <th>Nama Penerima BLT</th>
                <th>Nominal</th>
              </tr>
              </thead>
              <tbody>
                  <?php foreach ($semua as $key => $val): ?>
                      <tr>
                          <td><?php echo $key+1 ?></td>
                          <td><?php echo $val->no_ktp ?></td>
                          <td><?php echo $val->nama_penduduk ?></td>
                          <td style="text-align: right;"><?php echo number_format($val->nominal, null, '', '.') ?></td>
                      </tr>
                  <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="/chartjs/chart.min.js"></script> 
<script src="/chartjs/chart-plugin-datalabels.min.js"></script>
<script type="text/javascript">
  var datareal = {
      labels: [
          "",
          "",
      ],
      datasets: [
          {
              data: [
                  "<?php echo $real ?>",
                  "<?php echo $totalplafon - $real ?>",
              ],
              var: [
                  "Rp <?php echo number_format($real, null, '', '.') ?>",
                  "Rp <?php echo number_format($totalplafon - $real, null, '', '.') ?>",
              ],
              idnya: [
                "sudah",
                "belum"
              ],
              backgroundColor: [
                  "#e84c3d",
                  "#f59d1f",
              ]
          }
      ]
  }

  var datapenerima = {
      labels: [
          "Jumlah",
          "Jumlah",
      ],
      datasets: [
          {
              data: [
                  "<?php echo count($setuju) ?>",
                  "<?php echo $totalpenduduk - count($setuju) ?>",
              ],
              idnya: [
                "terima",
                "tidak"
              ],
              backgroundColor: [
                  "#235ded",
                  "#007bff",
              ]
          }
      ]
  }

  $(document).ready(function(){
    <?php if ($totalplafon != NULL or $totalplafon != 0): ?>
    var chartrealisasi = document.getElementById('chartrealisasi');
    var myPieChart2 = new Chart(chartrealisasi, {
        type: 'pie',
        data: datareal,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            tooltips: {
              callbacks: {
                label: function(tooltipItem, data) {
                  return data['labels'][tooltipItem['index']] + ': ' +data['datasets'][0]['var'][tooltipItem['index']];
                }
              }
            },
            plugins: {
                datalabels: {
                    formatter: (value, ctx) => {
                    
                      let sum = 0;
                      let dataArr = ctx.chart.data.datasets[0].data;
                      dataArr.map(data => {
                          sum += parseInt(data);
                      });

                      // let percentage = value;
                      let percentage = (value / sum * 100).toFixed(2)+"%";
                      return percentage;
                    },
                    color: '#fff',
                 }
            }
        }
    });
    chartrealisasi.onclick = function(evt){
        var actpoin = myPieChart2.getElementsAtEvent(evt);
        if (actpoin[0]) {
            var chartdata = actpoin[0]['_chart'].config.data;
            var idx = actpoin[0]['_index'];
            var id = chartdata.datasets[0].idnya[idx];
            $('.iftable').hide();
            if (id == 'sudah') {
              $('#tabel-realisasi').fadeIn(100);
            }else{
              $('#tabel-belum-realisasi').fadeIn(100);
            }
        }
    }
    <?php endif ?>

    var chartpenerima = document.getElementById('chartpenerima');
    var myPieChart3 = new Chart(chartpenerima, {
        type: 'pie',
        data: datapenerima,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            tooltips: {
              callbacks: {
                label: function(tooltipItem, data) {
                  return data['labels'][tooltipItem['index']] + ': ' +data['datasets'][0]['data'][tooltipItem['index']];
                }
              }
            },
            plugins: {
                datalabels: {
                    formatter: (value, ctx) => {
                    
                      let sum = 0;
                      let dataArr = ctx.chart.data.datasets[0].data;
                      dataArr.map(data => {
                          sum += parseInt(data);
                      });

                      let percentage = (value / sum * 100).toFixed(2)+"%";
                      return percentage;
                    },
                    color: '#fff',
                 }
            }
        }
    });
    chartpenerima.onclick = function(evt){
        var actpoin = myPieChart3.getElementsAtEvent(evt);
        if (actpoin[0]) {
            var chartdata = actpoin[0]['_chart'].config.data;
            var idx = actpoin[0]['_index'];
            var id = chartdata.datasets[0].idnya[idx];
            $('.iftable').hide();
            if (id == 'terima') {
              $('#tabel-penerima').fadeIn(100);
            }else{
              $('#tabel-semua-penerima').fadeIn(100);
            }
        }
    }
  })
  
</script>