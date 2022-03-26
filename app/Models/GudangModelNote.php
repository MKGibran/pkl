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
}
?>