<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class M_tingkat_adm extends Model
{

	protected $db;

	public function __construct()
	{
		$db = \Config\Database::connect();
		$this->db =& $db;
	}
     
    public function get_tingkat_adm()
    {
        $q = $this->db->table('m_tingkat_adm')->get()->getResult();
        return $q;
    }  

    public function get_tingkat_adm_all()
    {
    	$q = $this->db->table('m_tingkat_adm')
    	->select(['tahun', 'rt', 'rw', 'id_tingkat_adm', '"Kepala Desa / Lurah" nama_tingkat_adm'])
    	->where('rt', NULL)
    	->where('rw', NULL)
    	->get()->getResult();

    	$w = $this->db->table('m_tingkat_adm')
    	->select(['tahun', 'rt', 'rw', 'id_tingkat_adm', 'CONCAT("RW ", rw) nama_tingkat_adm'])
    	->where('rt', NULL)
    	->where('rw is not', NULL)
    	->get()->getResult();

    	$e = $this->db->table('m_tingkat_adm')
    	->select(['tahun', 'rt', 'rw', 'id_tingkat_adm', 'CONCAT("RW ", rw, " RT ", rt) nama_tingkat_adm'])
    	->where('rt is not', NULL)
    	->where('rw is not', NULL)
    	->get()->getResult();

		$arr = array_merge($q,$w,$e);
		
		foreach ($arr as $k => $a) {
            $arr[$k]->no = $k+1;
        }
        return $arr;
	}
	
	public function tambah_data($data)
    {
        return $this->db->table('m_tingkat_adm')->insert($data);
    }

    public function ubah_data($data, $where)
    {
        return $this->db->table('m_tingkat_adm')->update($data, $where);
    }

    public function hapus_data($data)
    {
        return $this->db->table('m_tingkat_adm')->delete($data);
    }
}