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
                                <div class="col">
                                    <div class="d-block float-left">
                                        <h4 class="card-title">Data Barang Rusak</h4>
                                        <form action="<?= base_url('gudang/BarangController/searchData') ?>" method="post">
                                            <div class="input-group mb-3 input-group-sm">
                                                <input type="date" class="form-control" name="date" aria-label="Tanggal"
                                                    aria-describedby="button-addon2">
                                                <button class="btn btn-outline-primary btn-sm ml-2" type="submit"
                                                    id="button-addon2"><i class="bi bi-search" style="font-size: 1rem;"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="d-block float-right">
                                        <a class="dropdown-toggle show-dropdown-arrow btn btn-inverse-primary btn-sm"
                                            id="nreportDropdown" href="#" data-toggle="dropdown"><i class="mdi mdi-file-excel mr-2"></i></i>
                                            Reports
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                            aria-labelledby="nreportDropdown">
                                            <a href="<?= base_url('gudang/BarangController/excelHarianBarang') ?>/?date=<?= $date; ?>" class="dropdown-item">
                                                - Harian
                                            </a>
                                            <a href="<?= base_url('gudang/BarangController/excelBulananBarang') ?>/?date=<?= $date; ?>" class="dropdown-item">
                                                - Bulanan
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Proyek</th>
                                                <th>Nama Barang</th>
                                                <th>Tipe</th>
                                                <th>Satuan</th>
                                                <th>Kuantitas</th>
                                                <th>Jumlah Barang Rusak</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($results == NULL): ?>
                                                <?php if ($barang == NULL): ?>
                                                    <tr>
                                                        <td colspan="6" class="text-center">Tidak Ada Data Untuk Ditampilkan</td>
                                                    </tr>
                                                <?php else: ?>
                                                    <?php foreach($barang as $brg): ?>
                                                    <tr>
                                                        <td><?= $brg['proyek']; ?></td>
                                                        <td><?= $brg['nama_barang']; ?></td>
                                                        <td><?= $brg['tipe']; ?></td>
                                                        <td><?= $brg['satuan']; ?></td>
                                                        <td><?= $brg['kuantitas']; ?></td>
                                                        <td><?= $brg['jumlah_kerusakan']; ?></td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            <?php elseif ($results != NULL): ?>
                                                <?php foreach($results as $result): ?>
                                                <tr>
                                                    <td><?= $result['proyek']; ?></td>
                                                    <td><?= $result['nama_barang']; ?></td>
                                                    <td><?= $result['tipe']; ?></td>
                                                    <td><?= $result['satuan']; ?></td>
                                                    <td><?= $result['kuantitas']; ?></td>
                                                    <td><?= $result['jumlah_kerusakan']; ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end content of data -->
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