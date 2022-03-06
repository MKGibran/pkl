<?php

namespace App\Controllers\Finance;
use App\Models\OperasionalModel;
use App\Controllers\BaseController;

class FinanceController extends BaseController
{
    public function __construct()
    {
        $this->OperasionalModel = new OperasionalModel();
        if (session()->get('role') != 'finance')
        {
            echo 'access denide';
            exit;
        }
    }
    public function index()
    {
        $pengajuans = $this->OperasionalModel->getUserFinanceDashboard()->getResult('array');
        $data = [
            'title' => 'Sinergy Dashboard | Finance',
            'pengajuans' => $pengajuans
        ];
        return view('finance/index', $data);
    }
}
