<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Afiliasi Asuransi Jiwa Rumah Sakit</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary btn-primary text-white">Tambah</button>
                <button type="button" class="btn btn-sm btn-outline-secondary btn-warning text-white">Ubah</button>
                <button type="button" class="btn btn-sm btn-outline-secondary btn-danger text-white">Hapus</button>
            </div>
            <input type="text" id="search-asuransi_jiwa" placeholder="Cari Asuransi" title="Type in a name">
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm" id="table-asuransi">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Asuransi</th>
                    <th>Kode Asuransi Jiwa</th>
                    <th>Potongan</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody id="table-asuransi">
                <?php
                $no = 0;
                foreach($asuransi as $key => $row):?>
                    <tr>
                        <td><?php echo $no+1?></td>
                        <td><?php echo $row->nama_asuransi_jiwa;?></td>
                        <td><?php echo $row->potongan;?></td>
                        <td><?php echo $row->kode_asuransi_jiwa;?></td>
                        <td><?php echo $row->keterangan;?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</main>