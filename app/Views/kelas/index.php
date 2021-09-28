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
        <small class="spanInfo text-danger" style="font-size:13px"> </small>
      </div>
      <div class="modal-footer">
        <form action="/kelas/delete" method="post" class="form">
          <input type="hidden" name="_method"value="DELETE">
          <button type="submit"class="btn btn-danger">Ya</button>
        </form>
        <button data-bs-dismiss="modal" class="btn btn-secondary">batal</button>
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
    <div class="col col-5 my-3">
      <a href="/kelas/tambah" class="btn btn-primary">+ Tambah</a>

    </div>
    <div class="col col-12 mx-auto card table-responsive">
      <table class="table table-striped table-hover text-center">
        <thead>
          <th>No</th>
          <th>Kelas</th>
          <th>Wali Kelas</th>

          <th>Di Buat</th>
          <th>Aksi</th>
        </thead>
        <tbody>
          <?php
          $no = 1 + (5 *($currentPage-1));
          foreach ($kelas as $k): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= number_to_roman($k['kelas']) ?></td>
            <td><?= $k['wali_kelas'] ?></td>
          </td>
          <td><?= date('d/M/Y', strtotime($k['created_at'])) ?></td>
          <td>
            <a href="/kelas/edit/<?= $k['kelas'] ?>" class="btn btn-warning text-white fw-bold">Ubah</a>
            <button data-bs-target="#modal" data-bs-toggle="modal" class="btn btn-danger btn-delete" data-id="<?= $k['id_kelas'] ?>"data-kelas="<?= $k["kelas"] ?>">Hapus</button>
            <a href="/kelas/siswa/<?= $k['kelas'] ?>" class="btn btn-info text-white fw-bold">Lihat Siswa</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <?= $pager->links() ?>
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
id, kelas
} = this.dataset
document.querySelector(".form").action = "/kelas/delete/"+id
document.querySelector(".spanInfo").innerHTML = `Semua data siswa kelas ${kelas} juga akan terhapus, berhati hatilah !`

})
})
</script>
<?= $this->endSection() ?>