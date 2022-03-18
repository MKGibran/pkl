<?php

namespace App\Controllers\Gudang;
use App\Models\GudangModel;
use App\Models\GudangModelAdmin;
use App\Models\GudangModelDetail;
use App\Models\GudangModelNote;
use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class BarangController extends BaseController
{
    protected $GudangModel;
    public function __construct()
    {
        $this->GudangModel = new GudangModel();
        $this->GudangModelAdmin = new GudangModelAdmin();
        $this->GudangModelDetail = new GudangModelDetail();
        $this->GudangModelNote = new GudangModelNote();
    }

    // Umum

    public function index()
    {
        $barang = $this->GudangModelAdmin->orderBy('update_at','DESC');
        $barang = $this->GudangModelAdmin->findAll();
        $data = ["title" => 'Sinergy | Gudang',
        "barang" => $barang
        ];
        return view('staff/gudang/data_gudang', $data);
    }

    public function barangRusak()
    {
        $barang = $this->GudangModelDetail->getJoinDataAll()->getResult('array');
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');
        $data = [
            "title" => 'Sinergy | Gudang',
            "barang" => $barang,
            "results" => '',
            "date" => $date
        ];
        return view('gudang/V_data_gudang', $data);
    }

    public function permintaanBarang()
    {
        $PermintaanBarang = $this->GudangModel->getJoinData()->getResult(('array'));
        $data = [
            "title" => 'Sinergy | Permintaan Barang',
            "PermintaanBarang" => $PermintaanBarang
        ];
        return view('gudang/inventaris',$data);
        
    }
    
    public function tambah()
    {
        $data = [
            'id_user' => $this->request->getPost('id_user'),
            'proyek' => $this->request->getPost('proyek'),
            'lokasi' => $this->request->getPost('lokasi'),
            'tanggal_pengajuan' => $this->request->getPost('tanggal_pengajuan'),
            'tanggal_pengembalian' => $this->request->getPost('tanggal_pengembalian'),
        ];

        $this->GudangModel->addData($data);
        return redirect()->to(base_url('gudang/BarangController/permintaanBarang'));
    }

    public function ubah($id)
    {
        $data = [
            "title" => 'Sinergy | Ubah Form Permintaan Barang',
            'permintaan' => $this->GudangModel->getPermintaan($id)
        ];
        echo view('gudang/V_ubahPermintaanBarang',$data);
    }

    public function update($id)
    {
        $data = [
            'id_user' => $this->request->getPost('id_user'),
            'id' => $this->request->getPost('id'),
            'proyek' => $this->request->getPost('proyek'),
            'lokasi' => $this->request->getPost('lokasi'),
            'tanggal_pengajuan' => $this->request->getPost('tanggal_pengajuan'),
            'tanggal_pengembalian' => $this->request->getPost('tanggal_pengembalian'),
        ];
        $this->GudangModel->ubahData($data);
        return redirect()->to(base_url('gudang/BarangController/permintaanBarang'));
    }

    public function hapus($id)
    {

        $this->GudangModel->delete($id);
        return redirect()->to(base_url('gudang/BarangController/permintaanBarang'));
    }

    // Detail Barang

    public function detail($id)
    {
        $barang = $this->GudangModelDetail->where('id_permintaan', $id)->findAll();
        $permintaan = $this->GudangModel->where('id', $id)->findAll();
        $nama_barang = $this->GudangModelAdmin->findColumn('nama_barang');
        $satuan = $this->GudangModelAdmin->distinct()->findColumn('satuan');
        $tipe = $this->GudangModelAdmin->distinct()->findColumn('tipe');
        $data = [
            "title" => 'Sinergy | Detail Permintaan Barang',
            "permintaan" => $permintaan,
            "idPermintaan" => $id,
            "barang" => $barang,
            "nama_barang" => $nama_barang,
            "satuans" => $satuan,
            "tipes" => $tipe
        ];
        echo view('gudang/V_detailPermintaan',$data);
    }

    public function tambahDetailBarang()
    {
        $data = [
            'id_permintaan' => $this->request->getPost('idPermintaan'),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'tipe' => $this->request->getPost('tipe'),
            'satuan' => $this->request->getPost('satuan'),
            'kuantitas' => $this->request->getPost('kuantitas'),
        ];
        $id = $data['id_permintaan'];
        $this->GudangModelDetail->addDataBarang($data);
        return redirect()->back();
    }

    public function ubahDetailBarang($id)
    {
        
        $nama_barang = $this->GudangModelAdmin->findColumn('nama_barang');
        $satuan = $this->GudangModelAdmin->distinct()->findColumn('satuan');
        $tipe = $this->GudangModelAdmin->distinct()->findColumn('tipe');
        $data = [
            "title" => 'Sinergy | Ubah Detail Permintaan Barang',
            "barang" => $this->GudangModelDetail->getBarang($id),
            "nama_barang" => $nama_barang,
            "satuans" => $satuan,
            "tipes" => $tipe
        ];
        echo view('gudang/V_ubahDetailBarang',$data);
    }

    public function updateDetailBarang()
    {
        $this->GudangModelDetail->save(
            [   'id' => $this->request->getPost('id'),
                'nama_barang' => $this->request->getPost('nama_barang'),
                'tipe' => $this->request->getPost('tipe'),
                'satuan' => $this->request->getPost('satuan'),
                'kuantitas' => $this->request->getPost('kuantitas')]);

        return redirect()->to(base_url('Manager/BarangController/permintaanBarang'));
    }

    public function hapusDetailBarang($id)
    {
        $this->GudangModelDetail->delete($id);
        return redirect()->to(base_url('gudang/BarangController/permintaanBarang'));
    }

    // staff Gudang

    public function kelolaInventaris()
    {
        $barang = $this->GudangModelAdmin->orderBy('update_at','DESC');
        $barang = $this->GudangModelAdmin->findAll();
        $data = [
            "title" => 'Sinergy | Kelola Inventaris',
            "barang" => $barang
        ];
        echo view('gudang/V_kelolaInventaris',$data);
    }

    public function tambahBarang()
    {
        $data = [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'tipe' => $this->request->getPost('tipe'),
            'satuan' => $this->request->getPost('satuan'),
            'kuantitas' => $this->request->getPost('kuantitas'),
        ];

        $this->GudangModelAdmin->addDataBarang($data);
        return redirect()->to(base_url('gudang/BarangController/kelolaInventaris'));
    }

    public function hapusBarang($id)
    {

        $this->GudangModelAdmin->delete($id);
        return redirect()->back();
    }

    public function ubahBarang($id)
    {
        $data = [
            "title" => 'Sinergy | Ubah Data Barang',
            "barang" => $this->GudangModelAdmin->getBarang($id)
        ];
        echo view('gudang/V_ubahDataBarang',$data);
    }

    public function updateBarang($id)
    {
        $data = [
            'id' => $this->request->getPost('id'),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'tipe' => $this->request->getPost('tipe'),
            'satuan' => $this->request->getPost('satuan'),
            'kuantitas' => $this->request->getPost('kuantitas'),
        ];
        $this->GudangModelAdmin->ubahDataBarang($data);
        return redirect()->back();
    }

    public function verifikasi($id)
    {
        $data = $this->GudangModel->where('id', $id)->find();
        $data = ['verified_gudang' => 1];
        $this->GudangModel->verifikasi($data);
        return redirect()->back();
    }

    public function addNote($id)
    {
        $query = $this->GudangModelAdmin->getJoinData($id)->getResult('array');
        $query2 = $this->GudangModelAdmin->getBarang($id);
        $data = [
            'title' => 'Sinergy | Catatan Barang',
            'barang' => $query,
            'barang2' => $query2
        ];
        return view('gudang/V_addNote', $data);
    }

    public function storeNote()
    {
        $data = [
            'id_barang' => $this->request->getPost('id_barang'),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'note' => $this->request->getPost('note'),
        ];
        
        $this->GudangModelNote->addNote($data);
        return redirect()->back();
    }

    public function deleteNote($id)
    {
        $this->GudangModelNote->delete($id);
        return redirect()->back();
    }

    public function searchData()
    {
        $search = $this->request->getPost('date');
        if ($search == "") {
            return redirect()->back();
        }

        $query = $this->GudangModelDetail->getJoinDataDate($search)->getResult('array');
        $data = [
            'title' => 'Sinergy | Data Barang Rusak',
            'results' => $query,
            'barang' => '',
            'date' => $search
        ];
        return view('gudang/V_data_gudang', $data);
    }

    public function excelHarianBarang()
    {
        $url = $_SERVER["REQUEST_URI"];
        $url = substr($url, -10);
        $barang = $this->GudangModelDetail->getJoinDataDate($url)->getResult('array');
        $spreadsheet = new Spreadsheet();
    // tulis header/nama kolom 
    $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Proyek')
                ->setCellValue('B1', 'Nama Barang')
                ->setCellValue('C1', 'Tipe')
                ->setCellValue('D1', 'Satuan')
                ->setCellValue('E1', 'Kuantitas')
                ->setCellValue('F1', 'Jumlah Barang Rusak');
    
    $column = 2;
    // tulis data mobil ke cell
    foreach($barang as $data) {
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A' . $column, $data['proyek'])
                    ->setCellValue('B' . $column, $data['nama_barang'])
                    ->setCellValue('C' . $column, $data['tipe'])
                    ->setCellValue('D' . $column, $data['satuan'])
                    ->setCellValue('E' . $column, $data['kuantitas'])
                    ->setCellValue('F' . $column, $data['jumlah_kerusakan']);
        $column++;
    }
    // tulis dalam format .xlsx
    $writer = new Xlsx($spreadsheet);
    $fileName = 'Data Barang Harian ('. $url .')';

    // Redirect hasil generate xlsx ke web client
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
    }

    public function excelBulananBarang()
    {
        $url = $_SERVER["REQUEST_URI"];
        $url = substr($url, -6);
        $url = substr($url, 0, 4);
        $barang = $this->GudangModelDetail->getJoinDataMonth($url)->getResult('array');
        $spreadsheet = new Spreadsheet();
    // tulis header/nama kolom 
    $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Proyek')
                ->setCellValue('B1', 'Nama Barang')
                ->setCellValue('C1', 'Tipe')
                ->setCellValue('D1', 'Satuan')
                ->setCellValue('E1', 'Kuantitas')
                ->setCellValue('F1', 'Jumlah Barang Rusak');
    
    $column = 2;
    // tulis data mobil ke cell
    foreach($barang as $data) {
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A' . $column, $data['proyek'])
                    ->setCellValue('B' . $column, $data['nama_barang'])
                    ->setCellValue('C' . $column, $data['tipe'])
                    ->setCellValue('D' . $column, $data['satuan'])
                    ->setCellValue('E' . $column, $data['kuantitas'])
                    ->setCellValue('F' . $column, $data['jumlah_kerusakan']);
        $column++;
    }
    // tulis dalam format .xlsx
    $writer = new Xlsx($spreadsheet);
    $fileName = 'Data Barang Harian ('. $url .')';

    // Redirect hasil generate xlsx ke web client
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
    }
}
?>