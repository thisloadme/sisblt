<?php namespace App\Controllers;
use App\Models\M_plafon;
class Plafon extends BaseController
{

    protected $sess;

    public function __construct()
    {
        $session = \Config\Services::session();
        $this->sess =& $session;
    }

	public function index()
	{
        return $this->get_plafon($this->sess->get());
    }
    
    function get_plafon() {
        $model = new M_plafon();
        $res = $model->get_plafon($this->sess->get());
        $data = array(
            'header' => 'main-inc/admin/header',
            'konten' => 'inc/admin/plafon',
            'footer' => 'main-inc/admin/footer',
            'res' => $res
        );
        echo view('template',$data);
    }

    function get_data()
    {
        $model = new M_plafon();
        $res = $model->get_plafon($this->sess->get());
        echo json_encode($res);
    }

    function simpan()
    {
        $model = new M_plafon();
        $req = $_POST['data'];
        foreach ($req as $key => $val) {
            $data = array(
                'plafon' => $val['plafon']
            );
            $where = array(
                'id_tingkat_adm' => $val['id']
            );
            $res  = $model->ubah_data($data, $where);
        }
        if ($res) {
            $arr = array(
                'success' => true,
                'msg' => 'Berhasil simpan data'
            );
        }else {
            $arr = array(
                'success' => false,
                'msg' => 'Gagal simpan, coba lagi'
            );
        }
        echo json_encode($arr);
    }
}

