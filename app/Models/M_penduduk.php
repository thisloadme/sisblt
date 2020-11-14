<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class M_penduduk extends Model
{

	protected $db;

	public function __construct()
	{
		$db = \Config\Database::connect();
		$this->db =& $db;
	}
     
    public function get_penduduk($sess)
    {
        if ($sess['nama_tingkat_adm'] == 'Desa') {
            $q = $this->db->table('m_penduduk')->get()->getResult();
        }elseif ($sess['nama_tingkat_adm'] == 'RW') {
            $q = $this->db->table('m_penduduk')
            ->where('rw', $sess['rw'])
            ->get()->getResult();
        }else {
            $q = $this->db->table('m_penduduk')
            ->where('rt', $sess['rt'])
            ->where('rw', $sess['rw'])
            ->get()->getResult();
        }
        foreach ($q as $k => $a) {
        	$q[$k]->no = $k+1;
        	$q[$k]->ttl = $a->tempat_lahir.', '.date('d F Y', strtotime($a->tanggal_lahir));
        }
        return $q;
    }  

    public function tambah_data($data)
    {
    	return $this->db->table('m_penduduk')->insert($data);
    }

    public function ubah_data($data, $where)
    {
    	return $this->db->table('m_penduduk')->update($data, $where);
    }

    public function hapus_data($data)
    {
    	return $this->db->table('m_penduduk')->delete($data);
    }
}