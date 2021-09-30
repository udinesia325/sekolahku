<?= $this->extend("template/index") ?>


<?= $this->section("content") ?>
<div class="modal fade" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        Konfirmasi !
      </div>
      <div class="modal-body">
        apakah anda yakin ingin menghapus secara permanen ?
      </div>
      <div class="modal-footer">
        <form action="" method="post" class="d-inline">
          <input type="hidden" name="_method" value="delete">
          <button class="btn btn-danger" type="submit">Ya</button>
        </form>
        <button data-bs-dismiss="modal" class="btn btn-success">Batal</button>
      </div>
    </div>
  </div>
</div>
<div class="container card px-3">

  <?php if (session()->getFlashData("pesan")): ?>
  <div class="alert alert-success alert-dismissible" id="alert">
    <span class="btn-close" data-bs-dismiss="alert"></span>
    <?= session()->getFlashData("pesan") ?>
  </div>
  <?php endif; ?>
  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Nisn</th>
          <th>Umur</th>
          <th>Kelas</th>
          <th>Aksi</th>
        </tr>
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
          <td><?= $s["nama"] ?></td>
          <td><?= $s["nisn"] ?></td>
          <td><?= $s["umur"] ?></td>
          <td><?= $s["kelas"] ?></td>
          <td>
            <form action="/siswa/restore/<?= $s["id"] ?>" method="post" class="d-inline">
              <input type="hidden" name="_method" value="PUT">
              <button type="submit" class="btn btn btn-success">Kembalikan</button>
            </form>
            <button class="btn btn-danger" data-bs-target="#modal" data-bs-toggle="modal" data-id="<?= $s["id"] ?>">Hapus Permanen</button>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?= $this->endSection() ?>


<?= $this->section("script") ?>
<script>
  document.querySelectorAll("[data-id]")
  .forEach((element)=> {
    element.addEventListener("click", function () {
      let {
        id
      } = this.dataset

      document.querySelector("form").action = "/delete/permanen/"+id
    }
    )})
</script>
<?= $this->endSection() ?>