<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class T_pengajuan extends Model
{
    protected $db;

	public function __construct()
	{
		$db = \Config\Database::connect();
		$this->db =& $db;
	}
     
    public function get_pengajuan($sess)
    {
        if ($sess['nama_tingkat_adm'] == 'Desa') {
            $status = array(2,3,7);
        }elseif ($sess['nama_tingkat_adm'] == 'RW') {
            $status = array(1,2);
        }else {
            $status = array(8,1);
        }
        $q = $this->db->table('t_pengajuan')
        ->join('m_user', 'm_user.id_user = t_pengajuan.id_user_pengajuan', 'left')
        ->join('m_penduduk', 'm_penduduk.id_penduduk = t_pengajuan.id_penduduk', 'left')
        ->join('m_kk', 'm_kk.no_kk = m_penduduk.id_kk', 'left')
        ->join('m_jenis_bantuan', 'm_jenis_bantuan.id_jenis_bantuan = t_pengajuan.id_jenis_bantuan', 'left')
        ->join('m_status', 'm_status.id_status = t_pengajuan.id_status', 'left')
        ->whereIn('t_pengajuan.id_status', $status)
        ->orderBy('t_pengajuan.id_status', 'desc')
        ->get()->getResult();

        foreach ($q as $k => $a) {
            if ($sess['nama_tingkat_adm'] == 'RW') {
                if ($a->rw != $sess['rw']) {
                    unset($q[$k]);
                }
            }elseif ($sess['nama_tingkat_adm'] == 'RT') {
                if ($a->rw != $sess['rw'] and $a->rt != $sess['rt']) {
                    unset($q[$k]);
                }
            }
            $q[$k]->no = $k+1;
            $q[$k]->bantu = $a->satuan.' '.$a->nominal;
        }
        return $q;
    }

    public function get_pengajuan_dashboard()
    {
        //->select('m_user.nama_penduduk', 'm_user.alamat', 'm_user.no_ktp', 't_pengajuan.tanggal_pengajuan', 'm_status.nama_status')
        $q = $this->db->table('t_pengajuan')
        ->join('m_user', 'm_user.id_user = t_pengajuan.id_user_pengajuan', 'left')
        ->join('m_penduduk', 'm_penduduk.id_penduduk = t_pengajuan.id_penduduk', 'left')
        ->join('m_kk', 'm_kk.id_kk = m_penduduk.id_kk', 'left')
        ->join('m_jenis_bantuan', 'm_jenis_bantuan.id_jenis_bantuan = t_pengajuan.id_jenis_bantuan', 'left')
        ->join('m_status', 'm_status.id_status = t_pengajuan.id_status', 'left')
        ->where('t_pengajuan.id_status not in (4,5,6)')
        ->orderBy('t_pengajuan.id_status', 'desc')
        ->get()->getResult();
        return $q;
    }

    public function get_bantuan_tersalurkan_dashboard()
    {
        $q = $this->db->table('t_pengajuan')
        ->select(['m_jenis_bantuan.nama_jenis_bantuan', 'm_jenis_bantuan.satuan'])
        ->selectSum('m_jenis_bantuan.nominal')
        ->join('m_jenis_bantuan', 'm_jenis_bantuan.id_jenis_bantuan = t_pengajuan.id_jenis_bantuan', 'left')
        ->where('t_pengajuan.id_status not in (4,5,6)')
        ->groupBy('m_jenis_bantuan.nama_jenis_bantuan', 'm_jenis_bantuan.satuan')
        ->orderBy('t_pengajuan.id_status', 'desc')
        ->get()->getResult();
        return $q;
    }

    public function get_pengajuan_bynik($nik)
    {
        $q = $this->db->table('t_pengajuan')
        ->join('m_user', 'm_user.id_user = t_pengajuan.id_user_pengajuan', 'left')
        ->join('m_penduduk', 'm_penduduk.id_penduduk = t_pengajuan.id_penduduk', 'left')
        ->join('m_kk', 'm_kk.id_kk = m_penduduk.id_kk', 'left')
        ->join('m_jenis_bantuan', 'm_jenis_bantuan.id_jenis_bantuan = t_pengajuan.id_jenis_bantuan', 'left')
        ->join('m_status', 'm_status.id_status = t_pengajuan.id_status', 'left')
        ->where('m_penduduk.no_ktp',$nik)
        ->orderBy('t_pengajuan.id_status', 'desc')
        ->get()->getResult();
        foreach ($q as $k => $a) {
            $q[$k]->no = $k+1;
            $q[$k]->bantu = $a->nama_jenis_bantuan.'('.$a->nominal.' '.$a->satuan.')';
        }
        return $q;
    }

    public function tambah_data($data)
    {
    	return $this->db->table('t_pengajuan')->insert($data);
    }

    public function ubah_data($data, $where)
    {
    	return $this->db->table('t_pengajuan')->update($data, $where);
    }

    public function hapus_data($data)
    {
    	return $this->db->table('t_pengajuan')->delete($data);
    }

    public function teruskan($data, $where)
    {
    	return $this->db->table('t_pengajuan')->update($data, $where);
    }

    public function tolak($data, $where)
    {
    	return $this->db->table('t_pengajuan')->update($data, $where);
    }

}