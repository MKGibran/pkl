<?php 
namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table          = 'users';
    protected $allowedFields  = [
        'name',
        'email',
        'phone',
        'role',
        'password',
    ];
}
?>