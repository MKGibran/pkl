<?php

namespace App\Controllers\Finance;

use App\Controllers\BaseController;
use App\Models\OperasionalModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class OperasionalController extends BaseController
{
    public function __construct()
    {
        $this->OperasionalModel = new OperasionalModel();
    }
    public function index()
    {
        $operasional = $this->OperasionalModel->findAll();
        $data = [
            'title' => 'Sinergy Dashboard | Operasional',
            'operasional' => $operasional,
            'getUser' => $this->OperasionalModel->getUserManager()->getResult('array')
        ];
        return view('finance/operasional/index', $data);
    }
    public function verifikasi($id)
    {
        $data = $this->OperasionalModel->where('id', $id)->find();
        $data = [
            'status_fm' => 1
        ];
        $this->OperasionalModel->verifikasi($data);
        return redirect()->back();
    }

    public function exportExcel()
    {
        $url = $_SERVER["REQUEST_URI"];
        $url = substr($url, -10);
        $getUser =$this->OperasionalModel->getUserManager()->getResult('array');
        $spreadsheet = new Spreadsheet();
    // tulis header/nama kolom 
    $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Nama Pengaju')
                ->setCellValue('B1', 'Proyek')
                ->setCellValue('C1', 'Lokasi')
                ->setCellValue('D1', 'Tanggal')
                ->setCellValue('E1', 'Waktu Berangkat')
                ->setCellValue('F1', 'Waktu Pulang')
                ->setCellValue('G1', 'Transport')
                ->setCellValue('H1', 'Tol')
                ->setCellValue('I1', 'Parkir')
                ->setCellValue('J1', 'Makan')
                ->setCellValue('k1', 'Lainnya')
                ->setCellValue('L1', 'Keterangan');
    
    $column = 2;
    // tulis data mobil ke cell
    foreach($getUser as $data) {
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A' . $column, $data['name'])
                    ->setCellValue('B' . $column, $data['proyek'])
                    ->setCellValue('C' . $column, $data['lokasi'])
                    ->setCellValue('C' . $column, $data['created_at'])
                    ->setCellValue('E' . $column, $data['w_berangkat'])
                    ->setCellValue('F' . $column, $data['w_pulang'])
                    ->setCellValue('G' . $column, $data['transport'])
                    ->setCellValue('H' . $column, $data['tol'])
                    ->setCellValue('i' . $column, $data['parkir'])
                    ->setCellValue('j' . $column, $data['makan'])
                    ->setCellValue('K' . $column, $data['lainnya'])
                    ->setCellValue('L' . $column, $data['keterangan']);
        $column++;
    }
    // tulis dalam format .xlsx
    $writer = new Xlsx($spreadsheet);
    $fileName = 'Data Pengaju Operasional ('. $url .')';

    // Redirect hasil generate xlsx ke web client
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
    }
}
