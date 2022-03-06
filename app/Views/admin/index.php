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
          <div class="card" style="height: 600px;">
            <div class="card-body" style="overflow-y: auto;">
              <div class="card-title">Daftar Pengguna</div>
              <div class="table-responsive mt-3">
                <table class="table">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Role</th>
                  <tbody style="overflow-y: auto;">
                    <?php $i=1; ?>
                    <?php foreach ($users as $user) :?>
                    <tr>
                        <td class="text-left"><?= $i++; ?></td>
                        <td class="text-left"><?= $user['name']; ?></td>
                        <td class="text-left"><?= $user['role']; ?></td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>
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