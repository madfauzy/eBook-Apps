<?php
require_once 'functions.php';

checkCookieLogin();

if (isset($_SESSION['username'])) {
  header('Location: list');
  exit();
}

if (isset($_POST['signin'])) {
  if (userLogin($_POST)) {
    header('Location: list');
    exit();
  }

  $error = true;
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
  <title>Sign in to eBook Apps</title>
</head>

<body class="h-100 d-flex align-items-center py-2">
  <div class="form-sign w-100 m-auto p-4 text-center">
    <form action="" method="POST" autocomplete="off">
      <a href="home">
        <img src="assets/img/icon-ebook.png" alt="Icon eBook">
      </a>
      <h1 class="my-3 fs-3">
        Sign in to <span>eBook Apps</span>
      </h1>
      <?php if (isset($error)): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Incorrect username or password!
        <button class="btn-close" data-bs-dismiss="alert" type="button" aria-label="Close"></button>
      </div>
      <?php endif; ?>
      <div class="form-floating mb-2">
        <input class="form-control" id="username" name="username" type="text" placeholder="Username" maxlength="20" autofocus required>
        <label for="username">Username</label>
      </div>
      <div class="form-floating mb-2">
        <input class="form-control" id="password" name="password" type="password" placeholder="Password" required>
        <label for="password">Password</label>
      </div>
      <div class="form-check my-3 d-flex justify-content-center">
        <input class="form-check-input me-2" id="remember" name="remember" type="checkbox">
        <label class="form-check-label" for="remember">Remember me</label>
      </div>
      <button class="w-100 btn btn-lg btn-warning" name="signin" type="submit">Sign in</button>
      <div class="my-3">
        Not a member yet?
        <a class="link-danger text-decoration-none fw-semibold" href="signup">Create an account</a>
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
</body>

</html>
