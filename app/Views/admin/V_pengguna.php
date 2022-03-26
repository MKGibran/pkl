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
            <h4 class="card-title">Informasi Pengguna</h4>
            <a class="btn btn-primary btn-rounded" href="#" role="button" data-bs-toggle="modal"
              data-bs-target="#tambahPengguna">
              <i class="mdi mdi-plus mr-2"></i><span>Tambah</span></a>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No. HP</th>
                    <th>Role</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if ($users) :?>
                  <?php foreach ($users as $user) :?>
                  <tr>
                    <td class="text-left"><?= $user['name']; ?></td>
                    <td class="text-left"><?= $user['email']; ?></td>
                    <td class="text-left"><?= $user['phone']; ?></td>
                    <td class="text-left"><?= $user['role']; ?></td>
                    <td class="text-left">
                      <a type="button" class="btn btn-rounded mx-1 btn-danger" href="<?= base_url('Admin/AdminController/deleteUser') ?>/<?= $user['id']; ?>">
                        <i class="bi bi-trash"></i>
                      </a>
                    </td>
                  </tr>
                  <?php endforeach ?>
                  <?php elseif (!$users) :?>
                  <tr>
                    <td colspan="5" class="text-center">Tidak Ada Data Untuk Ditampilkan</td>
                  </tr>
                  <?php endif ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- modal tambah -->
      <div class="modal fade" id="tambahPengguna">
        <div class="modal-dialog">
          <div class="modal-content" style="overflow-y: auto;">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Tambah Pengguna</h4>
              <button type="button" class="btn btn-light" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form class="forms-sample" action="<?= base_url('Admin/AdminController/addUser/'); ?>" method="POST">
                <?= csrf_field(); ?>
                <div class="form-group mb-3">
                  <label for="exampleInputUsername">Nama</label>
                  <input name="Nama" type="text" class="form-control" id="exampleInputNama" required autocomplete="off">
                </div>
                <div class="form-group mb-3">
                  <label for="exampleInputEmail">Email</label>
                  <input name="Email" type="email" class="form-control" id="exampleInputEmail" required
                    autocomplete="off">
                </div>
                <div class="form-group mb-3">
                  <label for="exampleInputNohp">Nomor Handphone</label>
                  <input name="Nohp" type="number" class="form-control" id="exampleInputNohp" required autocomplete="off">
                </div>
                <label for="exampleInputRole">Role</label>
                <div class="input-group mb-3">
                  <div class="dropdown">
                    <!-- <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Nama Barang</button> -->
                    <select class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                      aria-expanded="false" name="Role" required>
                      <div class="dropdown-menu">
                        <option class="dropdown-item text-left" disabled selected value="">Pilih...</option>
                        <option class="dropdown-item text-left" value="manager">General Manager</option>
                        <option class="dropdown-item text-left" value="finance">Finance Manager</option>
                        <option class="dropdown-item text-left" value="gudang">Staff Gudang</option>
                        <option class="dropdown-item text-left" value="admin">Admin</option>
                        <option class="dropdown-item text-left" value="staff">Staff</option>
                      </div>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <input name="" type="text" class="form-control" disabled id="exampleInputPassword" value="123123123" placeholder="123123123">
                  <input name="Password" type="hidden" class="form-control" id="exampleInputPassword" value="123123123">
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