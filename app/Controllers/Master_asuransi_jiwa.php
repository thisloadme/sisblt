<?php namespace App\Controllers;

use App\Models\M_asuransi;

class Master_asuransi_jiwa extends BaseController
{
	public function index()
	{
        return $this->get_asuransi();
    }
    
    function get_asuransi () {
        $model = new M_asuransi();
        $asuransi  = $model->get_asuransi()->getResult();
        $data = array(
            'header' => 'main-inc/admin/header',
            'konten' => 'inc/admin/master_asuransi_jiwa',
            'footer' => 'main-inc/admin/footer',
            'asuransi' => $asuransi
        );
        
        echo view('template',$data);
    }
}

