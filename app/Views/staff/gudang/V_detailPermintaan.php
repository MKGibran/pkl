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
            <h4 class="card-title">Detail Form Permintaan Barang</h4>
            <?php if ($permintaan[0]['verified_gudang'] == 0 && $permintaan[0]['verified_gm'] == 0 && $permintaan[0]['status_pengembalian'] == 0): ?>
            <a class="btn btn-primary btn-rounded" href="#" role="button" data-bs-toggle="modal"
              data-bs-target="#tambahDetailPermintaan">
              <i class="mdi mdi-plus mr-2"></i><span>Tambah</span></a>
            <?php elseif ($permintaan[0]['verified_gudang'] == 1 && $permintaan[0]['verified_gm'] == 1 && $permintaan[0]['status_pengembalian'] == 0): ?>
            <?php elseif ($permintaan[0]['verified_gm'] == 1 && $permintaan[0]['status_pengembalian'] == 1): ?>
            <?php endif ?>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Nama Barang</th>
                    <th>Tipe</th>
                    <th>Satuan</th>
                    <th>Kuantitas</th>
                    <th>
                      <?php if ($permintaan[0]['verified_gudang'] && $permintaan[0]['verified_gm'] && $permintaan[0]['status_pengembalian'] == 1):?>
                        Jumlah Kerusakan Barang
                        <?php else: ?>
                        Aksi
                    <?php endif; ?>
                  </th>
                    <!-- <th>Status</th>
                    <th>Kondisi Pengembalian</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($barang as $brg): ?>
                  <tr>
                      <td><?= $brg['nama_barang']; ?></td>
                      <td><?= $brg['tipe']; ?></td>
                      <td><?= $brg['satuan']; ?></td>
                      <td><?= $brg['kuantitas']; ?></td>
                      <td>
                        <?php if ($permintaan[0]['verified_gudang'] == 0): ?>
                        <a type="button" class="btn btn-rounded mx-1 btn-warning" href="<?= base_url('Staff/BarangController/ubahDetailBarang')?>/<?= $brg['id']; ?>">
                        <i class="mdi mdi-pencil"></i></a>
                        <a type="button" class="btn btn-rounded mx-1 btn-danger" href="<?= base_url('Staff/BarangController/hapusDetailBarang')?>/<?= $brg['id']; ?>">
                        <i class="bi bi-trash"></i></a>
                        <?php elseif ($permintaan[0]['verified_gudang'] && $permintaan[0]['verified_gm'] && $permintaan[0]['status_pengembalian'] == 1):?>
                          <p><?= $brg['jumlah_kerusakan']; ?></p>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
              </table>
            </div>

            <!-- modal tambah -->
            <div class="modal fade" id="tambahDetailPermintaan">
              <div class="modal-dialog">
                <div class="modal-content" style="overflow-y: auto;">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Permintaan Barang</h4>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal"><i
                        class="bi bi-x-lg"></i></button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <form class="forms-sample" action="<?= base_url('Staff/BarangController/tambahDetailBarang/'); ?>" method="POST">
                      <?= csrf_field(); ?>
                      <input type="hidden" name="idPermintaan" value="<?= $idPermintaan; ?>">
                      <div class="form-group">
                        <label for="exampleInputSatuan">Nama Barang</label>
                        <div class="input-group mb-3">
                          <div class="dropdown">
                            <!-- <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Nama Barang</button> -->
                            <select class="btn btn-outline-secondary dropdown-toggle" type="button"
                              data-bs-toggle="dropdown" aria-expanded="false" name="nama_barang" required>
                              <div class="dropdown-menu">
                                <option class="dropdown-item text-left" disabled selected value="">Pilih...</option>
                                <?php foreach($nama_barang as $n_brg): ?>
                                <option class="dropdown-item text-left" value="<?= $n_brg; ?>"><?= $n_brg; ?></option>
                                <?php endforeach; ?>
                              </div>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputSatuan">Satuan</label>
                        <div class="input-group mb-3">
                          <div class="dropdown">
                            <!-- <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Nama Barang</button> -->
                            <select class="btn btn-outline-secondary dropdown-toggle" type="button"
                              data-bs-toggle="dropdown" aria-expanded="false" name="satuan" required>
                              <div class="dropdown-menu">
                                <option class="dropdown-item text-left" disabled selected value="">Pilih...</option>
                                <?php foreach($satuans as $satuan): ?>
                                <option class="dropdown-item text-left" value="<?= $satuan; ?>"><?= $satuan; ?></option>
                                <?php endforeach; ?>
                              </div>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputSatuan">Tipe</label>
                        <div class="input-group mb-3">
                          <div class="dropdown">
                            <!-- <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Nama Barang</button> -->
                            <select class="btn btn-outline-secondary dropdown-toggle" type="button"
                              data-bs-toggle="dropdown" aria-expanded="false" name="tipe" required>
                              <div class="dropdown-menu">
                                <option class="dropdown-item text-left" disabled selected value="">Pilih...</option>
                                <?php foreach($tipes as $tipe): ?>
                                <option class="dropdown-item text-left" value="<?= $tipe; ?>"><?= $tipe; ?></option>
                                <?php endforeach; ?>
                              </div>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputKuantitas">Kuantitas</label>
                        <input name="kuantitas" type="number" class="form-control" id="exampleInputKuantitas" required
                          autocomplete="off" placeholder="Kuantitas">
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

      <?php if($permintaan[0]['note'] != NULL): ?>
        <div class="card mt-3">
          <div class="card-body">
            <h4 class="card-title">Catatan Pengembalian Barang</h4>
            <div class="form-floating">
              <textarea class="form-control bg-transparent" disabled placeholder="<?= $permintaan[0]['note']; ?>" id="floatingTextarea2" style="height: 100px"></textarea>
            </div>
            <a type="button" class="btn btn-light mt-2" href="<?= base_url('/staff/BarangController/permintaanBarang'); ?>">Kembali</a>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>


<?= $this->endSection() ?>