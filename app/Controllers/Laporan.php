<?php 
namespace App\Controllers;
use App\Models\M_laporan;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Laporan extends BaseController
{
	public function index()
	{
        $data = array(
            'header' => 'main-inc/admin/header',
            'konten' => 'inc/admin/laporan',
            'footer' => 'main-inc/admin/footer',
        );
        echo view('template',$data);
	}

    public function cetak_daftar_penerima()
    {
        $model = new M_laporan();

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ];

        $data = $model->get_daftar_penerima_blt();
        $excel = IOFactory::load('././template/penerima-berdasarkan-kk.xlsx');
        
        $numrow = 8;
        foreach($data as $key => $val) {
            $excel->setActiveSheetIndex(0)
                        ->setCellValue('A' . $numrow, ($key+1))
                        ->setCellValue('B' . $numrow, $val->no_kk)
                        ->setCellValue('C' . $numrow, $val->nama_kepala_keluarga)
                        ->setCellValue('D' . $numrow, number_format($val->nominal, null, '', '.'))
                        ->setCellValue('E' . $numrow, date('d F Y', strtotime($val->tanggal_pengajuan)));

            $excel->setActiveSheetIndex(0)->getStyle('B' . $numrow)->getNumberFormat()->setFormatCode('###');
            $excel->setActiveSheetIndex(0)->getStyle('D'.$numrow)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
            $excel->setActiveSheetIndex(0)->getStyle('A'.$numrow.':E'.$numrow)->applyFromArray($styleArray);
            $numrow++;
        }
        $writer = new Xlsx($excel);
        $fileName = 'Daftar Penerima Bantuan Langsung Tunai';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function cetak_calon_penerima()
    {
        $model = new M_laporan();

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ];

        $data = $model->get_calon_penerima_blt();
        $excel = IOFactory::load('././template/penerima-berdasarkan-ktp.xlsx');
        
        $numrow = 7;
        foreach($data as $key => $val) {
            $excel->setActiveSheetIndex(0)
                        ->setCellValue('A' . $numrow, ($key+1))
                        ->setCellValue('B' . $numrow, $val->nama_penduduk)
                        ->setCellValue('C' . $numrow, $val->no_kk)
                        ->setCellValue('D' . $numrow, $val->no_ktp)
                        ->setCellValue('E' . $numrow, $val->kel.', RT '.$val->rt.' RW '.$val->rw);

            $excel->setActiveSheetIndex(0)->getStyle('C' . $numrow)->getNumberFormat()->setFormatCode('###');
            $excel->setActiveSheetIndex(0)->getStyle('D' . $numrow)->getNumberFormat()->setFormatCode('###');
            $excel->setActiveSheetIndex(0)->getStyle('A'.$numrow.':E'.$numrow)->applyFromArray($styleArray);
            $numrow++;
        }
        $writer = new Xlsx($excel);
        $fileName = 'Calon Penerima Bantuan Langsung Tunai';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function cetak_penduduk()
    {
        $model = new M_laporan();
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ];

        $data = $model->get_total_penduduk();
        $excel = IOFactory::load('././template/total-penduduk.xlsx');
        
        $numrow = 8;
        foreach($data as $key => $val) {
            $excel->setActiveSheetIndex(0)
                        ->setCellValue('A' . $numrow, $val->rw)
                        ->setCellValue('B' . $numrow, $val->jumlah_kk)
                        ->setCellValue('C' . $numrow, $val->jumlah_jiwa)
                        ->setCellValue('D' . $numrow, $val->jumlah_l)
                        ->setCellValue('E' . $numrow, $val->jumlah_p)
                        ->setCellValue('F' . $numrow, $val->jumlah_muda)
                        ->setCellValue('E' . $numrow, $val->jumlah_tua);

            $excel->setActiveSheetIndex(0)->getStyle('A'.$numrow.':G'.$numrow)->applyFromArray($styleArray);
            $numrow++;
        }
        $writer = new Xlsx($excel);
        $fileName = 'Total Penduduk per RW';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}

