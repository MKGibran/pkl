<?php

namespace App\Controllers\Manager;
use App\Models\GudangModel;
use App\Models\GudangModelAdmin;
use App\Models\GudangModelDetail;
use App\Controllers\BaseController;

class BarangController extends BaseController
{
    protected $GudangModel;
    public function __construct()
    {
        $this->GudangModel = new GudangModel();
        $this->GudangModelAdmin = new GudangModelAdmin();
        $this->GudangModelDetail = new GudangModelDetail();
    }

    // Umum

    public function index()
    {
        $barang = $this->GudangModelAdmin->orderBy('update_at','DESC');
        $barang = $this->GudangModelAdmin->findAll();
        $data = ["title" => 'Sinergy | Gudang',
        "barang" => $barang
        ];
        return view('gudang/data_gudang', $data);
    }
}