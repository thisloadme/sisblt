<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class M_pengguna extends Model
{

	protected $db;

	public function __construct()
	{
		$db = \Config\Database::connect();
		$this->db =& $db;
	}
     
    public function get_pengguna()
    {
        $q = $this->db->table('m_user')->join('m_tingkat_adm', 'm_tingkat_adm.id_tingkat_adm = m_user.id_tingkat_adm')
        ->orderBy('m_user.id_tingkat_adm', 'DESC')
        ->get()->getResult();
        foreach ($q as $k => $a) {
        	$q[$k]->no = $k+1;
        	$q[$k]->adm = ($a->rt == NULL AND $a->rw == NULL) /*lurah*/ ? 'Kepala Desa/Lurah' : ($a->rt == NULL /*RW*/ ? 'RW '.$a->rw : 'RW '.$a->rw.' RT '.$a->rt);
        }
        return $q;
    }

    public function cek_kesesuaian_login($user, $pass)
    {
    	$q = $this->db->table('m_user')
    	->where('nama_user', $user)
    	->countAllResults();

    	if ($q > 0) {
    		$w = $this->db->table('m_user')
    		->join('m_tingkat_adm', 'm_tingkat_adm.id_tingkat_adm = m_user.id_tingkat_adm')
	    	->where('m_user.nama_user', $user)
	    	->where('m_user.pass_user', $pass);
    		$res = $w->get()->getResultArray();

	    	if ($w->countAllResults() > 0) {
	    		$out = array(
	    			'success' => true,
	    			'msg' => 'Berhasil',
	    			'data' => $res
	    		);
	    		return $out;
	    	}else {
	    		$out = array(
	    			'success' => false,
	    			'msg' => 'Periksa kembali passwordnya'
	    		);
	    		return $out;
	    	}

    	}else {
    		$out = array(
    			'success' => false,
    			'msg' => 'Maaf, username tidak terdaftar'
    		);
    		return $out;
    	}
    }

    public function tambah_data($data)
    {
    	return $this->db->table('m_user')->insert($data);
    }

    public function ubah_data($data, $where)
    {
    	return $this->db->table('m_user')->update($data, $where);
    }

    public function hapus_data($data)
    {
    	return $this->db->table('m_user')->delete($data);
    }
}