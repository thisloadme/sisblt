<?php namespace App\Controllers;
use App\Models\M_obat;
class Master_obat extends BaseController
{
	public function index()
	{
        return $this->get_obat();
    }
    
    function get_obat () {
        $model = new M_obat();
        $obat  = $model->get_obat()->getResult();
        $data = array(
            'header' => 'main-inc/admin/header',
            'konten' => 'inc/admin/master_obat',
            'footer' => 'main-inc/admin/footer',
            'obat' => $obat
        );
        
        echo view('template',$data);
    }
}

