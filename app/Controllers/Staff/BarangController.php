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
        $session = session()->get('id');
        $PermintaanBarang = $this->GudangModel->orderBy('created_at','DESC');
        $PermintaanBarang = $this->GudangModel->Where('id_user', $session);
        $PermintaanBarang = $this->GudangModel->findAll();
        $data = [
            "title" => 'Sinergy | Permintaan Barang',
            "PermintaanBarang" => $PermintaanBarang,
            "id_user" => $session
        ];
        return view('staff/gudang/permintaan_barang',$data);
        
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
        return redirect()->to(base_url('Staff/BarangController/permintaanBarang'));
    }

    public function ubah($id)
    {
        $session = session()->get('id');
        $data = [
            "id_user" => $session,
            "title" => 'Sinergy | Ubah Form Permintaan Barang',
            'permintaan' => $this->GudangModel->getPermintaan($id)
        ];
        echo view('staff/gudang/V_ubahPermintaanBarang',$data);
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
        $query = $this->GudangModelDetail->getJoinData($id)->getResult('array');
        $data = [
            'title' => "Sinergy | Pengembalian",
            'results' => $query,
        ];
        return view('staff/gudang/v_pengembalian', $data);
    }

    public function updatePengembalian()
    {
        $id_permintaan = $this->request->getPost('id_permintaan'); 
        $barang = $this->request->getPost('nama_barang');
        if ($this->request->getPost('jumlah') == NULL) {
            $jumlah_kerusakan = 0;
        } else {
            $jumlah_kerusakan = $this->request->getPost('jumlah');
        }
        
        if ($jumlah_kerusakan > $this->request->getPost('kuantitas')) {
            echo "<script>";
            echo " alert('Jumlah kerusakan barang ". $barang ." tidak sesuai !');      
                    window.location.href='".site_url('staff/BarangController/pengembalian/')."".$id_permintaan ."';
                </script>";
        } else {
            $data = $this->GudangModelDetail->where('id', $this->request->getPost('id'))->find();
            // $note = $this->GudangModel->getPermintaan($id);
            $data = [
                'id' => $this->request->getPost('id'),
                'id_permintaan' => $id_permintaan,
                'nama_barang' => $barang,
                'tipe' => $this->request->getPost('tipe'),
                'satuan' => $this->request->getPost('satuan'),
                'kuantitas' => $this->request->getPost('kuantitas'),
                'jumlah_kerusakan' => $jumlah_kerusakan];
            $this->GudangModelDetail->replace($data);

            return redirect()->back();
        }
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
            'status_pengembalian' => 1,
            'id' => $result[0]['id'],
            'proyek' => $result[0]['proyek'],
            'lokasi' => $result[0]['lokasi'],
            'tanggal_pengajuan' => $result[0]['tanggal_pengajuan'],
            'tanggal_pengembalian' => $result[0]['tanggal_pengembalian'],
            'verified_gudang' => $result[0]['verified_gudang'],
            'verified_gm' => $result[0]['verified_gm'],
        ];
        $this->GudangModel->save($data);
        return redirect()->to(base_url('Staff/BarangController/permintaanBarang'));
    }

    public function seeNote($id)
    {
        $query = $this->GudangModelAdmin->getJoinData($id)->getResult('array');
        $data = [
            'title' => 'Sinergy | Catatan Barang',
            'notes' => $query,
        ];

        return view('staff/gudang/V_noteBarang.php', $data);
    }
}
?>