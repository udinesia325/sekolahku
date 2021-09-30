<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <meta name="theme-color" content="#0c1dff" />
  <title><?= isset($title)?$title:'' ?></title>
  <style>

    .col-form {
      margin-top: 30vh;
    }
  </style>
</head>
<body class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col col-10 col-sm-10 col-md-7 col-xl-5 card py-2 px-3 pb-5 mx-auto col-form">
        <h3 class="text-center">Daftar</h3>
        <form action="/login/daftarProses"method="post">
          <?php if (session()->getFlashData('pesan')): ?>
          <div class="form-group">
            <div class="alert alert-success alert-dismissible" id="alert">
              <span class="btn-close" data-bs-target="#alert" data-bs-dismiss="alert"></span>
              <p>
                <?= session()->getFlashData('pesan') ?>
              </p>
            </div>
          </div>
          <?php endif; ?>
          <div class="form-group">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control<?= ($valid->hasError('username'))?' is-invalid':'' ?>" id="username" name="username" value="<?= old('username') ?>">
            <div class="invalid-feedback">
              <?= $valid->getError('username') ?>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control<?= ($valid->hasError('email'))?' is-invalid':'' ?>" id="email" name="email" value="<?= old('email') ?>">
            <div class="invalid-feedback">
              <?= $valid->getError('email') ?>
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control<?= ($valid->hasError('password'))?' is-invalid':'' ?>" id="password" name="password" value="<?= old('password') ?>">
            <div class="invalid-feedback">
              <?= $valid->getError('password') ?>
            </div>
          </div>
          <button class="form-control mt-4 btn btn-primary">Daftar</button>
        </form>
        <p class="mt-3 text-center">
          belum punya akun ? <a href="/daftar" class="btn-link">Daftar</a>
        </p>
      </div>
    </div>
  </div>

  <nav class="container-fluid bg-primary fixed-bottom pt-3">
    <p class="text-center text-white">
      copyright &copy; udinesia325 <?= date('Y') ?>
    </p>
  </nav>
  <script src="/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>