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
            <h4 class="card-title">Form Permintaan Barang</h4>
            <a class="btn btn-primary btn-rounded" href="#" role="button" data-bs-toggle="modal"
              data-bs-target="#tambahOperasional">
              <i class="mdi mdi-plus mr-2"></i><span>Tambah</span></a>

            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Proyek</th>
                    <th>Lokasi</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Aksi</th>
                    <th>Status</th>
                    <th>Pengembalian</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if($PermintaanBarang != NULL):?>
                    <?php foreach($PermintaanBarang as $Permintaan): ?>
                    <tr>
                      <td><?= $Permintaan['proyek']; ?></td>
                      <td><?= $Permintaan['lokasi']; ?></td>
                      <td><?= $Permintaan['tanggal_pengajuan']; ?></td>
                      <td><?= $Permintaan['tanggal_pengembalian']; ?></td>
                      <td>
                        <!-- Modal Detail -->
                        <a type="button" class="btn btn-rounded mx-1 btn-success"
                          href="<?= base_url('Staff/BarangController/detail')?>/<?= $Permintaan['id']; ?>">
                          <i class="bi bi-zoom-in"></i></a>
                        <!-- Modal Note -->
                        <?php if($Permintaan['status_pengembalian'] == 1 && $Permintaan['note'] != NULL): ?>
                        <!-- <a type="button" class="btn btn-rounded mx-1 btn-primary disabled"
                          href="<?= base_url('Staff/BarangController/note')?>/<?= $Permintaan['id']; ?>">
                          <i class="bi bi-journal-text"></i></a> -->
                        <?php elseif($Permintaan['status_pengembalian'] == 1 && $Permintaan['note'] == NULL): ?>
                        <a type="button" class="btn btn-rounded mx-1 btn-primary"
                          href="<?= base_url('Staff/BarangController/note')?>/<?= $Permintaan['id']; ?>">
                          <i class="bi bi-journal-text"></i></a>
                        <?php else: ?>
                        <?php endif ?>

                        <!-- Modal Edit Permintaan -->
                        <?php if($Permintaan['verified_gudang'] == 1 && $Permintaan['verified_gm'] == 1 && $Permintaan['status_pengembalian'] == 1): ?>
                        <?php elseif($Permintaan['verified_gudang'] == 1 && $Permintaan['verified_gm'] == 1 && $Permintaan['status_pengembalian'] == 0): ?>
                        <?php else: ?>
                        <a type="button" class="btn btn-rounded mx-1 btn-warning"
                          href="<?= base_url('Staff/BarangController/ubah')?>/<?= $Permintaan['id']; ?>">
                          <i class="mdi mdi-pencil"></i></a>
                        <?php endif ?>

                        <!-- Modal Hapus Pengajuan -->
                        <?php if ($Permintaan['verified_gudang'] == 1 && $Permintaan['verified_gm'] == 1 && $Permintaan['status_pengembalian'] == 1): ?>
                        <?php elseif ($Permintaan['verified_gudang'] == 1 && $Permintaan['verified_gm'] == 1 && $Permintaan['status_pengembalian'] == 0): ?>
                        <?php else: ?>
                        <a type="button" class="btn btn-rounded mx-1 btn-danger"
                          href="<?= base_url('Staff/BarangController/hapus')?>/<?= $Permintaan['id']; ?>">
                          <i class="bi bi-trash"></i></a>
                        <?php endif ?>
                      </td>

                      <td>
                        <?php if ($Permintaan['verified_gudang'] == 0 || $Permintaan['verified_gm'] == 0) :?>
                        <label class="badge badge-warning">Menunggu</label>
                        <?php elseif($Permintaan['verified_gudang'] == 1 || $Permintaan['verified_gm'] == 1): ?>
                        <label class="badge badge-info">Disetujui</label>
                        <?php endif ?>
                      </td>
                      
                      <td>
                        <?php if ($Permintaan['verified_gm'] == 1 && $Permintaan['status_pengembalian'] == 0): ?>
                        <a type="button" class="btn btn-rounded mx-1 btn-outline-success"
                          href="<?= base_url('Staff/BarangController/pengembalian')?>/<?= $Permintaan['id']; ?>">
                          <i class="mdi mdi-backup-restore mr-2"></i>Kembalikan</a>
                      </td>

                      <td>
                        <?php elseif($Permintaan['verified_gm'] == 1 && $Permintaan['status_pengembalian'] == 1): ?>
                        <a type="button" class="btn btn-rounded mx-1 btn-outline-success disabled">
                          <i class="mdi mdi-check mr-2"></i>Dikembalikan</a>
                      </td>
                      <?php endif ?>
                    </tr>
                    <?php endforeach; ?>
                  <?php elseif($PermintaanBarang == NULL):?>
                    <tr>
                      <td colspan="7" class="text-center">Tidak Ada Data Untuk Ditampilkan</td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
            <?php if($PermintaanBarang != NULL):?>
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
            <?php elseif($PermintaanBarang == NULL):?>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <!-- modal tambah -->
      <div class="modal fade" id="tambahOperasional">
        <div class="modal-dialog">
          <div class="modal-content" style="overflow-y: auto;">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Tambah Form Permintaan Barang</h4>
              <button type="button" class="btn btn-light" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form class="forms-sample" action="<?= base_url('Staff/BarangController/tambah/'); ?>" method="POST">
                <?= csrf_field(); ?>
                <div class="form-group">
                  <label for="exampleInputUsername">Proyek</label>
                  <input name="proyek" type="text" class="form-control" id="exampleInputProyek" required
                    autocomplete="off" placeholder="Proyek">
                </div>
                <div class="form-group">
                  <label for="exampleInputLokasi">Lokasi</label>
                  <input name="lokasi" type="text" class="form-control" id="exampleInputLokasi" required
                    autocomplete="off" placeholder="Lokasi">
                </div>
                <div class="form-group">
                  <label for="exampleInputTanggal">Tanggal Pengajuan</label>
                  <input name="tanggal_pengajuan" type="date" class="form-control" id="exampleInputTanggal" required
                    autocomplete="off" placeholder="Tanggal">
                </div>
                <div class="form-group">
                  <label for="exampleInputWaktuBerangkat">Tanggal Pengembalian</label>
                  <input name="tanggal_pengembalian" type="date" class="form-control" id="exampleInputWaktuBerangkat"
                    required autocomplete="off" placeholder="Waktu Berangkat">
                </div>
                <button type="submit" class="btn btn-primary mr-2">Kirim</button>
                <button class="btn btn-light" data-bs-dismiss="modal">Batal</button>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?= $this->endSection() ?>