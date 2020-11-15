<?php 
namespace App\Models;
 
use CodeIgniter\Model;
 
class M_laporan extends Model
{
    protected $db;

	public function __construct()
	{
		$db = \Config\Database::connect();
		$this->db =& $db;
	}

    public function get_daftar_penerima_blt()
    {
        $sql = "
            SELECT mp.no_ktp, mk.no_kk, mk.nama_kepala_keluarga, mp.nama_penduduk, mp.rt, mp.rw, mp.kel, tp.tanggal_pengajuan, ms.nama_status, ms.id_status, mj.nominal
            FROM t_pengajuan tp
            left join m_user mu on mu.id_user = tp.id_user_pengajuan
            left join m_penduduk mp on mp.id_penduduk = tp.id_penduduk
            left join m_kk mk on mk.no_kk = mp.id_kk
            left join m_jenis_bantuan mj on mj.id_jenis_bantuan = tp.id_jenis_bantuan
            left join m_status ms on ms.id_status = tp.id_status
            where tp.id_status = 7
            order by tp.id_status desc
        ";

        $q = $this->db->query($sql)->getResult();
        return $q;
    }

    public function get_calon_penerima_blt()
    {
        $sql = "
            SELECT mp.no_ktp, mk.no_kk, mk.nama_kepala_keluarga, mp.nama_penduduk, mp.rt, mp.rw, mp.kel, tp.tanggal_pengajuan, ms.nama_status, ms.id_status, mj.nominal
            FROM t_pengajuan tp
            left join m_user mu on mu.id_user = tp.id_user_pengajuan
            left join m_penduduk mp on mp.id_penduduk = tp.id_penduduk
            left join m_kk mk on mk.no_kk = mp.id_kk
            left join m_jenis_bantuan mj on mj.id_jenis_bantuan = tp.id_jenis_bantuan
            left join m_status ms on ms.id_status = tp.id_status
            where tp.id_status = 2
            order by tp.id_status desc
        ";

        $q = $this->db->query($sql)->getResult();
        return $q;
    }

    public function get_total_penduduk()
    {
        $sql = "
            SELECT distinct rw,
            (select count(*) from m_kk where rw = mp.rw) jumlah_kk, 
            (select count(*) from m_penduduk where rw = mp.rw) jumlah_jiwa, 
            (select count(*) from m_penduduk where rw = mp.rw and jenis_kelamin = 'L') jumlah_l, 
            (select count(*) from m_penduduk where rw = mp.rw and jenis_kelamin = 'P') jumlah_p, 
            (select count(*) from m_penduduk where rw = mp.rw and datediff(CURDATE(), tanggal_lahir) <= 18250) jumlah_muda, 
            (select count(*) from m_penduduk where rw = mp.rw and datediff(CURDATE(), tanggal_lahir) > 18250) jumlah_tua 
            FROM m_penduduk mp
        ";

        $q = $this->db->query($sql)->getResult();
        return $q;
    }
}