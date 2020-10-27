<?php namespace App\Controllers;
use App\Models\M_pasien;
class Pasien extends BaseController
{
	public function index()
	{
        return $this->get_pasien();
    }
    
    function get_pasien() {
        $model = new M_pasien();
        $pasien  = $model->get_pasien()->getResult();
        $data = array(
            'header' => 'main-inc/admin/header',
            'konten' => 'inc/admin/pasien',
            'footer' => 'main-inc/admin/footer',
            'pasien' => $pasien
        );
        echo view('template',$data);
    }
}

