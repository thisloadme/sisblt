<?php 
namespace App\Controllers;
use App\Models\M_jenis_bantuan;
class Master_jenis_bantuan extends BaseController
{
	public function index()
	{
		$model = new M_jenis_bantuan();
        $jenis  = $model->get_jenis_bantuan();
        $data = array(
            'header' => 'main-inc/admin/header',
            'konten' => 'inc/admin/master_jenis_bantuan',
            'footer' => 'main-inc/admin/footer',
            'jenis'	 => $jenis,
        );
        echo view('template',$data);
	}
}

