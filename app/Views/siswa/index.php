<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!--modal-->
<div class="modal fade" id="modal">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Konfirmasi !</h4>
      </div>
      <div class="modal-body">
        <p>
          Apakah anda yakin ingin menghapus ?
        </p>
      </div>
      <div class="modal-footer">
        <form action="/siswa/delete" method="post" class="form">
          <input type="hidden" name="_method"value="DELETE">
          <button type="submit"class="btn btn-danger">Ya</button>
        </form>
        <button data-bs-dismiss="modal" class="btn btn-success">batal</button>
      </div>
    </div>
  </div>
</div>
<!--end modal-->

<div class="container-fluid mt-5">
  <div class="row">
    <?php if (session()->getFlashData('pesan')) : ?>
    <div class="alert alert-success alert-dismissible">

      <button data-bs-dismiss="alert"class="btn btn-close"></button>
      <?= session()->getFlashData('pesan') ?>
    </div>
    <?php endif; ?>
    <div class="col col-12 col-md-6 my-3">
      <a href="/siswa/tambah" class="btn btn-primary">+ Tambah</a>
      <a href="/siswa/recycle" class="btn btn-dark fw-bold ms-md-5">Recycle</a>
      <?php if (isset($_GET['page']) || isset($_GET['keyword'])): ?>
      <a href="/siswa" class="btn btn-success">Lihat semua data</a>
      <!-- code... -->
      <?php endif; ?>

    </div>
    <div class="col col-12 col-md-6 my-3">
      <form action="" class="d-inline" style="width:200px">
        <div class="input-group">
          <input type="text" name="keyword" class="form-control" placeholder="Cari berdasarkan nama / kelas ...">
          <div class="input-group-append">
            <button class="btn btn-success">Cari</button>
          </div>
        </div>

      </form>

    </div>
    <div class="col col-12 mx-auto card table-responsive">
      <table class="table table-striped table-hover">
        <thead>
          <th>No</th>
          <th>Nama</th>
          <th>Nisn</th>
          <th>Umur</th>
          <th>Kelas</th>
          <th>Daftar</th>
          <th>Aksi</th>
        </thead>
        <tbody>
          <?php if (count($siswa) == 0): ?>
          <td colspan="6" class="text-center fs-1">Data Siswa Kosong</td>
          <?php endif; ?>
          <?php
          $no = 1;
          foreach ($siswa as $s): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $s['nama'] ?></td>
            <td><?= $s['nisn'] ?></td>
            <td><?= $s['umur'] ?></td>
            <td><?= number_to_roman($s['kelas']) ?></td>
            <td><?= date('d/M/Y', strtotime($s['created_at'])) ?></td>
            <td>
              <a href="/siswa/edit/<?= $s['id'] ?>" class="btn btn-warning btn-sm mt-2 text-white ">Ubah</a>
              <button data-bs-target="#modal" data-bs-toggle="modal" class="btn btn-danger mt-2 btn-sm btn-delete" data-id="<?= $s['id'] ?>">Hapus</button>
            </td>
          </tr>

          <?php endforeach; ?>
        </tbody>
      </table>
      <?= ($pager)?$pager->links():'' ?>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
  document.querySelectorAll('[data-id]')
  .forEach((btn)=> {
    btn.addEventListener('click', function() {
      const {
        id
      } = this.dataset
      document.querySelector(".form").action = "/siswa/delete/"+id
    })
  })
</script>
<?= $this->endSection() ?>