<?php namespace App\Controllers;
use App\Models\M_dashboard;

class Dashboard extends BaseController
{
	public function index()
	{
		$model = new M_dashboard();
        $setuju  = $model->get_pengajuan_setujui();
        $realisasi  = $model->get_pengajuan_realisasi();
        $semua  = $model->get_pengajuan_dashboard();
        $totalpenduduk = $model->get_total_penduduk();
        $totalplafon = $model->get_total_plafon();
        $data = array(
            'header' => 'main-inc/public/header',
            'konten' => 'inc/public/dashboard',
            'footer' => 'main-inc/public/footer',
            'semua'	=> $semua,
            'setuju' => $setuju,
            'totalpenduduk' => $totalpenduduk,
            'totalplafon' => $totalplafon,
            'realisasi' => $realisasi
        );
        echo view('template',$data);
	}
}

