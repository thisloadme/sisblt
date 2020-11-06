<?php 
namespace App\Controllers;
class Cek_bantuan extends BaseController
{
	public function index()
	{
        $data = array(
            'header' => 'main-inc/public/header',
            'konten' => 'inc/public/cek_bantuan',
            'footer' => 'main-inc/public/footer',
        );
        echo view('template',$data);
    }
    
}

