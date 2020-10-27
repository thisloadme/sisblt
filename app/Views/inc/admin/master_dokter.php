<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Dokter Rumah Sakit</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary btn-primary text-white">Tambah</button>
                <button type="button" class="btn btn-sm btn-outline-secondary btn-warning text-white">Ubah</button>
                <button type="button" class="btn btn-sm btn-outline-secondary btn-danger text-white">Hapus</button>
                <button type="button" class="btn btn-sm btn-outline-secondary btn-success text-white">Print Daftar Pasien</button>
            </div>
            <input type="text" id="search-dokter" placeholder="Cari Data Dokter" title="Type in a name">
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
        <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Kedokteran</th>
                    <th>Nama Dokter</th>
                    <th>Alamat</th>
                    <th>Jenis Poli</th>
                    <th>Telp</th>
                </tr>
            </thead>
            <tbody id="table-dokter">
                <?php
                $no = 0;
                foreach($dokter as $key => $row):?>
                    <tr>
                        <td><?php echo $no+1?></td>
                        <td><?php echo $row->nomor_kepegawaian;?></td>
                        <td><?php echo $row->nama_identitas;?></td>
                        <td><?php echo $row->alamat;?></td>
                        <td><?php echo $row->nama_jenis_poli;?></td>
                        <td><?php echo $row->telp;?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</main>