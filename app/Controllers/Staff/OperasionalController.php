<?php

namespace App\Controllers\Staff;

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
        $session = session()->get('id');
        $data = [
            'title' => 'Sinergy Dashboard | Operasional',
            'operasional' => $operasional,
            'getUser' => $this->OperasionalModel->getUser($session)->getResult('array') 
        ];
        return view('staff/operasional/index', $data);
    }

    public function store()
    {
        $data = [
            'proyek' => $this->request->getVar('proyek'),
            'lokasi' => $this->request->getVar('lokasi'),
            'created_at' => $this->request->getVar('created_at'),
            'w_berangkat' => $this->request->getVar('w_berangkat'),
            'w_pulang' => $this->request->getVar('w_pulang'),
            'transport' => $this->request->getVar('transport'),
            'tol' => $this->request->getVar('tol'),
            'parkir' => $this->request->getVar('parkir'),
            'makan' => $this->request->getVar('makan'),
            'lainnya' => $this->request->getVar('lainnya'),
            'keterangan' => $this->request->getVar('keterangan'),
            'user_id' => $this->request->getVar('user_id'),
        ];
        $this->OperasionalModel->insert($data);
        session()->setFlashdata("success", "Berhasil mengajukan permintaan operasional");
        return redirect()->back();
    }

    public function show($id)
    {
        $operasional = $this->OperasionalModel->where('id', $id)->find();
        $data = [
            'title' => 'Sinergy Dashboard | Detail Operasional',
            'show' => $operasional,
        ];
        return view('staff/operasional/show', $data);
    }
    
    public function edit($id)
    {
        $operasional = $this->OperasionalModel->where('id', $id)->find();
        $data = [
            'title' => 'Sinergy Dashboard | Edit Data',
            'operasional' => $operasional,
        ];
        return view('staff/operasional/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'id' => $this->request->getVar('id'),
            'proyek' => $this->request->getVar('proyek'),
            'lokasi' => $this->request->getVar('lokasi'),
            'created_at' => $this->request->getVar('created_at'),
            'w_berangkat' => $this->request->getVar('w_berangkat'),
            'w_pulang' => $this->request->getVar('w_pulang'),
            'transport' => $this->request->getVar('transport'),
            'tol' => $this->request->getVar('tol'),
            'parkir' => $this->request->getVar('parkir'),
            'makan' => $this->request->getVar('makan'),
            'lainnya' => $this->request->getVar('lainnya'),
            'keterangan' => $this->request->getVar('keterangan'),
        ];
        $this->OperasionalModel->save($data);
        return redirect()->to(site_url('staff/OperasionalController'));
    }

    public function delete($id)
    {
        $this->OperasionalModel->delete($id);
        return redirect()->to(site_url('staff/OperasionalController'));
    }

    public function reportOperasional()
    {
        $data = [
            'transport' => $this->request->getVar('transport'),
            'tol' => $this->request->getVar('tol'),
            'parkir' => $this->request->getVar('parkir'),
            'makan' => $this->request->getVar('makan'),
            'lainnya' => $this->request->getVar('lainnya'),
            'keterangan' => $this->request->getVar('keterangan'),
        ];
        $this->ReportOperasional->insert($data);
        session()->setFlashdata("success", "Berhasil memberikan laporan operasional");
        return redirect()->back();
    }

}

