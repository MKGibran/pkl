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
            'user' => $user,
            'errors' => []
        ];
        echo view('profile/profile', $data);
    }

    public function editData()
    {   
        $session = session()->get('id');
        $user = $this->UserModel->where('id', $session);
        $user = $this->UserModel->findAll();
        $img = $this->request->getFile('photo');
        $imgName = $img->getName();

        // cek apakah ada gambar yang diupload
        // jika tidak ada gambar yang diupload
        if ($imgName = $img->getName() == NULL) {
            // jika password sama
            if ($this->request->getPost('password') === $user[0]['password']) {
                $data = [
                    'id' => $this->request->getPost('id'),
                    'name' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                    'phone' => $this->request->getPost('phone'),
                    'role' => $user[0]['role'],
                    'password' => $user[0]['password'],
                    'photo' => $user[0]['photo']
                ];
                $this->UserModel->replace($data);
                return redirect()->back();
            } 
            // jika password tidak sama dan input password tidak kosong
            elseif ($this->request->getPost('password') != $user[0]['password'] && $this->request->getPost('password') != NULL) {

                $data = [
                    'id' => $this->request->getPost('id'),
                    'name' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                    'phone' => $this->request->getPost('phone'),
                    'role' => $user[0]['role'],
                    'photo' => $user[0]['photo'],
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                ];
                $this->UserModel->replace($data);
                return redirect()->back();
            }
            // jika password kosong
            elseif ($this->request->getPost('password') == NULL) {
                $data = [
                    'id' => $this->request->getPost('id'),
                    'name' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                    'phone' => $this->request->getPost('phone'),
                    'role' => $user[0]['role'],
                    'password' => $user[0]['password'],
                    'photo' => $user[0]['photo']
                ];
                $this->UserModel->replace($data);
                return redirect()->back();
            }
        } 
        // jika ada gambar yang diupload
        elseif ($imgName = $img->getName() != NULL) {
            $imgName = $img->getRandomName();
            $extension = substr($imgName, -5);
            $extension = explode('.',$extension);
            $extension = $extension[1];

            // jika ekstensi file tidak sesuai
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect()->back();
            }
            // jika ekstensi file sesuai
            else {
                $img -> move('img/', $imgName);
                if ($this->request->getPost('password') === $user[0]['password']) {
                    $data = [
                        'id' => $this->request->getPost('id'),
                        'name' => $this->request->getPost('name'),
                        'email' => $this->request->getPost('email'),
                        'phone' => $this->request->getPost('phone'),
                        'role' => $user[0]['role'],
                        'password' => $user[0]['password'],
                        'photo' => $imgName
                    ];
                    $this->UserModel->replace($data);
                    return redirect()->back();
                } elseif ($this->request->getPost('password') != $user[0]['password'] && $this->request->getPost('password') != NULL) {
                    $data = [
                        'id' => $this->request->getPost('id'),
                        'name' => $this->request->getPost('name'),
                        'email' => $this->request->getPost('email'),
                        'phone' => $this->request->getPost('phone'),
                        'role' => $user[0]['role'],
                        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                        'photo' => $imgName
                    ];
                    $this->UserModel->replace($data);
                    return redirect()->back();
                }
                elseif ($this->request->getPost('password') == NULL) {
                    $data = [
                        'id' => $this->request->getPost('id'),
                        'name' => $this->request->getPost('name'),
                        'email' => $this->request->getPost('email'),
                        'phone' => $this->request->getPost('phone'),
                        'password' => $user[0]['password'],
                        'role' => $user[0]['role'],
                        'photo' => $imgName
                    ];
                    $this->UserModel->replace($data);
                    return redirect()->back();
                }
            }
        }
    }
}
?>