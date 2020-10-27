<?php namespace App\Controllers;
use App\Models\M_dokter;
class Master_dokter extends BaseController
{
	public function index()
	{
        return $this->get_dokter();
    }
    
    function get_dokter() {
        $model = new M_dokter();
        $dokter  = $model->get_dokter()->getResult();
        $data = array(
            'header' => 'main-inc/admin/header',
            'konten' => 'inc/admin/master_dokter',
            'footer' => 'main-inc/admin/footer',
            'dokter' => $dokter
        );
        echo view('template',$data);
    }
}

