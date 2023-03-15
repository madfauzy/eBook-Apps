<?php
require_once 'functions.php';

checkCookieLogin();

$ebookPerPage = 10;
$totalEbook = count(query('SELECT * FROM ebooks', true));
$totalPage = ceil($totalEbook / $ebookPerPage);
$activePage = $_GET['page'] ?? 1;
$index = $ebookPerPage * $activePage - $ebookPerPage;
$ebooks = query("SELECT * FROM ebooks ORDER BY id DESC LIMIT $index, $ebookPerPage", true);

if (isset($_GET['keyword'])) {
  $keyword = htmlspecialchars($_GET['keyword']);
  $totalEbook = count(searchEbook($keyword));
  $totalPage = ceil($totalEbook / $ebookPerPage);
  $ebooks = searchEbook($keyword, $index, $ebookPerPage);
}
?>
<!DOCTYPE html>
<html lang="en">

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
  <title>List eBook - eBook Apps</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
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
            <a class="nav-link" href="home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="list" aria-current="page">List eBook</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="create">Add eBook</a>
          </li>
        </ul>
        <form class="d-flex" action="" method="GET" autocomplete="off">
          <input class="form-control me-2 ms-lg-2" id="keyword" name="keyword" type="search" value="<?= isset($keyword) ? $keyword : '' ?>" placeholder="Search eBooks" onkeyup="searchEbook()" autofocus>
        </form>
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
        <div class="text-light my-3 user-select-none d-lg-none">
          Signed in as <span class="fw-bold"><?= $_SESSION['username'] ?></span>
        </div>
        <a class="btn btn-warning mb-2 fw-semibold d-lg-none" href="logout">Logout</a>
        <?php else: ?>
        <a class="btn btn-warning fw-semibold mt-3 mb-2 my-lg-0 mx-lg-2" href="login">Sign In</a>
        <?php endif; ?>
      </div>
    </div>
  </nav>

  <main class="container my-4" id="content">
    <h1 class="fs-3 <?= !isset($_SESSION['username']) || $_SESSION['role'] === 'member' ? 'mb-4' : '' ?>">Total eBooks: <?= $totalEbook ?></h1>
    <?php if ($totalEbook === 0): ?>
    <div class="not-found d-flex flex-column justify-content-center align-items-center">
      <i class="bi bi-search display-1"></i>
      <h2 class="my-4">Oops couldn't find any eBooks!</h2>
    </div>
    <?php else: ?>
    <div class="list-ebook">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-2 g-4">
        <?php foreach ($ebooks as $ebook): ?>
        <div class="col">
          <?php if (isset($_SESSION['username']) && $_SESSION['role'] === 'admin'): ?>
          <div class="text-end">
            <div class="btn-group" role="group" aria-label="Update and Delete">
              <a class="btn btn-sm btn-outline-success" href="update?id=<?= $ebook['id'] ?>">Update</a>
              <a class="btn btn-sm btn-outline-danger" href="delete?id=<?= $ebook['id'] ?>" onclick="deleteEbook(event)">Delete</a>
            </div>
          </div>
          <?php endif; ?>
          <div class="card shadow-sm">
            <div class="row g-0">
              <div class="col-xl-4 text-center m-xl-auto">
                <img class="rounded" src="assets/img/ebook/<?= $ebook['cover'] ?>" alt="Cover <?= $ebook['title'] ?>" width="185" height="260">
              </div>
              <div class="col-xl-8">
                <div class="card-body">
                  <a class="card-title link-dark text-center text-decoration-none fs-5 fw-bold line-clamp" href="<?= $ebook['link'] ?>" target="_blank" rel="noopener noreferrer"><?= $ebook['title'] ?></a>
                </div>
                <ul class="list-group list-group-flush mx-2">
                  <li class="list-group-item">Author: <?= $ebook['author'] ?></li>
                  <li class="list-group-item">Category: <?= $ebook['category'] ?></li>
                  <li class="list-group-item">Type:
                    <?php if ($ebook['type'] === 'Free'): ?>
                    <span class="badge bg-success">Free</span>
                    <?php else: ?>
                    <span class="badge bg-danger">Paid</span>
                    <?php endif; ?>
                  </li>
                  <li class="list-group-item d-flex justify-content-end align-items-center rounded-bottom">
                    <?php if ($ebook['status'] === 'Verified'): ?>
                    <span class="status">
                      <i class="bi bi-patch-check-fill text-primary"></i> Verified
                    </span>
                    <?php else: ?>
                    <span class="status">
                      <i class="bi bi-patch-exclamation-fill text-danger"></i> Unverified
                    </span>
                    <?php endif; ?>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endif; ?>

    <?php if ($totalEbook > 0): ?>
    <nav class="my-4">
      <ul class="pagination justify-content-center">
        <li class="page-item <?= $activePage <= 1 ? 'disabled' : '' ?>">
          <?php if (isset($keyword)): ?>
          <a class="page-link" href="?page=<?= $activePage - 1 ?>&keyword=<?= $keyword ?>">Previous</a>
          <?php else: ?>
          <a class="page-link" href="?page=<?= $activePage - 1 ?>">Previous</a>
          <?php endif; ?>
        </li>
        <?php for ($page = 1; $page <= $totalPage; $page++): ?>
        <li class="page-item <?= $page == $activePage ? 'active' : '' ?>">
          <?php if (isset($keyword)): ?>
          <a class="page-link" href="?page=<?= $page ?>&keyword=<?= $keyword ?>"><?= $page ?></a>
          <?php else: ?>
          <a class="page-link" href="?page=<?= $page ?>"><?= $page ?></a>
          <?php endif; ?>
        </li>
        <?php endfor; ?>
        <li class="page-item <?= $activePage >= $totalPage ? 'disabled' : '' ?>">
          <?php if (isset($keyword)): ?>
          <a class="page-link" href="?page=<?= $activePage + 1 ?>&keyword=<?= $keyword ?>">Next</a>
          <?php else: ?>
          <a class="page-link" href="?page=<?= $activePage + 1 ?>">Next</a>
          <?php endif; ?>
        </li>
      </ul>
    </nav>
    <?php endif; ?>
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.all.min.js" integrity="sha256-3A7QayeQTyaWMdcuWimEMzTIauIWscnhq/A3GfKCxiA=" crossorigin="anonymous"></script>
  <script src="assets/js/script.js"></script>
  <?php if (isset($_GET['delete'])): ?>
    <?php if ($_GET['delete'] === 'success'): ?>
    <script>
      Swal.fire('Success!', 'eBook has been deleted', 'success');
    </script>
    <?php else: ?>
    <script>
      Swal.fire('Error!', 'Failed to delete eBook. Try again!', 'error');
    </script>
    <?php endif; ?>
  <?php endif; ?>
</body>

</html>
