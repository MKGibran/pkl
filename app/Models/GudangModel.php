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
        'note',
        'id_user'
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

    public function getJoinData()
    {
        $query =  $this->db->table('users')
         ->select('*')
         ->join('permintaanbarang', 'permintaanbarang.id_user = users.id', 'right')
         ->orderBy('updated_at','DESC')
         ->get();
        return $query;
    }

    public function getJoinDataManagerDashboard()
    {
        $query =  $this->db->table('users')
         ->select('*')
         ->join('permintaanbarang', 'permintaanbarang.id_user = users.id', 'right')
         ->where('verified_gm', 0)
         ->orderBy('updated_at','DESC')
         ->get();
        return $query;
    }

    public function getJoinDataStaffDashboard()
    {
        $query =  $this->db->table('users')
         ->select('*')
         ->join('permintaanbarang', 'permintaanbarang.id_user = users.id', 'right')
         ->where('verified_gudang', 0)
         ->orderBy('updated_at','DESC')
         ->get();
        return $query;
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