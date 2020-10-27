<?php namespace App\Controllers;
use App\Models\M_pegawai;
class Master_pegawai extends BaseController
{
	public function index()
	{
        return $this->get_pegawai();
    }
    
    function get_pegawai() {
        $model = new M_pegawai();
        $pegawai  = $model->get_pegawai()->getResult();
        $data = array(
            'header' => 'main-inc/admin/header',
            'konten' => 'inc/admin/master_pegawai',
            'footer' => 'main-inc/admin/footer',
            'pegawai' => $pegawai
        );
        echo view('template',$data);
    }
}

