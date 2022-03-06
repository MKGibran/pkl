<?= $this->extend('template/header') ?>

<?= $this->section('content') ?>

<?= $this->include('template/navbar') ?>

<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <!-- data -->
                            <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|} mb-2">
                                <?php if (session()->get('role') == 'gudang') : ?>
                                    <div class="col">
                                        <div class="d-block float-right">
                                            <a class="btn btn-outline-danger btn-sm float-end" href="<?= base_url('gudang/BarangController/barangRusak'); ?>" role="button">Data Barang Rusak</a>
                                        </div>
                                    </div>
                                <?php endif ?>
                            </div>
                            <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                                <?php foreach ($barang as $brg) : ?>
                                <div class="col-lg-3">
                                    <div class="card text-dark bg-white mb-3" style="max-width: auto; overflow-x:auto">
                                        <div class="card-header bg-success"></div>
                                        <div class="card-body p-3">
                                            <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                                                <div class="col-9">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="align-baseline font-weight-bold">
                                                                    <h1><?= $brg['kuantitas']; ?></h1>
                                                                </td>
                                                                <td class="align-text-bottom"><?= $brg['satuan']; ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <p><?= $brg['nama_barang']; ?> | <?= $brg['tipe']; ?></p>
                                                </div>
                                                <div class="col">
                                                    <div class="d-block mr-1 mt-1 float-right">
                                                        <a href="<?= base_url('Staff/BarangController/seeNote'); ?>/<?= $brg['id']; ?>" class="float-end text-end text-secondary" style="font-size: 1.5rem;"><i class="bi bi-info-circle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <!-- end content of data -->
                        </div>
                        <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                            <div class="col mt-0">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>