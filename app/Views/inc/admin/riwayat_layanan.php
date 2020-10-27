<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Pasien Dilayani</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary btn-primary text-white">Tambah</button>
                <button type="button" class="btn btn-sm btn-outline-secondary btn-warning text-white">Ubah</button>
                <button type="button" class="btn btn-sm btn-outline-secondary btn-danger text-white">Hapus</button>
                <button type="button" class="btn btn-sm btn-outline-secondary btn-success text-white">Print Daftar Pasien</button>
            </div>
            <input type="text" id="search-terlayani" placeholder="Cari Data Pasien" title="Type in a name">
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Keluhan</th>
                    <th>Diagnosa</th>
                    <th>Anjuran</th>
                    <th>Keterangan Tambahan</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="table-terlayani">
                <tr>
                    <td>1</td>
                    <td>Fulan</td>
                    <td>Pusing</td>
                    <td>Vertigo</td>
                    <td>Istirahat</td>
                    <td>Semoga Lekas Sembuh</td>
                    <td style="float:right;"><button type="button" class="btn btn-sm btn-primary">Cek Resep</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</main>