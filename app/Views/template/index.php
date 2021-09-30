<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="icon" href="/Sekolahku.jpg" type="image/jpeg">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php if (isset($validation)): ?>
  <?php if (count($validation->getErrors()) > 0): ?>
  <meta name="theme-color"content="#ff3232" />
  <?php endif; ?>
  <?php else : ?>

  <?php endif; ?>
  <meta name="theme-color"content="#0c1dff" />
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <title><?= isset($title)?$title:'' ?></title>
  <style>
    .navbar-toggler {
      font-size: 2em;
    }
@media print {
      .navbar,.offcanvas,.btn ,.title {
        display: none;
      }
    }
  </style>
</head>
<body class="bg-light">
  <!-- start navbar-->
  <nav class="navbar nav bg-primary">

    <div class="container-fluid">

      <div class="navbar-brand text-white">
        <span class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
          &equiv;
        </span>
        <h1 class="d-inline">
          Hai <?= session('username') ?>
        </h1>

      </div>
      <?php if (!session('username')): ?>

      <div class="nav-item">
        <a href="/login"class="class btn btn-outline-light text-white">Login</a>
      </div>
      <?php endif; ?>
    </div>
  </nav>

  <!--end navbar-->

  <!--sidebar + modal logout-->
  <?= $this->include('/template/sidebar') ?>



  <div class="px-1 py-2 title ">
    <div class="card rounded-top">
      <div class="card-body">
        <div class="row">
          <div class="col col-12 p-2 ps-5">
            <h1><?= isset($title) ? $title : '' ?></h1>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!--content -->

  <?= $this->renderSection('content') ?>

  <script src="/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
  <?= $this->renderSection('script') ?>
</body>
</html>