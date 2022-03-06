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
        ];
        return view('manager/operasional/index', $data);
    }
    public function verifikasi($id)
    {
        $data = $this->OperasionalModel->where('id', $id)->find();
        $data = ['status_gm' => 1];
        $this->OperasionalModel->verifikasi($data);
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
