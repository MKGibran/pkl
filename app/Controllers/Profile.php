<?php 

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;

Class Profile extends BaseController{

    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $session = session()->get('id');
        $user = $this->UserModel->where('id', $session);
        $user = $this->UserModel->findAll();
        $data = [
            "title" => 'Sinergy | Profile',
            'user' => $user
        ];
        echo view('profile/profile', $data);
    }

    public function editData()
    {
        $data = [
            'id' => $this->request->getPost('id'),
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];
        
        $this->UserModel->replace($data);
        return redirect()->back();
    }
}
?>