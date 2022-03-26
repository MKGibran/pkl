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
            <div style="height: 400px ; overflow-y: auto">
              <div class="form-group">
                <div class="form-floating" style="overflow-y: auto;">
                  <?php foreach($notes as $note): ?>
                  <div class="list-inline mb-0 mt-2">
                    <p class="text-secondary ml-1 list-inline-item"><?= $note['created_at']; ?></p>
                  </div>
                  <textarea class="form-control mt-0 bg-transparent" disabled name="note" id="floatingTextarea2"
                    style="height: 70px"><?= $note['note']; ?></textarea>
                <?php endforeach; ?>
              </div>
            </div>
            <a type="button" class="btn btn-light" href="<?= base_url('Staff/BarangController/') ?>">Kembali</a>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<?= $this->endSection() ?>