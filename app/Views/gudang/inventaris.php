<?= $this->extend('template/header') ?>

<?= $this->section('content') ?>

  <?= $this->include('template/navbar') ?>
  <div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <!-- main content -->
      <div class="card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Verifikasi Permintaan Barang</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Pengaju</th>
                    <th>Proyek</th>
                    <th>Lokasi</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Aksi</th>
                    <th>Status</th>
                    <th>Verifikasi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($PermintaanBarang as $Permintaan): ?>
                    <?php if($Permintaan['verified_gudang'] && $Permintaan['verified_gm'] && $Permintaan['status_pengembalian'] == 1 || $Permintaan['verified_gudang'] == 0 && $Permintaan['status_pengembalian'] == 0 || $Permintaan['verified_gudang'] == 1 && $Permintaan['status_pengembalian'] == 0): ?>
                      <tr>
                        <td><?= $Permintaan['name']; ?></td>
                        <td><?= $Permintaan['proyek']; ?></td>
                        <td><?= $Permintaan['lokasi']; ?></td>
                        <td><?= $Permintaan['tanggal_pengajuan']; ?></td>
                        <td><?= $Permintaan['tanggal_pengembalian']; ?></td>
                        <td>
                          <!-- Detail -->
                          <a type="button" class="btn btn-rounded mx-1 btn-success" href="<?= base_url('Gudang/BarangController/detail')?>/<?= $Permintaan['id']; ?>">
                            <i class="bi bi-zoom-in"></i></a>
                          <!-- Edit Permintaan -->
                          <?php if($Permintaan['verified_gudang'] == 0): ?>
                            <a type="button" class="btn btn-rounded mx-1 btn-warning" href="<?= base_url('Gudang/BarangController/ubah')?>/<?= $Permintaan['id']; ?>">
                            <i class="mdi mdi-pencil"></i></a>
                          <?php elseif($Permintaan['verified_gudang'] == 1): ?>
                            <!-- <a type="button" class="btn btn-rounded mx-1 btn-warning disabled" href="<?= base_url('Gudang/BarangController/ubah')?>/<?= $Permintaan['id']; ?>">
                            <i class="mdi mdi-pencil"></i></a> -->
                          <?php endif ?>

                          <!-- Hapus Pengajuan -->
                          <?php if ($Permintaan['verified_gudang'] == 0): ?>
                            <a type="button" class="btn btn-rounded mx-1 btn-danger" href="<?= base_url('Gudang/BarangController/hapus')?>/<?= $Permintaan['id']; ?>">
                            <i class="bi bi-clipboard-x"></i></a>
                          <?php elseif($Permintaan['verified_gudang'] == 1 ): ?>
                            <!-- <a type="button" class="btn btn-rounded mx-1 btn-danger disabled" href="<?= base_url('Gudang/BarangController/hapus')?>/<?= $Permintaan['id']; ?>">
                            <i class="bi bi-clipboard-x"></i></a> -->
                          <?php endif ?>
                        </td>
                          <?php if ($Permintaan['verified_gudang'] == 0 || $Permintaan['verified_gm'] == 0) {
                            echo '<td><label class="badge badge-warning">Menunggu</label></td>';
                          } else {
                            echo '<td><label class="badge badge-info">Disetujui</label></td>';
                          }
                          ?>
                        <!-- Verifikasi -->
                        <?php if ($Permintaan['verified_gudang'] == 0): ?>
                          <td>
                            <a type="button" class="btn btn-rounded mx-1 btn-outline-success" href="<?= base_url('gudang/BarangController/verifikasi') ?>/<?= $Permintaan['id'] ?>">
                            <i class="bi bi-check"></i></a>
                          </td>
                          <?php elseif ($Permintaan['verified_gudang'] == 1 && $Permintaan['verified_gm'] == 0 && $Permintaan['status_pengembalian'] == 0): ?>
                            <td>
                            <a type="button" class="btn btn-rounded mx-1 btn-outline-success disabled" href="<?= base_url('gudang/BarangController/verifikasi') ?>/<?= $Permintaan['id'] ?>">
                            <i class="bi bi-check"></i></a>
                          </td>
                          <?php elseif ($Permintaan['verified_gudang'] == 1 && $Permintaan['verified_gm'] == 1 && $Permintaan['status_pengembalian'] == 0): ?>
                            <td>
                            <a type="button" class="btn btn-rounded mx-1 btn-outline-success disabled" href="<?= base_url('gudang/BarangController/verifikasi') ?>/<?= $Permintaan['id'] ?>">
                            <i class="bi bi-check"></i></a>
                          </td>
                          <?php elseif ($Permintaan['verified_gudang'] == 1 && $Permintaan['verified_gm'] == 1 && $Permintaan['status_pengembalian'] == 1): ?>
                            <td>
                            <a type="button" class="btn btn-rounded mx-1 btn-outline-success disabled" href="<?= base_url('gudang/BarangController/verifikasi') ?>/<?= $Permintaan['id'] ?>">
                            <i class="bi bi-check"></i></a>
                          </td>
                        <?php endif ?>
                      </tr>
                    <?php endif ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
              <div class="col mt-3">
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