<?php namespace App\Controllers;
use App\Models\M_kk;
class Master_kk extends BaseController
{
	public function index()
	{
        return $this->get_kk();
    }
    
    function get_kk() {
        $model = new M_kk();
        $kk  = $model->get_kk();
        $data = array(
            'header' => 'main-inc/admin/header',
            'konten' => 'inc/admin/master_kk',
            'footer' => 'main-inc/admin/footer',
            'kk' => $kk
        );
        echo view('template',$data);
    }

    function get_data()
    {
        $model = new M_kk();
        $res  = $model->get_kk();
        $arr = array(
            'data' => $res
        );
        echo json_encode($arr);
    }

    function simpan()
    {
        $no_kk = $_POST['no_kk'];
        $nama_kepala_keluarga = $_POST['nama_kepala_keluarga'];
        $rt = $_POST['rt'];
        $rw = $_POST['rw'];
        $kode_pos = $_POST['kode_pos'];
        $desa = $_POST['desa'];
        $kecamatan = $_POST['kecamatan'];
        $kabupaten = $_POST['kabupaten'];
        $provinsi = $_POST['provinsi'];
        $tipe = $_POST['tipe'];
        $id = $_POST['id'];
        $data = array(
            'no_kk' => $no_kk,
            'nama_kepala_keluarga' => $nama_kepala_keluarga,
            'rt' => $rt,
            'rw' => $rw,
            'kode_pos' => $kode_pos,
            'desa' => $desa,
            'kecamatan' => $kecamatan,
            'kabupaten' => $kabupaten,
            'provinsi' => $provinsi,
        );
        $model = new M_kk();
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
            $where = array(
                'id_kk' => $id
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
        $model = new M_kk();
        $data = array(
            'id_kk' => $id
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

