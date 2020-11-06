<?php 
namespace App\Controllers;
use App\Models\M_penduduk;

class Master_penduduk extends BaseController
{
	public function index()
	{
        return $this->get_penduduk();
    }
    
    function get_penduduk () {
        $model = new M_penduduk();
        $penduduk  = $model->get_penduduk();
        $data = array(
            'header' => 'main-inc/admin/header',
            'konten' => 'inc/admin/master_penduduk',
            'footer' => 'main-inc/admin/footer',
            'penduduk' => $penduduk
        );
        
        echo view('template',$data);
    }

    function get_data()
    {
        $model = new M_penduduk();
        $res  = $model->get_penduduk();
        $arr = array(
            'data' => $res
        );
        echo json_encode($arr);
    }

    function simpan()
    {
        $tipe = $_POST['tipe'];
        $data = array(
            'no_ktp' => $_POST['no_ktp'],
            'id_kk' => $_POST['no_kk'],
            'nama_penduduk' => $_POST['nama_penduduk'],
            'tempat_lahir' => $_POST['tempat_lahir'],
            'tanggal_lahir' => $_POST['tanggal_lahir'],
            'jenis_kelamin' => $_POST['jenis_kelamin'],
            'agama' => $_POST['agama'],
            'status_kawin' => $_POST['status_kawin'],
            'pekerjaan' => $_POST['pekerjaan'],
            'kewarganegaraan' => $_POST['kewarganegaraan'],
            'kec' => $_POST['kecamatan'],
            'kel' => $_POST['kelurahan'],
            'rw' => $_POST['rw'],
            'rt' => $_POST['rt']
        );

        $model = new M_penduduk();
        if ($tipe == 'add') {   
            $res  = $model->tambah_data($data);
            if ($res) {
                $arr = array(
                    'success' => true,
                    'msg' => 'berhasil'
                );
            }else {
                $arr = array(
                    'success' => false,
                    'msg' => 'gagal'
                );
            }
        }else {
            $id = $_POST['id'];
            $where = array(
                'id_penduduk' => $id
            );
            $res  = $model->ubah_data($data, $where);
            if ($res) {
                $arr = array(
                    'success' => true,
                    'msg' => 'berhasil'
                );
            }else {
                $arr = array(
                    'success' => false,
                    'msg' => 'gagal'
                );
            }
        }
        echo json_encode($arr);
    }

    function hapus()
    {
        $id = $_POST['id'];
        $model = new M_penduduk();
        $data = array(
            'id_penduduk' => $id
        );
        $res  = $model->hapus_data($data);
        if ($res) {
            $arr = array(
                'success' => true,
                'msg' => 'berhasil'
            );
        }else {
            $arr = array(
                'success' => false,
                'msg' => 'gagal'
            );
        }
        echo json_encode($arr);
    }
}

