<?php 
namespace App\Models;

use CodeIgniter\Model;

class GudangModel extends Model
{
    protected $table          = 'permintaanbarang';
    protected $allowedFields  = [
        'proyek',
        'lokasi',
        'tanggal_pengajuan',
        'tanggal_pengembalian',
        'status_pengembalian',
    ];
    protected $useTimestamps      = true;

    public function addData($data)
    {
        return $this->db->table('permintaanbarang')->insert($data);
    }

    public function getPermintaan($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function ubahData($data)
    {
        return $this->db->table('permintaanbarang')->replace($data);
    }

    public function verifikasi($data)
    {
        return $this->db->table('permintaanbarang')->update($data);
    }

    public function pengembalian($data)
    {
        return $this->db->table('permintaanbarang')->update($data);
    }
}
?>