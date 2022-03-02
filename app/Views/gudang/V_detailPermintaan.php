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
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Nama Barang</th>
                    <th>Tipe</th>
                    <th>Satuan</th>
                    <th>Kuantitas</th>
                    <th>Aksi</th>
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
                        <?php if($permintaan[0]['verified_gudang'] == 0): ?>
                          <a type="button" class="btn btn-rounded mx-1 btn-warning" href="<?= base_url('Gudang/BarangController/ubahDetailBarang')?>/<?= $brg['id']; ?>">
                          <i class="mdi mdi-pencil"></i></a>
                          <a type="button" class="btn btn-rounded mx-1 btn-danger" href="<?= base_url('Gudang/BarangController/hapusDetailBarang')?>/<?= $brg['id']; ?>">
                          <i class="bi bi-trash"></i></a>
                        <?php elseif($permintaan[0]['verified_gudang'] == 1 && $permintaan[0]['status_pengembalian'] == 0): ?>
                          <a type="button" class="btn btn-rounded mx-1 btn-warning disabled" href="<?= base_url('Gudang/BarangController/ubahDetailBarang')?>/<?= $brg['id']; ?>">
                          <i class="mdi mdi-pencil"></i></a>
                          <a type="button" class="btn btn-rounded mx-1 btn-danger disabled" href="<?= base_url('Gudang/BarangController/hapusDetailBarang')?>/<?= $brg['id']; ?>">
                          <i class="bi bi-trash"></i></a>
                        <?php elseif($permintaan[0]['verified_gudang'] && $permintaan[0]['verified_gm'] && $permintaan[0]['status_pengembalian'] == 1): ?>
                        <?php endif ?>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
              </table>
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
          </div>
        </div>
      <?php endif ?>
    </div>
  </div>
</div>


<?= $this->endSection() ?>