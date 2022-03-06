<?php

namespace App\Models;

use CodeIgniter\Model;

class OperasionalModel extends Model
{
    protected $table            = 'operasionals';
    protected $allowedFields    = [
        'proyek', 'lokasi', 'w_berangkat', 'w_pulang', 'transport', 'tol', 'parkir', 'makan', 'lainnya', 'keterangan', 'status_gm', 'status_fm', 'user_id'
    ];
    protected $useTimestamps = true;

    public function verifikasi($data)
    {
        return $this->db->table('operasionals')->update($data);
    }

    public function getUser($session)
    {
        $query =  $this->db->table('operasionals')
         ->select('*')
         ->join('users', 'operasionals.user_id = users.id')
         ->where('users.id', $session)
         ->get();
        return $query;
    }

    public function getUserManager()
    {
        $query =  $this->db->table('operasionals')
         ->select('*')
         ->join('users', 'operasionals.user_id = users.id')
         ->get();
        return $query;
    }

    public function getUserManagerDashboard()
    {
        $query =  $this->db->table('operasionals')
         ->select('*')
         ->join('users', 'operasionals.user_id = users.id')
         ->where('status_gm', 0)
         ->get();
        return $query;
    }

    public function getUserFinanceDashboard()
    {
        $query =  $this->db->table('operasionals')
         ->select('*')
         ->join('users', 'operasionals.user_id = users.id')
         ->where('status_fm', 0)
         ->get();
        return $query;
    }

    public function getUserStaffDashboard()
    {
        $query =  $this->db->table('operasionals')
         ->select('*')
         ->join('users', 'operasionals.user_id = users.id')
         ->where('status_gm', 0)
         ->get();
        return $query;
    }
}
