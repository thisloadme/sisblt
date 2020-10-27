<?php 
namespace App\Controllers;

class Login extends BaseController
{
	public function index()
	{
        $data = array(
            'header' => 'main-inc/public/header',
            'konten' => 'inc/public/login',
            'footer' => 'main-inc/public/footer',
        );
        echo view('template',$data);
	}
}

