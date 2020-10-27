<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class M_obat extends Model
{
     
    public function get_obat()
    {
        $builder = $this->db->table('m_obat');
        $builder->select('*');
        return $builder->get();
    }  
}