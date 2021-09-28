<?= $this->extend("template/index") ?>

<?= $this->section("content") ?>

<div class="container card py-2 ">
  <div class="row">
    <div class="col col-12 col-md-10 mx-auto">
      <a href="/kelas" class="btn btn-primary ">Kembali</a>
      <?php if (count($siswa) != 0): ?>
      <button onclick="window.print()" class="btn btn-success ">Print</button>
      <?php endif; ?>
      <p>
        <b>Kelas :</b><?= number_to_roman($siswa[0]['kelas']) ?>
      </p>
      <p>
        <b></b>
      </p>
      <table class="table table-striped yable-hover text-center">
        <thead>
          <th>No</th>
          <th>Nama</th>
          <th>Nisn</th>
          <th>Umur</th>
        </thead>
        <tbody>
          <?php
          if (count($siswa) == 0) {
            echo("<td colspan='4'>Data kosong !</td>");
          }
          $no = 1;
          foreach ($siswa as $s): ?>


          <tr>
            <td><?= $no++ ?></td>
            <td><?= $s["nama"] ?></td>
            <td><?= $s["nisn"] ?></td>
            <td><?= $s["umur"] ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection() ?>