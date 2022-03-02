<?php 
namespace App\Models;

use CodeIgniter\Model;

class GudangModelDetail extends Model
{
    protected $table          = 'detailPermintaan';
    protected $allowedFields  = [
        'nama_barang',
        'satuan',
        'tipe',
        'kuantitas',
        'id_permintaan',
        'jumlah_kerusakan'
    ];
    protected $useTimestamps      = true;

    public function addDataBarang($data)
    {
        return $this->db->table('detailPermintaan')->insert($data);
    }

    public function getBarang($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function ubahDataBarang($data)
    {
        return $this->db->table('detailPermintaan')->update($data);
    }

    public function getJoinData($id)
    {
        $query =  $this->db->table('permintaanbarang')
         ->select('detailpermintaan.id, nama_barang, tipe, satuan, kuantitas, id_permintaan, proyek, jumlah_kerusakan')
         ->join('detailpermintaan', 'permintaanbarang.id = detailpermintaan.id_permintaan', 'left')
         ->where('detailpermintaan.id_permintaan', $id)
         ->get();
        return $query;
    }

    public function updatePengembalian($data)
    {
        $this->db->table('detailpermintaan')->update($data);
    }
}
?>