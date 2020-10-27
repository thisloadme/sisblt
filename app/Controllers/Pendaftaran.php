<?php namespace App\Controllers;

class Pendaftaran extends BaseController
{
	public function index()
	{
        $data = array(
            'header' => 'main-inc/public/header',
            'konten' => 'inc/public/pendaftaran',
            'footer' => 'main-inc/public/footer',
        );
        echo view('template',$data);
	}
}

