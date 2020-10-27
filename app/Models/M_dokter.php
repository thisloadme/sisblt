<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class M_dokter extends Model
{
     
    public function get_dokter()
    {
        $builder = $this->db->table('m_dokter d');
        $builder->select('*');
        $builder->join('m_jenis_poli m', 'd.id_jenis_poli = m.id_jenis_poli','left');
        return $builder->get();
    }  
}