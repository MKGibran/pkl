<?= $this->extend('template/header') ?>

<?= $this->section('content') ?>

<?= $this->include('template/navbar') ?>

<div class="container-fluid">
  <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|} mt-3">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Profile</h4>
            <?php if (!$user[0]['photo']): ?>
              <img src="<?= base_url() ?>/assets/images/faces/blank.png" style="width: 300px;"
              class="rounded-pill mx-auto d-block img-fluid mb-5" alt="Profile Photo">
            <?php else :?>
              <img src="<?= base_url('img') ?>/<?= $user[0]['photo']; ?>" style="width: 300px; height:300px"
              class="rounded-pill mx-auto d-block img-fluid mb-5" alt="Profile Photo">
            <?php endif ?>
          <div class="table-responsive mt-5">
            <table class="table">
              <tbody>
                <tr>
                  <td class="text-left" style="opacity: 70%;">Nama</td>
                  <td class="text-right"><?= $user[0]['name']; ?></td>
                </tr>
                <tr>
                  <td class="text-left" style="opacity: 70%;">Email</td>
                  <td class="text-right"><?= $user[0]['email']; ?></td>
                </tr>
                <tr>
                  <td class="text-left" style="opacity: 70%;">No. HP</td>
                  <td class="text-right"><?= $user[0]['phone']; ?></td>
                </tr>
                <tr>
                  <td class="text-left" style="opacity: 70%;">Role</td>
                  <td class="text-right"><?= $user[0]['role']; ?></td>
                </tr>
              </tbody>
            </table>
            <div class="d-grid mt-3">
              <a type="button" class="btn btn-warning btn-block" role="button" data-bs-toggle="modal"
                data-bs-target="#editProfile"><i class="mdi mdi-pencil mr-2"></i>Ubah</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal Edit Profile -->
<div class="modal fade" id="editProfile">
  <div class="modal-dialog">
    <div class="modal-content" style="overflow-y: auto;">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Ubah Profile</h4>
        <button type="button" class="btn btn-light" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="forms-sample" action="<?= base_url('Profile/editData') ?>" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $user[0]['id']; ?>">
          <div class="form-group">
            <label for="exampleInputNama">Nama</label>
            <input name="name" type="text" class="form-control" value="<?= $user[0]['name']; ?>" id="exampleInputNama" placeholder="<?= $user[0]['name']; ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail">Email</label>
            <input name="email" type="email" class="form-control" value="<?= $user[0]['email']; ?>" id="exampleInputEmail"
              placeholder="<?= $user[0]['email']; ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputPhone">No. HP</label>
            <input name="phone" type="number" class="form-control" value="<?= $user[0]['phone']; ?>" id="exampleInputPhone" placeholder="<?= $user[0]['phone']; ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword">
          </div>
          <div class="form-group">
            <label for="exampleInputProfilePhoto">Foto Profil</label>
            <input name="photo" type="file" class="form-control" id="exampleInputProfilePhoto" placeholder="Foto Profil">
          </div>
          <button type="submit" class="btn btn-primary mr-2">Ubah</button>
          <button class="btn btn-light" data-bs-dismiss="modal">Batal</button>
        </form>
      </div>
    </div>
  </div>
</div>

</div>
</div>

<?= $this->endSection() ?>