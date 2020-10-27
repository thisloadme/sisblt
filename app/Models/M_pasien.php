<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class M_pasien extends Model
{
     
    public function get_pasien()
    {
        $builder = $this->db->table('m_pasien d');
        $builder->select('*');
        $builder->join('m_asuransi_jiwa m', 'd.id_jenis_asuransi = m.id_asuransi_jiwa','left');
        return $builder->get();
    }  
}