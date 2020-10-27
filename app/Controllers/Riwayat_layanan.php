<?php namespace App\Controllers;

class Riwayat_layanan extends BaseController
{
	public function index()
	{
        $data = array(
            'header' => 'main-inc/admin/header',
            'konten' => 'inc/admin/riwayat_layanan',
            'footer' => 'main-inc/admin/footer',
        );
        echo view('template',$data);
	}
}

