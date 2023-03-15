<?php
require_once 'functions.php';

checkCookieLogin();
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
  <title>Home - eBook Apps</title>
</head>

<body class="h-100 d-flex flex-column text-light bg-dark">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="home">
        <img class="me-1" src="assets/img/icon-ebook.png" alt="Icon eBook"> eBook Apps
      </a>
      <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav" type="button" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="home" aria-current="page">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="list">List eBook</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="create">Add eBook</a>
          </li>
        </ul>
        <?php if (isset($_SESSION['username'])): ?>
        <div class="dropdown d-none d-lg-block">
          <img class="btn dropdown-toggle p-0" data-bs-toggle="dropdown" src="assets/img/icon-user.png" alt="Icon User" aria-expanded="false">
          <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
            <li>
              <button class="dropdown-item user-select-none pe-auto" type="button">
                Signed in as <span class="fw-bold"><?= $_SESSION['username'] ?></span>
              </button>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item link-warning fw-semibold" href="logout">Logout</a>
            </li>
          </ul>
        </div>
        <div class="text-light mb-3 user-select-none d-lg-none">
          Signed in as <span class="fw-bold"><?= $_SESSION['username'] ?></span>
        </div>
        <a class="btn btn-warning mb-2 fw-semibold d-lg-none" href="logout">Logout</a>
        <?php else: ?>
        <a class="btn btn-warning fw-semibold mb-2 my-lg-0 mx-lg-2" href="login">Sign In</a>
        <?php endif; ?>
      </div>
    </div>
  </nav>

  <main class="container text-center my-auto">
    <div class="col-md-10 col-lg-8 col-xl-6 mx-auto">
      <h1 class="fw-bold">Getting Started</h1>
      <p class="lead">
        The eBook Apps is a web application that helps you browse ebooks from anywhere using your smartphone and laptop.
        <span class="fw-semibold">Sign Up to become a member</span>
      </p>
      <p class="lead">
        <a class="btn btn-lg btn-secondary link-dark fw-semibold bg-white" href="signup">Sign Up</a>
      </p>
    </div>
  </main>

  <footer class="bg-dark text-light px-0 py-4 p-sm-4">
    <div class="container d-flex justify-content-between align-items-center flex-column flex-md-row">
      <div>
        &copy; <?= date('Y') ?> Created by
        <a class="link-warning text-decoration-none fw-semibold" href="https://github.com/madfauzy" target="_blank" rel="noopener noreferrer">
          <i class="bi bi-balloon-heart-fill text-warning"></i> Ahmad Fauzy
        </a>
      </div>
      <div>
        eBook Icons Created by
        <a class="link-warning text-decoration-none fw-semibold" href="https://flaticon.com/free-icons/ebook" target="_blank" rel="noopener noreferrer">Freepik - Flaticon</a>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
