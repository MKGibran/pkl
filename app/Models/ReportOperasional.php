<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportOperasional extends Model
{
    protected $table            = 'report_operasional';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'transport', 'tol', 'parkir', 'makan', 'lainnya', 'keterangan'
    ];
}
