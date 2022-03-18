<?php

namespace App\Controllers\Admin;
use App\Models\AdminModel;
use App\Models\GudangModelAdmin;
use App\Controllers\BaseController;

class AdminController extends BaseController
{
    protected $AdminModel;
    public function __construct()
    {
        $this->GudangModelAdmin = new GudangModelAdmin();
        $this->AdminModel = new AdminModel();
        if (session()->get('role') != 'admin')
        {
            echo 'access denied';
            exit;
        }
    }
    public function index()
    {
        $users = $this->AdminModel->findAll();
        $data = [
            'title' => 'Sinergy Dashboard | Admin',
            'users' => $users
        ];
        return view('admin/index', $data);
    }

    public function pengguna()
    {
        $users = $this->AdminModel->findAll();
        $data = [
            'title' => 'Sinergy | Pengguna',
            'users' => $users
        ];
        return view('admin/V_pengguna', $data);
    }

    public function addUser()
    {
        $data = [
            'name' => $this->request->getPost('Nama'),
            'email' => $this->request->getPost('Email'),
            'phone' => $this->request->getPost('Nohp'),
            'role' => $this->request->getPost('Role'),
            'password' => password_hash($this->request->getPost('Password'), PASSWORD_DEFAULT)
        ];
        $this->AdminModel->save($data);
        return redirect()->back();
    }

    public function deleteUser($id)
    {
        $this->AdminModel->delete($id);
        return redirect()->back();
    }

    public function gudang()
    {
        $barang = $this->GudangModelAdmin->orderBy('update_at','DESC');
        $barang = $this->GudangModelAdmin->findAll();
        $data = ["title" => 'Sinergy | Gudang',
        "barang" => $barang
        ];
        return view('staff/gudang/data_gudang', $data);
    }

    public function registration()
    {

    }
}