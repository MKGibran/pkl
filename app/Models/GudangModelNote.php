<?php 
namespace App\Models;

use CodeIgniter\Model;

class GudangModelNote extends Model
{
    protected $table          = 'note';
    protected $allowedFields  = [
        'note',
        'nama_barang',
        'id_barang'
    ];
    protected $useTimestamps      = true;

    public function addNote($data)
    {
        return $this->db->table('Note')->insert($data);
    }

    public function getNote($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function editNote($data)
    {
        return $this->db->table('note')->replace($data);
    }

    public function getJoinData($id)
    {
        $query =  $this->db->table('note')
         ->select('*')
         ->join('barang', 'barang.id = note.id_barang', 'right')
         ->where('note.id_barang', $id)
         ->get();
        return $query;
    }
}
?>