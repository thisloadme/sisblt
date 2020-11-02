<?php namespace App\Controllers;
use App\Models\M_plafon;
class Plafon extends BaseController
{
	public function index()
	{
        return $this->get_plafon();
    }
    
    function get_plafon() {
        $model = new M_plafon();
        $data = array(
            'header' => 'main-inc/admin/header',
            'konten' => 'inc/admin/plafon',
            'footer' => 'main-inc/admin/footer',
        );
        echo view('template',$data);
    }
}

