<?php

namespace App\Controllers\Gudang;
use App\Models\GudangModel;
use App\Controllers\BaseController;

class GudangController extends BaseController
{
    public function __construct()
    {
        $this->GudangModel = new GudangModel();
        if (session()->get('role') != 'gudang')
        {
            echo 'access denied';
            exit;
        }
    }

    public function index()
    {
        $permintaans = $this->GudangModel->getJoinDataStaffDashboard()->getResult('array');
        $data = [
            'title' => 'Sinergy Dashboard | Gudang',
            'permintaans' => $permintaans
        ];
        return view('gudang/dashboard/index', $data);
    }

    
}
