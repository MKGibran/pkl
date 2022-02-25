<?php

namespace App\Controllers\Gudang;

use App\Controllers\BaseController;

class GudangController extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') != 'gudang')
        {
            echo 'access denied';
            exit;
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Sinergy Dashboard | Gudang'
        ];
        return view('finance/index', $data);
    }

    
}
