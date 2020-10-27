<?php namespace App\Controllers;

class Master_layanan_dokter extends BaseController
{
	public function index()
	{
        $data = array(
            'header' => 'main-inc/admin/header',
            'konten' => 'inc/admin/master_layanan_dokter',
            'footer' => 'main-inc/admin/footer',
        );
        echo view('template',$data);
	}
}

