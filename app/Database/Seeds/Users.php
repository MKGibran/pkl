<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $data = [
            'id' => 1,
            'name' => 'Arsyandi Pratama',
            'email' => 'arsyandi.develop@gmail.com',
            'phone' => 123123123,
            'role' => 'staff',
            'password' => password_hash('123123123', PASSWORD_DEFAULT),
        ];
        $this->db->table('users')->insert($data); 
    }
}
