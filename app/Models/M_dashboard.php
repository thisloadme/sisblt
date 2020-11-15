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

    public function get_total_plafon($sess='')
    {
        if ($sess == '') {
            $where = '';
        }else {
            if ($sess['nama_tingkat_adm'] == 'Desa') {
                $where = 'where rw is not null';
            }elseif (strtolower($sess['nama_tingkat_adm']) == 'rw') {
                $where = 'where rw ='.$sess['rw'];
            }elseif (strtolower($sess['nama_tingkat_adm']) == 'rt') {
                $where = 'where rw = '.$sess['rw'].' and rt = '.$sess['rt'];
            }else {
                $where = 'where rw = '.$sess['rw'].' and rt = '.$sess['rt']; 
            }
        }
        $q = $this->db->query("
                SELECT sum(plafon) plafon
                FROM m_tingkat_adm
                $where
            ")->getResult();
        return $q[0]->plafon;
    }

    public function get_totalsisa_plafon($sess='')
    {
        if ($sess == '') {
            $where = '';
        }else {
            if ($sess['nama_tingkat_adm'] == 'Desa') {
                $where = '';
            }elseif (strtolower($sess['nama_tingkat_adm']) == 'rw') {
                $where = 'and mp.rw = '.$sess['rw'];
            }else {
                $where = 'and mp.rw = '.$sess['rw'].' and mp.rt = '.$sess['rt'];
            }
        }
        $q = $this->db->query("
                SELECT sum(mj.nominal) nominal
                FROM t_pengajuan tp
                left join m_penduduk mp on mp.id_penduduk = tp.id_penduduk
                left join m_kk mk on mk.no_kk = mp.id_kk
                left join m_jenis_bantuan mj on mj.id_jenis_bantuan = tp.id_jenis_bantuan
                where tp.id_status = 7 $where
            ")->getResult();
        return $q[0]->nominal;
    }
}