<!--sidebar-->
<div class="offcanvas offcanvas-start"
  id="sidebar">
  <div class="offcanvas-content">
    <div class="offcanvas-header bg-primary">
      <h1 class="text-white">Sekolah_Ku</h1>
      <button class="btn float-end fs-3 text-white btn-close"
        data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body position-relative">

      <div class="list-group">
        <a href="/dashboard"class="list-group-item mb-3 shadow-sm<?= ($title == 'Dashboard') ? ' active': '' ?>">Dashboard</a>
        <a href="/siswa"class="list-group-item mb-3 shadow-sm<?= ($title == 'Data - Siswa') ? ' active': '' ?>">Data Siswa</a>
        <a href="/kelas"class="list-group-item mb-3 shadow-sm<?= ($title == 'Data - Kelas') ? ' active': '' ?>">Data Kelas</a>

      </div>
    </div>



  </div>
  <?php if (session("username")): ?>
  <!-- html... -->


  <div class="position-absolute bottom-0 py-2 bg-danger text-center" style="width:100%">
    <button class="text-white btn " data-bs-target="#logout" data-bs-toggle="modal">Logout</button>
  </div>
  <?php endif; ?>

</div>
<!--endsidebar-->

<div class="modal  fade " id="logout">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h3>

          Konfirmasi
        </h3>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin Logout?

      </div>
      <div class="modal-footer">
        <button class="btn btn-success ms-auto" data-bs-dismiss="modal">
          batal
        </button>
        <a href="/logout" class="btn btn-danger me-auto">Ya</a>
      </div>
    </div>
  </div>

</div>