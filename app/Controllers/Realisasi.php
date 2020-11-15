<?php 
namespace App\Controllers;
use App\Models\T_pengajuan;
use App\Models\M_dashboard;
class Realisasi extends BaseController
{

    protected $sess;

    public function __construct()
    {
        $session = \Config\Services::session();
        $this->sess =& $session;

        if ($this->sess->get('nama_user') == '') {
            return redirect()->to('/login/logout');
        }
    }

	public function index()
	{
        $model = new T_pengajuan();
        $model2 = new M_dashboard();
        $pengajuan  = $model->get_pengajuan_real($this->sess->get());
        $totalplafon = $model2->get_total_plafon($this->sess->get());
        $realisasi  = $model2->get_totalsisa_plafon($this->sess->get());
        $data = array(
            'header' => 'main-inc/admin/header',
            'konten' => 'inc/admin/realisasi',
            'footer' => 'main-inc/admin/footer',
            'pengajuan' => $pengajuan,
            'totalplafon' => $totalplafon,
            'sisa_plafon' => $totalplafon-$realisasi
        );
        echo view('template',$data);
	}

    function get_data()
    {
        $model = new T_pengajuan();
        $res  = $model->get_pengajuan_real($this->sess->get());
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

        $status = '';
        if($session->get('nama_tingkat_adm') == 'rw'){
            $status = 4;
        }else{
            $status = 6;
        }

        $model = new T_pengajuan();
        $data = array(
            'id_status' => $status,
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

