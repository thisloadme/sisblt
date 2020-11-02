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
        $nama = $_POST['status'];
        $tipe = $_POST['tipe'];
        $id = $_POST['id'];
        $data = array(
            'nama_status' => $nama
        );
        $model = new M_status();
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
                'id_status' => $id
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
        $model = new M_status();
        $data = array(
            'id_status' => $id
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

