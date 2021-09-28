<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<div class="card p-5">
  <div class="row">
    <div class="col col-12 col-md-7 col-lg-3 card mx-auto mb-3 bg-dark text-white fs-1 p-5">
      <div class="card-body">
        <h1><?=$kelas->getCount() ?> Kelas</h1>
        <a href="/kelas" class="btn btn-light">Lihat Detail</a>
      </div>
    </div>
    <div class="col col-12 col-md-7 col-lg-3 card mx-auto mb-3 bg-warning text-white  fs-1 p-5">
      <div class="card-body">
        <h1><?=$siswa->getCount() ?> Total Siswa</h1>
        <a href="/siswa" class="btn btn-light">Lihat Detail</a>
      </div>
    </div>
  </div>
</div>



<?= $this->endSection() ?>