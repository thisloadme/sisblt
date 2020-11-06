<?php namespace App\Controllers;
use App\Models\M_pengguna;
class Master_pengguna extends BaseController
{
	public function index()
	{
        return $this->get_pengguna();
    }
    
    function get_pengguna() {
        $model = new M_pengguna();
        $pengguna  = $model->get_pengguna();
        $data = array(
            'header' => 'main-inc/admin/header',
            'konten' => 'inc/admin/master_pengguna',
            'footer' => 'main-inc/admin/footer',
            'pengguna' => $pengguna
        );
        echo view('template',$data);
    }

    function get_data()
    {
        $model = new M_pengguna();
        $res  = $model->get_pengguna();
        $arr = array(
            'data' => $res
        );
        echo json_encode($arr);
    }

    function simpan()
    {
        $nama = $_POST['nama_user'];
        $tipe = $_POST['tipe'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $adm = $_POST['adm'];
        $id = $_POST['id'];
        if (($password != $password2) or ($password == '' and $password2 == '')) {
            $arr = array(
                'success' => false,
                'msg' => 'Password tidak sama'
            );
        }else {
            $data = array(
                'nama_user' => $nama,
                'pass_user' => $password,
                'id_tingkat_adm' => $adm,
                'tahun' => date('Y'),
            );
            $model = new M_pengguna();
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
                if ($password == '' OR $password == NULL) {
                    unset($data['pass_user']);
                }
                $where = array(
                    'id_user' => $id
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
        }
        echo json_encode($arr);
    }

    function hapus()
    {
        $id = $_POST['id'];
        $model = new M_pengguna();
        $data = array(
            'id_user' => $id
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

