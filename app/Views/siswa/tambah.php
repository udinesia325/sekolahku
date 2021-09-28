<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<div class="container">
  <div class="row">
    <div class="col col-12 card  px-2">
      <form action="/siswa/save" method="post" class="form py-5">
        <div class="form-group mt-3">
          <label for="nama">Nama Siswa</label>
          <input type="text" class="form-control<?= $validation->hasError('nama')?' is-invalid':'' ?>" name="nama" id="nama" value="<?= old('nama') ?>">
          <div class="invalid-feedback ms-3">
            <?= $validation->getError('nama') ?>
          </div>
        </div>
        <div class="form-group mt-3">
          <label for="nisn">No NISN</label>
          <input type="number" class="form-control<?= $validation->hasError('nisn')?' is-invalid':'' ?>" name="nisn" id="nisn"value="<?= old('nisn') ?>">
          <div class="invalid-feedback ms-3">
            <?= $validation->getError('nisn') ?>
          </div>
        </div>
        <div class="form-group mt-3">
          <label for="umur">Umur </label>
          <input type="number" class="form-control<?= $validation->hasError('umur')?' is-invalid':'' ?>" name="umur" id="umur"value="<?= old('umur') ?>">
          <div class="invalid-feedback ms-3">
            <?= $validation->getError('umur') ?>
          </div>
        </div>
        <div class="form-group mt-3">

          <select name="kelas" id="" class="form-select<?= $validation->hasError('kelas')?' is-invalid':'' ?>">

            <?php foreach ($kelas as $k) : ?>
            <option value="<?= $k['kelas'] ?>" <?= old('kelas') == $k['kelas']? ' selected ' : '' ?>><?= $k['kelas'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group mt-4">
          <button class="btn btn-lg btn-success ms-5">Tambah</button>
          <a href="/siswa" class="btn btn-primary btn-lg">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</div>




<?= $this->endSection() ?>