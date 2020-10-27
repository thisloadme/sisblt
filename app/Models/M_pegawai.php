<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class M_pegawai extends Model
{
     
    public function get_pegawai()
    {
        $builder = $this->db->table('m_pegawai');
        $builder->select('*');
        return $builder->get();
    }  
}