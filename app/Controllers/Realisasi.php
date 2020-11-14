<?php 
namespace App\Controllers;
use App\Models\T_pengajuan;
class Realisasi extends BaseController
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
            'konten' => 'inc/admin/realisasi',
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

    function direalisasi()
    {
        $session = \Config\Services::session();

        $model = new T_pengajuan();
        $data = array(
            'id_status' => 7,
        );
        $where = array(
            'id_pengajuan' => $_POST['id']
        );

        $res  = $model->teruskan($data, $where);
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

    function tolak()
    {
        $session = \Config\Services::session();

        $model = new T_pengajuan();
        $data = array(
            'id_status' => 6,
        );
        $where = array(
            'id_pengajuan' => $_POST['id']
        );

        $res  = $model->tolak($data, $where);
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

