<?php 
namespace App\Controllers;
use App\Models\M_tingkat_adm;
class Master_tingkat_adm extends BaseController
{
	public function index()
	{
        return $this->get_tingkat_adm();
    }
    
    function get_tingkat_adm () {
        $model = new M_tingkat_adm();
        $tingkat_adm  = $model->get_tingkat_adm();
        $data = array(
            'header' => 'main-inc/admin/header',
            'konten' => 'inc/admin/master_tingkat_adm',
            'footer' => 'main-inc/admin/footer',
            'tingkat_adm' => $tingkat_adm
        );
        
        echo view('template',$data);
    }

    function get_data()
    {
        $model = new M_tingkat_adm();
        $res  = $model->get_tingkat_adm_all();
        $arr = array(
            'data' => $res
        );
        echo json_encode($arr);
    }

    function simpan()
    {
        $nama_tingkat_adm = $_POST['nama_wilayah_adm'];
        $rt = $_POST['rt'] == '' ? NULL : $_POST['rt'];
        $rw = $_POST['rw'] == '' ? NULL : $_POST['rw'];
        $tipe = $_POST['tipe'];
        $id = $_POST['id'];
        $data = array(
            'nama_tingkat_adm' => $nama_tingkat_adm,
            'rt' => $rt,
            'rw' => $rw,
            'tahun' => date('Y')
        );
        $model = new M_tingkat_adm();
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
                'id_tingkat_adm' => $id
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
        $model = new M_tingkat_adm();
        $data = array(
            'id_tingkat_adm' => $id
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

