<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class M_jenis_bantuan extends Model
{
    protected $db;

	public function __construct()
	{
		$db = \Config\Database::connect();
		$this->db =& $db;
	}
     
    public function get_jenis_bantuan()
    {
        $q = $this->db->table('m_jenis_bantuan')->get()->getResult();
        return $q;
    }  

    public function tambah_data($data)
    {
        return $this->db->table('m_jenis_bantuan')->insert($data);
    }

    public function ubah_data($data, $where)
    {
        return $this->db->table('m_jenis_bantuan')->update($data, $where);
    }

    public function hapus_data($data)
    {
        return $this->db->table('m_jenis_bantuan')->delete($data);
    }
}