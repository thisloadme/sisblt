<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class M_kk extends Model
{
    protected $db;

	public function __construct()
	{
		$db = \Config\Database::connect();
		$this->db =& $db;
	}
     
    public function get_kk()
    {
        $q = $this->db->table('m_kk')->get()->getResult();
        foreach ($q as $k => $a) {
            $q[$k]->no = $k+1;
        }
        return $q;
    }  

    public function tambah_data($data)
    {
        return $this->db->table('m_kk')->insert($data);
    }

    public function ubah_data($data, $where)
    {
        return $this->db->table('m_kk')->update($data, $where);
    }

    public function hapus_data($data)
    {
        return $this->db->table('m_kk')->delete($data);
    }
}