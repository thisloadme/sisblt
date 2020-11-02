
<div class="row" style="width: 100%; margin: 150px 0px 50px 0px;">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-3">
            <h5>Realisasi Penyaluran Dana</h5>
            <!--
            <table class="table">
              <?php foreach ($bantuan as $ban): ?>
                <tr>
                  <td><?php echo $ban->nama_jenis_bantuan ?>: <?php echo $ban->nominal.' '.$ban->satuan ?></td>
                </tr>
              <?php endforeach ?>
            </table>
            -->
            <div class="row" style="height: 230px!important">
              <div class="col-sm-3"></div>
              <div class="col-sm-6">
                <canvas id="chartrealisasi" style="width: 50%; max-height: 500px!important"></canvas>
              </div>
              <div class="col-sm-3"></div>
              <div class="col-sm-12">
                <ul class="spacertop" style="padding-left: 0px">
                    <li style="list-style: none;"><div style="width: 12px; height: 12px; background: #e84c3d;display: inline-block;"></div>&nbsp;Sudah Direalisasikan : Rp 10.000.000</li>
                    <li style="list-style: none;"><div style="width: 12px; height: 12px; background: #f59d1f;display: inline-block;"></div>&nbsp;Belum Direalisasikan : Rp 40.000.000</li>
                    <li style="list-style: none;"><div style="width: 12px; height: 12px;display: inline-block;"></div>&nbsp;Total Dana : Rp 50.000.000</li>
                </ul>
              </div>
            </div>
            <h5>Jumlah Penerima Bantuan</h5>
            <!-- <table class="table">
              <?php foreach ($bantuan as $ban): ?>
                <tr>
                  <td><?php echo $ban->nama_jenis_bantuan ?>: <?php echo $ban->nominal.' '.$ban->satuan ?></td>
                </tr>
              <?php endforeach ?>
            </table> -->
            <div class="row" style="height: 230px!important">
              <div class="col-sm-3"></div>
              <div class="col-sm-6">
                <canvas id="chartpenerima" style="width: 50%; max-height: 500px!important"></canvas>
              </div>
              <div class="col-sm-3"></div>
              <div class="col-sm-12">
                <ul class="spacertop" style="padding-left: 0px">
                    <li style="list-style: none;"><div style="width: 12px; height: 12px; background: #235ded;display: inline-block;"></div>&nbsp;Penerima Bantuan : 55 Orang</li>
                    <li style="list-style: none;"><div style="width: 12px; height: 12px; background: #007bff;display: inline-block;"></div>&nbsp;Bukan Penerima Bantuan : 120 Orang</li>
                    <li style="list-style: none;"><div style="width: 12px; height: 12px;display: inline-block;"></div>&nbsp;Total Penduduk : 175</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-9">
            <h5>Data Penerima Bantuan</h5>
            <table id="dashboard-table" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No.</th>
                <th>No KTP</th>
                <th>Nama Penerima BLT</th>
                <th>Alamat</th>
                <th>Tanggal Diajukan</th>
                <th>Status Pengajuan BLT</th>
              </tr>
              </thead>
              <tbody>
                <!--
                  <?php foreach ($data as $key => $val): ?>
                      <tr>
                          <td><?php echo $key+1 ?></td>
                          <td><?php echo $val->no_ktp ?></td>
                          <td><?php echo $val->nama_penduduk ?></td>
                          <td><?php echo $val->alamat ?></td>
                          <td><?php echo $val->tanggal_pengajuan ?></td>
                          <td><?php echo $val->nama_status ?></td>
                      </tr>
                  <?php endforeach ?>
                -->
                <tr>
                    <td>1</td>
                    <td>3304061204010001</td>
                    <td>Bagas Ariefia Pribady</td>
                    <td>RT 3 RW 4</td>
                    <td>28 Oktober 2020</td>
                    <td>Menunggu Verifikasi</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>3304061102010001</td>
                    <td>Pandu Pratama</td>
                    <td>RT 1 RW 3</td>
                    <td>27 Oktober 2020</td>
                    <td>Menunggu Verifikasi</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>3304062509010001</td>
                    <td>Nur Al Banjary</td>
                    <td>RT 3 RW 1</td>
                    <td>25 Oktober 2020</td>
                    <td>Menunggu Verifikasi</td>
                </tr>
                <tr style="background-color: cyan">
                    <td>4</td>
                    <td>3304062909000001</td>
                    <td>Dion Budi Riyanto</td>
                    <td>RT 3 RW 1</td>
                    <td>12 Oktober 2020</td>
                    <td>Disetujui</td>
                </tr>
                <tr style="background-color: tomato">
                    <td>5</td>
                    <td>3304062701010001</td>
                    <td>Ibnu Khalim</td>
                    <td>RT 1 RW 1</td>
                    <td>15 Oktober 2020</td>
                    <td>Ditolak</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!--<div class="col-sm-3">
            
          </div> -->
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
          "Sudah Direalisasikan",
          "Belum Direalisasikan",
      ],
      datasets: [
          {
              data: [
                  "10000000",
                  "40000000",
              ],
              var: [
                  "20000",
                  "20000",
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
          "Penerima Bantuan",
          "Tidak Menerima Bantuan",
      ],
      datasets: [
          {
              data: [
                  "55",
                  "120",
              ],
              var: [
                  "20000",
                  "20000",
              ],
              backgroundColor: [
                  "#235ded",
                  "#007bff",
              ]
          }
      ]
  }

  $(document).ready(function(){
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

                      let percentage = (value / sum * 100).toFixed(2)+"%";
                      return percentage;
                    },
                    color: '#fff',
                 }
            }
        }
    });
  })
  
</script>