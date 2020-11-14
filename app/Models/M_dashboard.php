<?php 
namespace App\Models;
 
use CodeIgniter\Model;
 
class M_dashboard extends Model
{
    protected $db;

	public function __construct()
	{
		$db = \Config\Database::connect();
		$this->db =& $db;
	}

    public function get_pengajuan_setujui()
    {
        $q = $this->db->query("
                SELECT mp.no_ktp, mp.nama_penduduk, mp.rt, mp.rw, mp.kel, tp.tanggal_pengajuan, ms.nama_status, ms.id_status, mj.nominal
                FROM t_pengajuan tp
                left join m_user mu on mu.id_user = tp.id_user_pengajuan
                left join m_penduduk mp on mp.id_penduduk = tp.id_penduduk
                left join m_kk mk on mk.no_kk = mp.id_kk
                left join m_jenis_bantuan mj on mj.id_jenis_bantuan = tp.id_jenis_bantuan
                left join m_status ms on ms.id_status = tp.id_status
                where tp.id_status not in (4,5,6)
                order by tp.id_status desc
            ")->getResult();
        return $q;
    }

    public function get_pengajuan_realisasi()
    {
        $q = $this->db->query("
                SELECT mp.no_ktp, mp.nama_penduduk, mp.rt, mp.rw, mp.kel, tp.tanggal_pengajuan, ms.nama_status, ms.id_status, mj.nominal
                FROM t_pengajuan tp
                left join m_user mu on mu.id_user = tp.id_user_pengajuan
                left join m_penduduk mp on mp.id_penduduk = tp.id_penduduk
                left join m_kk mk on mk.no_kk = mp.id_kk
                left join m_jenis_bantuan mj on mj.id_jenis_bantuan = tp.id_jenis_bantuan
                left join m_status ms on ms.id_status = tp.id_status
                where tp.id_status = 7
                order by tp.id_status desc
            ")->getResult();
        return $q;
    }

    public function get_pengajuan_dashboard()
    {
        $q = $this->db->query("
                SELECT mp.no_ktp, mp.nama_penduduk, mp.rt, mp.rw, mp.kel, tp.tanggal_pengajuan, ms.nama_status, ms.id_status, mj.nominal
                FROM t_pengajuan tp
                left join m_user mu on mu.id_user = tp.id_user_pengajuan
                left join m_penduduk mp on mp.id_penduduk = tp.id_penduduk
                left join m_kk mk on mk.no_kk = mp.id_kk
                left join m_jenis_bantuan mj on mj.id_jenis_bantuan = tp.id_jenis_bantuan
                left join m_status ms on ms.id_status = tp.id_status
                order by tp.id_status desc
            ")->getResult();
        return $q;
    }

    public function get_total_penduduk()
    {
        $q = $this->db->query("
                SELECT count(*) jml
                FROM m_penduduk mp
            ")->getResult();
        return $q[0]->jml;
    }

    public function get_total_plafon()
    {
        $q = $this->db->query("
                SELECT sum(plafon) plafon
                FROM m_tingkat_adm
                where rw is not null
            ")->getResult();
        return $q[0]->plafon;
    }

    public function get_totalsisa_plafon()
    {
        $q = $this->db->query("
                SELECT sum(mj.nominal) nominal
                FROM t_pengajuan tp
                left join m_user mu on mu.id_user = tp.id_user_pengajuan
                left join m_penduduk mp on mp.id_penduduk = tp.id_penduduk
                left join m_kk mk on mk.no_kk = mp.id_kk
                left join m_jenis_bantuan mj on mj.id_jenis_bantuan = tp.id_jenis_bantuan
                left join m_status ms on ms.id_status = tp.id_status
                where tp.id_status = 7
            ")->getResult();
        return $q[0]->nominal;
    }
}