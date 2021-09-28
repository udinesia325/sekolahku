<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="" content="">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
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
      <div class="col col-12 col-sm-10 col-md-7 col-xl-5 card py-2 px-3 pb-5 mx-auto col-form">
        <h3 class="text-center">Login</h3>
        <form action="/login/login"method="post">
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
          <button class="form-control mt-4 btn btn-primary">Login</button>
        </form>
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