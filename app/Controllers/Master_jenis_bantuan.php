<?php 
namespace App\Controllers;
use App\Models\M_jenis_bantuan;
class Master_jenis_bantuan extends BaseController
{
	public function index()
	{
		$model = new M_jenis_bantuan();
        $jenis  = $model->get_jenis_bantuan();
        $data = array(
            'header' => 'main-inc/admin/header',
            'konten' => 'inc/admin/master_jenis_bantuan',
            'footer' => 'main-inc/admin/footer',
            'jenis'	 => $jenis,
        );
        echo view('template',$data);
	}

    function get_data()
    {
        $model = new M_jenis_bantuan();
        $res  = $model->get_jenis_bantuan();
        $arr = array(
            'data' => $res
        );
        echo json_encode($arr);
    }

    function simpan()
    {
        $id = $_POST['id'];
        $jenis_bantuan = $_POST['jenis_bantuan'];
        $jumlah = $_POST['jumlah'];
        $satuan = $_POST['satuan'];
        $tipe = $_POST['tipe'];

        $data = array(
            'nama_jenis_bantuan' => $jenis_bantuan,
            'nominal' => $jumlah,
            'satuan' => $satuan
        );
        $model = new M_jenis_bantuan();
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
                'id_jenis_bantuan' => $id
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
        $model = new M_jenis_bantuan();
        $data = array(
            'id_jenis_bantuan' => $id
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

