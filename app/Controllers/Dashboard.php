<?php namespace App\Controllers;
use App\Models\T_pengajuan;

class Dashboard extends BaseController
{
	public function index()
	{
		$model = new T_pengajuan();
        $pengajuan  = $model->get_pengajuan_dashboard();
        $bantuan = $model->get_bantuan_tersalurkan_dashboard();
        $data = array(
            'header' => 'main-inc/public/header',
            'konten' => 'inc/public/dashboard',
            'footer' => 'main-inc/public/footer',
            'data'	=> $pengajuan,
            'bantuan' => $bantuan
        );
        echo view('template',$data);
	}
}

