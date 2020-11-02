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
}

