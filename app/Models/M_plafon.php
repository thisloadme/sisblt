<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class M_plafon extends Model
{

	protected $db;

	public function __construct()
	{
		$db = \Config\Database::connect();
		$this->db =& $db;
	}
     
    public function get_plafon()
    {
        $q = $this->db->table('m_user')->join('m_tingkat_adm', 'm_tingkat_adm.id_tingkat_adm = m_user.id_tingkat_adm')
        ->orderBy('m_user.id_tingkat_adm', 'DESC')
        ->get()->getResult();
        foreach ($q as $k => $a) {
        	$q[$k]->no = $k+1;
        }
        return $q;
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