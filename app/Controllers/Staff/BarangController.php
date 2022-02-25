<?php

namespace App\Controllers\Staff;
use App\Models\GudangModel;
use App\Models\GudangModelAdmin;
use App\Models\GudangModelNote;
use App\Models\GudangModelDetail;
use App\Controllers\BaseController;

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

    public function permintaanBarang()
    {
        $PermintaanBarang = $this->GudangModel->orderBy('created_at','DESC');
        $PermintaanBarang = $this->GudangModel->findAll();
        $data = [
            "title" => 'Sinergy | Permintaan Barang',
            "PermintaanBarang" => $PermintaanBarang
        ];
        return view('staff/gudang/permintaan_barang',$data);
        
    }
    
    public function tambah()
    {
        $data = [
            'proyek' => $this->request->getPost('proyek'),
            'lokasi' => $this->request->getPost('lokasi'),
            'tanggal_pengajuan' => $this->request->getPost('tanggal_pengajuan'),
            'tanggal_pengembalian' => $this->request->getPost('tanggal_pengembalian'),
        ];

        $this->GudangModel->addData($data);
        return redirect()->to(base_url('Staff/BarangController/permintaanBarang'));
    }

    public function ubah($id)
    {
        $data = [
            "title" => 'Sinergy | Ubah Form Permintaan Barang',
            'permintaan' => $this->GudangModel->getPermintaan($id)
        ];
        echo view('staff/gudang/V_ubahPermintaanBarang',$data);
    }

    public function update($id)
    {
        $data = [
            'id' => $this->request->getPost('id'),
            'proyek' => $this->request->getPost('proyek'),
            'lokasi' => $this->request->getPost('lokasi'),
            'tanggal_pengajuan' => $this->request->getPost('tanggal_pengajuan'),
            'tanggal_pengembalian' => $this->request->getPost('tanggal_pengembalian'),
        ];
        $this->GudangModel->ubahData($data);
        return redirect()->to(base_url('Staff/BarangController/permintaanBarang'));
    }

    public function hapus($id)
    {

        $this->GudangModel->delete($id);
        return redirect()->to(base_url('Staff/BarangController/permintaanBarang'));
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
        echo view('staff/gudang/V_detailPermintaan',$data);
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
        echo view('staff/gudang/V_ubahDetailBarang',$data);
    }

    public function updateDetailBarang()
    {
        $this->GudangModelDetail->save(
            [   'id' => $this->request->getPost('id'),
                'nama_barang' => $this->request->getPost('nama_barang'),
                'tipe' => $this->request->getPost('tipe'),
                'satuan' => $this->request->getPost('satuan'),
                'kuantitas' => $this->request->getPost('kuantitas')]);

        return redirect()->to(base_url('Staff/BarangController/permintaanBarang'));
    }

    public function hapusDetailBarang($id)
    {
        $this->GudangModelDetail->delete($id);
        return redirect()->to(base_url('Staff/BarangController/permintaanBarang'));
    }

    public function pengembalian($id)
    {
        $id = $this->GudangModel->where('id', $id)->find();
        $data = [
            'id' => $id[0]['id'],
            'proyek' => $id[0]['proyek'],
            'lokasi' => $id[0]['lokasi'],
            'tanggal_pengajuan' => $id[0]['tanggal_pengajuan'],
            'tanggal_pengembalian' => $id[0]['tanggal_pengembalian'],
            'verified_gudang' => $id[0]['verified_gudang'],
            'verified_gm' => $id[0]['verified_gm'],
            'note' => $id[0]['note'],
            'status_pengembalian' => 1,
        ];
        $this->GudangModel->replace($data);
        return redirect()->back();
    }

    // Note
    public function note($id)
    {
        $data = [
            "title" => 'Sinergy | Catatan Pengembalian Barang',
            "barang" => $this->GudangModel->getPermintaan($id)
        ];
        echo view('staff/gudang/V_note',$data);
    }

    public function addNote()
    {
        $id = $this->request->getPost('id');
        $result = $this->GudangModel->where('id', $id)->find();
        $data = [
            'note' => $this->request->getPost('note'),
            'id' => $result[0]['id'],
            'proyek' => $result[0]['proyek'],
            'lokasi' => $result[0]['lokasi'],
            'tanggal_pengajuan' => $result[0]['tanggal_pengajuan'],
            'tanggal_pengembalian' => $result[0]['tanggal_pengembalian'],
            'verified_gudang' => $result[0]['verified_gudang'],
            'verified_gm' => $result[0]['verified_gm'],
            'status_pengembalian' => $result[0]['status_pengembalian'],
        ];
        $this->GudangModel->replace($data);
        return redirect()->to(base_url('Staff/BarangController/permintaanBarang'));
    }

    public function seeNote($id)
    {

        $query = $this->GudangModelNote->where('id', $id);
        $query = $this->GudangModelNote->orderBy('created_at', 'DESC')->find();

        $data = [
            'title' => 'Sinergy | Catatan Barang',
            'note' => $query
        ];
        
        return view('staff/gudang/V_noteBarang.php', $data);
    }
}
?>