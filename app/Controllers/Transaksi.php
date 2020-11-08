<?php 
namespace App\Controllers;
use App\Models\T_pengajuan;
class Transaksi extends BaseController
{

    protected $sess;

    public function __construct()
    {
        $session = \Config\Services::session();
        $this->sess =& $session;

        if ($this->sess->get('nama_user') == '') {
            return redirect()->to('/login');
        }
    }

	public function index()
	{
		$model = new T_pengajuan();
        $pengajuan  = $model->get_pengajuan();
        $data = array(
            'header' => 'main-inc/admin/header',
            'konten' => 'inc/admin/pengajuan',
            'footer' => 'main-inc/admin/footer',
            'pengajuan' => $pengajuan
        );
        echo view('template',$data);
	}

    function get_data()
    {
        $model = new T_pengajuan();
        $res  = $model->get_pengajuan();
        $arr = array(
            'data' => $res
        );
        echo json_encode($arr);
    }

    function simpan()
    {
        $tipe = $_POST['tipe'];
        $data = array(
            'id_user_pengajuan' => 1,
            'id_penduduk' => $_POST['id_penduduk'],
            'id_jenis_bantuan' => $_POST['jenis_bantuan'],
            'id_status' => 1,
            'tanggal_pengajuan' => date('Y-m-d h:i:s'),
            'tanggal_selesai' => ''
        );

        $model = new T_pengajuan();
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
                'id_pengajuan' => $id
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
        $model = new T_pengajuan();
        $data = array(
            'id_pengajuan' => $id
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
