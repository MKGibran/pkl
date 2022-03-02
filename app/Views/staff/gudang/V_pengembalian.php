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
            <h4 class="card-title mb-2">Form Permintaan Barang</h4>
            <?php if ($results != NULL):?>
            <p class="card-item">Proyek : <?= $results[0]['proyek']; ?></p>
            <?php elseif ($results == NULL):?>
            <?php endif; ?>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Nama Barang</th>
                    <th>Tipe</th>
                    <th>Satuan</th>
                    <th>Kuantitas</th>
                    <th>Kondisi Barang</th>
                  </tr>
                </thead>
                <tbody>
                <?php if ($results != NULL):?>
                  <?php foreach($results as $result): ?>
                    <tr>
                      <td><?= $result['nama_barang']; ?></td>
                      <td><?= $result['tipe']; ?></td>
                      <td><?= $result['satuan']; ?></td>
                      <td><?= $result['kuantitas']; ?></td>
                      <td>
                          <form action="<?= base_url('staff/BarangController/updatePengembalian'); ?>" method="post">
                            <input type="hidden" name="id" value="<?= $result['id']; ?>">
                            <input type="hidden" name="id_permintaan" value="<?= $result['id_permintaan']; ?>">
                            <input type="hidden" name="nama_barang" value="<?= $result['nama_barang']; ?>">
                            <input type="hidden" name="tipe" value="<?= $result['tipe']; ?>">
                            <input type="hidden" name="satuan" value="<?= $result['satuan']; ?>">
                            <input type="hidden" name="kuantitas" value="<?= $result['kuantitas']; ?>">
                            <div class="row g-3">
                              <?php if ($result['jumlah_kerusakan'] != NULL): ?>
                              <div class="col-sm">
                              <button type="submit" class="btn btn-outline-info rounded-pill mt-1" disabled><i class="bi bi-check"></i></button>
                              </div>
                              <?php elseif ($result['jumlah_kerusakan'] == NULL): ?>
                              <div class="col-sm">
                                <input class="form-control form-control-sm mt-1" type="number" name="jumlah" style="width:200px" placeholder="Jumlah barang rusak">
                              </div>
                              <div class="col-sm">
                                <button type="submit" class="btn btn-outline-info rounded-pill mt-1"><i class="bi bi-arrow-bar-up"></i></button>
                              </div>
                              <?php endif; ?>
                            </div>
                          </form>
                        </td>
                      </tr>
                  <?php endforeach; ?>
                <?php elseif ($results == NULL):?>
                  <tr>
                    <td colspan="5" class="text-center">Tidak Ada Data Untuk Ditampilkan</td>
                  </tr>
                      <a type="button" class="btn btn-light" href="<?= base_url('/staff/BarangController/permintaanBarang'); ?>">Kembali</a>
                <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <?php if ($results != NULL):?>
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Catatan Pengembalian Barang</h4>
                <form class="forms-sample" action="<?= base_url('Staff/BarangController/addNote/') ?>"
                  method="POST">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="id" required autocomplete="off" value="<?= $results[0]['id_permintaan']; ?>">
                  <div class="form-group">
                    <div class="form-floating">
                      <textarea class="form-control" name="note" placeholder="Tulis catatan terkait kondisi barang setelah peminjaman ..." id="floatingTextarea2" style="height: 100px"></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Kirim</button>
                  <a type="button" class="btn btn-light" href="<?= base_url('/staff/BarangController/permintaanBarang'); ?>">Kembali</a>
                </form>
              </div>
            </div>
        <?php elseif ($results == NULL):?>
        <?php endif; ?>
      </div>

    </div>
  </div>
</div>

<?= $this->endSection() ?>