<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<div class="container">
  <div class="row">
    <div class="col col-12 col-md-7 card  px-5 mx-auto">
      <form action="/kelas/save" method="post" class="form py-5">
        <div class="form-group mt-3">
          <label for="nama">Nama Kelas</label>
          <input type="number" class="form-control<?= $validation->hasError('kelas')?' is-invalid':'' ?>" name="kelas" id="nama" value="<?= old('kelas') ?>">
          <div class="invalid-feedback ms-3">
            <?= $validation->getError('kelas') ?>
          </div>
        </div>
        <div class="form-group mt-3">
          <label for="wali">Wali Kelas</label>
          <input type="text" class="form-control<?= $validation->hasError('wali_kelas')?' is-invalid':'' ?>" name="wali_kelas" id="wali"value="<?= old('wali_kelas') ?>">
          <div class="invalid-feedback ms-3">
            <?= $validation->getError('wali_kelas') ?>
          </div>
        </div>
        <div class="form-group mt-3">

        </div>
        <div class="form-group mt-4">
          <button class="btn btn-lg btn-success ms-5">Tambah</button>
          <a href="/kelas" class="btn btn-primary btn-lg">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</div>




<?= $this->endSection() ?>