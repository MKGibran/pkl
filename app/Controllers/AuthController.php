<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function index()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]|validateStaff[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateStaff' => "Email atau Password salah!",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('login', [
                    "validation" => $this->validator,
                ]);
            } else {
                $model = new UserModel();

                $staff = $model->where('email', $this->request->getVar('email'))
                    ->first();

                // Stroing session values
                $this->setStaffSession($staff);

                // Redirecting to dashboard after login
                if($staff['role'] == "staff"){

                    return redirect()->to(base_url('staff'));

                }elseif($staff['role'] == "manager"){

                    return redirect()->to(base_url('manager'));
                }elseif($staff['role'] == "finance"){

                    return redirect()->to(base_url('finance'));
                }elseif($staff['role'] == "gudang"){

                    return redirect()->to(base_url('gudang'));
                }
                elseif($staff['role'] == "admin"){

                    return redirect()->to(base_url('admin'));
                }
            }
        }

        return view('login');
    }

    private function setStaffSession($staff)
    {
        $data = [
            'id' => $staff['id'],
            'name' => $staff['name'],
            'phone' => $staff['phone'],
            'email' => $staff['email'],
            'isLoggedIn' => true,
            "role" => $staff['role'],
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
