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
}