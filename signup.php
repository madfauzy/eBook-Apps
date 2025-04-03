<?php
require_once 'functions.php';

if (isset($_POST['signup'])) {
    $result = userSignUp($_POST);
}
?>
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/img/favicon/apple-touch-icon.png" rel="apple-touch-icon" sizes="180x180">
  <link type="image/png" href="assets/img/favicon/favicon-32x32.png" rel="icon" sizes="32x32">
  <link type="image/png" href="assets/img/favicon/favicon-16x16.png" rel="icon" sizes="16x16">
  <link href="assets/img/favicon/site.webmanifest" rel="manifest">
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <title>Join eBook Apps</title>
</head>

<body class="h-100 d-flex align-items-center py-2">
  <div class="form-sign w-100 m-auto p-4 text-center">
    <form action="" method="POST" autocomplete="off">
      <a href="home">
        <img src="assets/img/icon-ebook.png" alt="Icon eBook">
      </a>
      <h1 class="my-3 fs-3">Create an account</h1>
      <?php if (isset($result['error'])): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $result['message'] ?>
        <button class="btn-close" data-bs-dismiss="alert" type="button" aria-label="Close"></button>
      </div>
      <?php endif; ?>
      <div class="form-floating mb-2">
        <input class="form-control" id="username" name="username" type="text" placeholder="Username" maxlength="20" onkeyup="validateSignUp()" autofocus required>
        <label for="username">Username</label>
        <div class="invalid-feedback text-start">
          Please choose a username.
        </div>
      </div>
      <div class="form-floating mb-2">
        <input class="form-control" id="password" name="password" type="password" placeholder="Password" onkeyup="validateSignUp()" required>
        <label for="password">Password</label>
        <div class="invalid-feedback text-start">
          Password must be at least 8 characters long
        </div>
      </div>
      <div class="form-floating mb-2">
        <input class="form-control" id="confirmPassword" name="confirmPassword" type="password" placeholder="Confirm Password" onkeyup="validateSignUp()" required>
        <label for="confirmPassword">Confirm Password</label>
        <div class="invalid-feedback text-start">
          Password didn't match
        </div>
      </div>
      <div class="form-check my-3 d-flex justify-content-center">
        <input class="form-check-input me-2" id="show" name="show" type="checkbox" onclick="showPassword()">
        <label class="form-check-label" for="show">Show Password</label>
      </div>
      <button class="w-100 btn btn-lg btn-warning" name="signup" type="submit">Sign up</button>
      <div class="my-3">
        Already have an account?
        <a class="link-danger text-decoration-none fw-bold" href="login">Sign in</a>
      </div>
      <div class="mt-5 text-muted">
        &copy; <?= date('Y') ?> Created by
        <a class="link-warning text-decoration-none fw-bold" href="https://github.com/madfauzy" target="_blank" rel="noopener noreferrer">
          <i class="bi bi-balloon-heart-fill text-warning"></i> Ahmad Fauzy
        </a>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.all.min.js" integrity="sha256-3A7QayeQTyaWMdcuWimEMzTIauIWscnhq/A3GfKCxiA=" crossorigin="anonymous"></script>
  <script src="assets/js/script.js"></script>
  <?php if (isset($result['success'])): ?>
  <script>
    let timerInterval;
    Swal.fire({
      title: 'Success!',
      html: 'You Will Be Redirected!',
      icon: 'success',
      allowOutsideClick: false,
      timer: 2000,
      timerProgressBar: true,
      didOpen: () => {
        Swal.showLoading();
      },
      willClose: () => {
        clearInterval(timerInterval);
      },
    }).then((result) => {
      if (result.dismiss === Swal.DismissReason.timer) {
        window.location.href = 'login';
      }
    });
  </script>
  <?php endif; ?>
</body>

</html>
