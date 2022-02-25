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
            <h4 class="card-title">Catatan Pengembalian Barang</h4>
            <form class="forms-sample" action="<?= base_url('Staff/BarangController/addNote/') ?>"
              method="POST">
              <?= csrf_field(); ?>
              <input type="hidden" name="id" required autocomplete="off" value="<?= $barang['id']; ?>">
              <div class="form-group">
                <div class="form-floating">
                  <textarea class="form-control" name="note" placeholder="Tulis catatan terkait kondisi barang setelah peminjaman ..." id="floatingTextarea2" style="height: 100px"></textarea>
                </div>
              </div>
              <button type="submit" class="btn btn-primary mr-2">Ubah</button>
              <a type="button" class="btn btn-light" href="<?= base_url('/staff/BarangController/permintaanBarang'); ?>">Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>