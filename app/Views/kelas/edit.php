<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<div class="container">
  <div class="row">
    <div class="col col-12  col-md-7 mx-auto  card  px-2">
      <div class="alert alert-warning alert-dismissible">
        <span class="btn-close" data-bs-dismiss="alert"></span>
        <p>
          Mengubah data kelas  juga akan merubah data siswa yang bersangkutan !
        </p>
      </div>
      <form action="/kelas/update/<?= $kelas['kelas'] ?>" method="post" class="form py-5">
        <input type="hidden" name="id_kelas" value="<?= $kelas['id_kelas'] ?>">
        <div class="form-group mt-3">
          <label for="nama">Nama Kelas</label>
          <input type="text" class="form-control<?= $validation->hasError('kelas')?' is-invalid':'' ?>" name="kelas" id="nama" value="<?= (old('kelas'))?old('kelas'):$kelas['kelas'] ?>">
          <div class="invalid-feedback ms-3">
            <?= $validation->getError('kelas') ?>
          </div>
        </div>
        <div class="form-group mt-3">
          <label for="nisn">Wali Kelas</label>
          <input type="text" class="form-control<?= $validation->hasError('wali_kelas')?' is-invalid':'' ?>" name="wali_kelas" id="nisn"value="<?= (old('wali_kelas'))? old('wali_kelas'):$kelas['wali_kelas'] ?>">
          <div class="invalid-feedback ms-3">
            <?= $validation->getError('wali_kelas') ?>
          </div>
        </div>
        <div class="form-group mt-4">
          <button class="btn btn-md btn-success  form-control mt-2">Update</button>
          <a href="/kelas" class="btn btn-primary btn-md form-control mt-3">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</div>




<?= $this->endSection() ?>