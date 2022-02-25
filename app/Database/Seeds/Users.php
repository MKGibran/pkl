<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'Kahlil Gibran',
            'email' => 'mkgibran@gmail.com',
            'phone' => 999999,
            'role' => 'gudang',
            'password' => password_hash('123123123', PASSWORD_DEFAULT),
        ];
        $this->db->table('users')->insert($data); 
    }
}
