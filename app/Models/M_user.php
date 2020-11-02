<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class M_user extends Model
{

	protected $db;

	public function __construct()
	{
		$db = \Config\Database::connect();
		$this->db =& $db;
	}
     
    public function get_user()
    {
        $q = $this->db->table('m_user')->get()->getResult();
        return $q;
    }  
}