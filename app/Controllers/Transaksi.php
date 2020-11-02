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
}

