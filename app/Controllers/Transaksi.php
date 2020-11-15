<?php 
namespace App\Controllers;
use App\Models\T_pengajuan;
class Transaksi extends BaseController
{

    protected $sess;

    public function __construct()
    {
        $session = \Config\Services::session();
        $this->sess =& $session;

        if ($this->sess->get('nama_user') == '') {
            return redirect()->to('/login');
        }

        helper('form');
    }

	public function index()
	{
		$model = new T_pengajuan();
        $pengajuan  = $model->get_pengajuan($this->sess->get());
        $data = array(
            'header' => 'main-inc/admin/header',
            'konten' => 'inc/admin/pengajuan',
            'footer' => 'main-inc/admin/footer',
            'pengajuan' => $pengajuan
        );
        echo view('template',$data);
	}

    function get_data()
    {
        $model = new T_pengajuan();
        $res  = $model->get_pengajuan($this->sess->get());
        $arr = array(
            'data' => $res
        );
        echo json_encode($arr);
    }

    function get_data_bynik()
    {
        $nik = $_POST['nik'];
        $model = new T_pengajuan();
        $res  = $model->get_pengajuan_bynik($nik);
        $arr = array(
            'data' => $res
        );
        echo json_encode($arr);
    }

    function simpan()
    {
        $session = \Config\Services::session();
        
        if ($_POST['id'] == 'null') {
            $_POST['id'] = null;
        }

        $tipe = $_POST['tipe'];
        $data = array(
            'id_user_pengajuan' => $session->get('id_user'),
            'id_penduduk' => $_POST['id_penduduk'],
            'id_jenis_bantuan' => $_POST['jenis_bantuan'],
            'id_status' => 8,
            'tanggal_pengajuan' => date('Y-m-d h:i:s'),
            'tanggal_selesai' => NULL,
            'kategori' => json_encode($_POST['kategori'])
        );

        $model = new T_pengajuan();
        if ($tipe == 'add') {   
            if ($this->request->getMethod() !== 'post') {
                return redirect()->to(base_url('upload'));
            }
     
            $validated = $this->validate([
                'bukti' => 'uploaded[bukti]|mime_in[bukti,application/x-zip,application/zip,application/x-zip-compressed,application/x-rar,application/rar,application/x-rar-compressed]|max_size[bukti,4096]'
            ]);

            if ($validated == FALSE) {
                 
                $arr = array(
                    'success' => false,
                    'msg' => 'Upload bukti terlebih dahulu'
                );
                echo json_encode($arr);
                exit();
     
            } else {
     
                $avatar = $this->request->getFile('bukti');
                $avatar->move(ROOTPATH . 'public/bukti');
     
                $data['bukti'] = $avatar->getName();
         
                $res  = $model->tambah_data($data);

                if ($res) {
                    $arr = array(
                        'success' => true,
                        'msg' => 'berhasil disimpan'
                    );
                }else {
                    $arr = array(
                        'success' => false,
                        'msg' => 'gagal disimpan'
                    );
                }
            }
        }else {
            $id = $_POST['id'];
            $where = array(
                'id_pengajuan' => $id
            );
            $res  = $model->ubah_data($data, $where);
            if ($res) {
                $arr = array(
                    'success' => true,
                    'msg' => 'berhasil diubah'
                );
            }else {
                $arr = array(
                    'success' => false,
                    'msg' => 'gagal diubah'
                );
            }
        }
        echo json_encode($arr);
    }

    function hapus()
    {
        $id = $_POST['id'];
        $model = new T_pengajuan();
        $data = array(
            'id_pengajuan' => $id
        );
        $res  = $model->hapus_data($data);
        if ($res) {
            $arr = array(
                'success' => true,
                'msg' => 'berhasil'
            );
        }else {
            $arr = array(
                'success' => false,
                'msg' => 'gagal'
            );
        }
        echo json_encode($arr);
    }

    function teruskan()
    {
        $session = \Config\Services::session();
        
        $status = '';
        if(strtolower($session->get('nama_tingkat_adm')) == 'rt'){
            $status = 1;
        }else if(strtolower($session->get('nama_tingkat_adm')) == 'rw'){
            $status = 2;
        }else{
            $status = 3;
        }

        $model = new T_pengajuan();
        $data = array(
            'id_status' => $status,
        );
        $where = array(
            'id_pengajuan' => $_POST['id']
        );

        $res  = $model->teruskan($data, $where);
        if ($res) {
            $arr = array(
                'success' => true,
                'msg' => 'berhasil'
            );
        }else {
            $arr = array(
                'success' => false,
                'msg' => 'gagal'
            );
        }
        echo json_encode($arr);
    }
}

