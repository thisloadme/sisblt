<?php 
namespace App\Controllers; 
use App\Models\M_pengguna;
class Login extends BaseController
{
	protected $m_pengguna;

	public function __construct()
	{
		$pengguna = new M_pengguna();
		$this->m_pengguna =& $pengguna;
	}

	public function index()
	{
		$data = array(
			'header' => 'main-inc/public/header',
			'konten' => 'inc/public/login',
			'footer' => 'main-inc/public/footer',
		);
		echo view('template',$data);
	}

	public function proses()
	{
		$user = $_POST['userlogin'];
		$pass = $_POST['userpass'];

		if ($user == '' OR $pass == '') {
    		$out = array(
    			'success' => false,
    			'msg' => 'Harap lengkapi username dan passwordnya'
    		);
    		return $out;
    	}

    	$cek_login = $this->m_pengguna->cek_kesesuaian_login($user, $pass);
    	if ($cek_login['success']) {
			$session = \Config\Services::session();
			$sess_data = $cek_login['data'][0];
			$session->set($sess_data);
			
			echo json_encode($cek_login);
    	}else {
    		echo json_encode($cek_login);
    		exit();
    	}
	}

	public function logout()
	{	
		$session = \Config\Services::session();
		$session->destroy();

		return redirect()->to('/login'); 
	}
}

