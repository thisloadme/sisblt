<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class M_asuransi extends Model
{
     
    public function get_asuransi()
    {
        $builder = $this->db->table('m_asuransi_jiwa');
        $builder->select('*');
        return $builder->get();
    }  
}