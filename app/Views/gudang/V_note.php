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
                <div style="height: auto ; overflow-y: auto">
                <div class="form-group">
                    <div class="form-floating" style="overflow-y: auto;">
                    <textarea class="form-control mt-1 bg-transparent" disabled name="note" id="floatingTextarea2" style="height: 70px"> tangal
                aa</textarea>
                    <textarea class="form-control mt-1 bg-transparent" disabled name="note" id="floatingTextarea2" style="height: 70px"></textarea>
                    <textarea class="form-control mt-1 bg-transparent" disabled name="note" id="floatingTextarea2" style="height: 70px"></textarea>
                    </div>
                </div>
                </div>
              <a type="button" class="btn btn-light" href="<?= base_url('Staff/BarangController/') ?>">Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>