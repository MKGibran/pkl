<?php

namespace App\Controllers\Manager;
use App\Models\GudangModel;
use App\Models\OperasionalModel;
use App\Controllers\BaseController;

class ManagerController extends BaseController
{
    public function __construct()
    {
        $this->GudangModel = new GudangModel();
        $this->OperasionalModel = new OperasionalModel();
        if (session()->get('role') != 'manager') 
        {
            echo 'access denied';
            exit;
        }
    }
    public function index()
    {
        $permintaans = $this->GudangModel->getJoinDataManagerDashboard()->getResult('array');
        $pengajuans = $this->OperasionalModel->getUserManagerDashboard()->getResult('array');
        $data = [
            'title' => 'Sinergy Dashboard | Manager',
            'permintaans' => $permintaans,
            'pengajuans' => $pengajuans
        ];
        return view('manager/index', $data);
    }
}
