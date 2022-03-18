<?php

namespace App\Controllers\Staff;
use App\Models\GudangModel;
use App\Models\OperasionalModel;
use App\Controllers\BaseController;

class StaffController extends BaseController
{
    public function __construct()
    {
        $this->GudangModel = new GudangModel();
        $this->OperasionalModel = new OperasionalModel();
        if (session()->get('role') != 'staff')
        {
            echo 'access denied';
            exit;
        }
    }

    public function index()
    {
        $permintaans = $this->GudangModel->getJoinDataStaffDashboard()->getResult('array');
        $pengajuans = $this->OperasionalModel->getUserStaffDashboard()->getResult('array');
        $data = [
            'title' => 'Sinergy Dashboard | Staff',
            'permintaans' => $permintaans,
            'pengajuans' => $pengajuans
        ];
        return view('staff/dashboard', $data);
    }
}
