<?php

namespace App\Controllers\Manager;

use App\Controllers\BaseController;
use App\Models\OperasionalModel;
use App\Models\ReportOperasional;

class OperasionalController extends BaseController
{
    public function __construct()
    {
        $this->OperasionalModel = new OperasionalModel();
        $this->ReportOperasional = new ReportOperasional();
    }
    public function index()
    {
        $operasional = $this->OperasionalModel->findAll();
        $data = [
            'title' => 'Sinergy Dashboard | Verifikasi Operaisonal',
            'operasional' => $operasional,
            'getUser' => $this->OperasionalModel->getUserManager()->getResult('array') 
        ];
        return view('manager/operasional/index', $data);
    }
    public function verifikasi($id)
    {
        $this->OperasionalModel->where('user_id', $id)->set(['status_gm' => 1])->update();
        return redirect()->back();
    }

    public function showReportOperasional()
    {
        $showReport = $this->ReportOperasional->findAll();
        $data = [
            'title' => 'Sinergy Dashboard | Report Operasional',
            'report' => $showReport,
        ];
        return view('manager/operasional/report_operasional');
    }
}
