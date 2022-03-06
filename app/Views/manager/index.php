<?= $this->extend('template/header') ?>

<?= $this->section('content') ?>

<?= $this->include('template/navbar') ?>

<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-sm-6 mb-4 mb-xl-0">
          <div class="card">
            <div class="card-body">
              <?php date_default_timezone_set("Asia/Jakarta"); ?>
              <ul class="list-inline d-block  mb-0">
                <li class="list-inline-item float-left card-text p-1 mx-0 mb-0">Selamat datang <strong
                    class="text-dark"><?= session()->get('name') ?></strong></li>
                <li class="list-inline-item float-right card-title p-1 mx-0 mb-0"><?= date("h"); ?> :
                  <?= date("i"); ?> | <?= date("d M Y"); ?></li>
              </ul>
            </div>
          </div>
          <div class="card mt-3">
            <div class="card-body">
              <img src="<?= base_url() ?>/assets/images/faces/face4.jpg" style="width: 250px;"
                class="rounded-pill mx-auto d-block img-fluid mb-5" alt="Profile Photo">
              <div class="table-responsive mt-5">
                <table class="table">
                  <tbody>
                    <tr>
                      <td class="text-left" style="opacity: 70%;">Nama</td>
                      <td class="text-right"><?= session()->get('name') ?></td>
                    </tr>
                    <tr>
                      <td class="text-left" style="opacity: 70%;">Email</td>
                      <td class="text-right"><?= session()->get('email') ?></td>
                    </tr>
                    <tr>
                      <td class="text-left" style="opacity: 70%;">Role</td>
                      <td class="text-right"><?= session()->get('role') ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 mb-4 mb-xl-0">
          <div class="card" style="max-height: 300px;">
            <div class="card-body" style="overflow-y: auto;">
              <div class="card-title">Daftar Permintaan Barang</div>
              <div class="table-responsive mt-3">
                <table class="table">
                  <th>No</th>
                  <th>Nama Pengaju</th>
                  <th>Proyek</th>
                  <?php if($permintaans) :?>
                  <tbody style="overflow-y: auto;">
                    <?php $i=1; ?>
                    <?php foreach ($permintaans as $permintaan) :?>
                    <tr>
                      <td class="text-left"><?= $i++; ?></td>
                      <td class="text-left"><?= $permintaan['name']; ?></td>
                      <td class="text-left"><?= $permintaan['proyek']; ?></td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                  <?php elseif(!$permintaans): ?>
                  <tbody>
                    <td colspan="3" class="text-center">Tidak ada data untuk ditampilkan</td>
                  </tbody>
                  <?php endif ?>
                </table>
              </div>
            </div>
          </div>
          <div class="card mt-3" style="max-height: 300px;">
            <div class="card-body" style="overflow-y: auto;">
              <div class="card-title">Daftar Pengajuan Operasional</div>
              <div class="table-responsive mt-3">
                <table class="table">
                  <th>No</th>
                  <th>Nama Pengaju</th>
                  <th>Proyek</th>
                  <?php if($pengajuans) :?>
                  <tbody>
                    <?php $i=1; ?>
                    <?php foreach ($pengajuans as $pengajuan) :?>
                    <tr>
                      <td class="text-left"><?= $i++; ?></td>
                      <td class="text-left"><?= $pengajuan['name']; ?></td>
                      <td class="text-left"><?= $pengajuan['proyek']; ?></td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                  <?php elseif(!$pengajuans): ?>
                  <tbody>
                    <td colspan="3" class="text-center">Tidak ada data untuk ditampilkan</td>
                  </tbody>
                  <?php endif ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>