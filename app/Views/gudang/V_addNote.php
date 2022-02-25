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
            <h4 class="card-title">Catatan Barang</h4>
            <a class="btn btn-primary btn-rounded mb-2" href="#" role="button" data-bs-toggle="modal"
              data-bs-target="#tambahDetailPermintaan">
              <i class="mdi mdi-plus mr-2"></i><span>Tambah</span></a>
            <div style="height: 400px ; overflow-y: auto">
            <?php foreach($barang as $brg): ?>
              <div class="form-group mb-1">
                <div class="form-floating" style="overflow-y: auto;">
                <div class="list-inline mb-0 mt-2">
                <p class="text-secondary ml-1 list-inline-item"><?= $brg['created_at']; ?></p>
                <a type="button" class="mx-1 text-dark float-right list-list-inline-item" href="<?= base_url('Gudang/BarangController/deleteNote')?>/<?= $brg['id']; ?>">
                        <i class="bi bi-trash"></i></a>
                </div>
                  <textarea class="form-control mt-0 bg-transparent" disabled name="note" id="floatingTextarea2"
                    style="height: 70px"><?= $brg['note']; ?></textarea>
                </div>
              </div>
            <?php endforeach; ?>
            </div>
            <a type="button mt-3" class="btn btn-light" href="<?= base_url('Staff/BarangController/') ?>">Kembali</a>
            </form>
          </div>
          <!-- modal tambah -->
          <div class="modal fade" id="tambahDetailPermintaan">
            <div class="modal-dialog">
              <div class="modal-content" style="overflow-y: auto;">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Tambah Catatan Barang</h4>
                  <button type="button" class="btn btn-light" data-bs-dismiss="modal"><i
                      class="bi bi-x-lg"></i></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form class="forms-sample" action="<?= base_url('gudang/BarangController/storeNote/'); ?>"
                    method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                      <input type="hidden" name="id_barang" value="<?= $barang2['id']; ?>">
                      <input type="hidden" name="nama_barang" value="<?= $barang2['nama_barang']; ?>">
                      <label for="exampleInputNamaBarang"><?= $barang2['nama_barang']; ?> | <?= $barang2['tipe']; ?></label>
                      <textarea class="form-control mt-1 bg-transparent" placeholder="Tambahkan catatan barang disini..." name="note" id="floatingTextarea2" style="height: 100px"></textarea>
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
  </div>
</div>

<?= $this->endSection() ?>