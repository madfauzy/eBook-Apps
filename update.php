<?php
require_once 'functions.php';

checkCookieLogin();
checkUserLogin();
checkUserRole();
checkUrlId();

$id = $_GET['id'];
$ebook = query("SELECT * FROM ebooks WHERE id = $id");
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
  <title>Update eBook - eBook Apps</title>
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
            <a class="nav-link" href="list">List eBook</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="create">Add eBook</a>
          </li>
        </ul>
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
      </div>
    </div>
  </nav>

  <main class="container my-3 p-3 px-lg-5">
    <h1 class="text-center fs-3 fw-bold">Update eBook</h1>
    <h2 class="text-center fs-6 mb-4">Please enter the required information below</h2>
    <form class="row justify-content-center" action="" method="POST" enctype="multipart/form-data" autocomplete="off">
      <div class="col-md-3 text-center">
        <figure class="figure">
          <img class="figure-img img-thumbnail" src="assets/img/ebook/<?= $ebook['cover'] ?>" alt="Cover <?= $ebook['title'] ?>">
          <figcaption class="figure-caption">
            <input class="form-control-plaintext text-center" id="oldCover" name="oldCover" type="text" value="<?= $ebook['cover'] ?>" required readonly>
          </figcaption>
        </figure>
      </div>
      <div class="col-md-9">
        <div class="row g-3">
          <div class="col-md-2">
            <label class="form-label" for="id">ID</label>
            <input class="form-control" id="id" name="id" type="text" value="<?= $ebook['id'] ?>" required readonly>
          </div>
          <div class="col-md-10">
            <label class="form-label" for="title">Title</label>
            <input class="form-control" id="title" name="title" type="text" value="<?= $ebook['title'] ?>" maxlength="255" autofocus required>
          </div>
          <div class="col-md-6">
            <label class="form-label" for="author">Author</label>
            <input class="form-control" id="author" name="author" type="text" value="<?= $ebook['author'] ?>" maxlength="100" required>
          </div>
          <div class="col-md-6">
            <label class="form-label" for="category">Category</label>
            <select class="form-select" id="category" name="category">
              <option <?= $ebook['category'] === 'Artificial Intelligence' ? 'selected' : '' ?> value="Artificial Intelligence">Artificial Intelligence</option>
              <option <?= $ebook['category'] === 'Computer Science' ? 'selected' : '' ?> value="Computer Science">Computer Science</option>
              <option <?= $ebook['category'] === 'Cyber Security' ? 'selected' : '' ?> value="Cyber Security">Cyber Security</option>
              <option <?= $ebook['category'] === 'Data Science' ? 'selected' : '' ?> value="Data Science">Data Science</option>
              <option <?= $ebook['category'] === 'Design' ? 'selected' : '' ?> value="Design">Design</option>
              <option <?= $ebook['category'] === 'Development' ? 'selected' : '' ?> value="Development">Development</option>
              <option <?= $ebook['category'] === 'IT and Software' ? 'selected' : '' ?> value="IT and Software">IT and Software</option>
              <option <?= $ebook['category'] === 'Machine Learning' ? 'selected' : '' ?> value="Machine Learning">Machine Learning</option>
              <option <?= $ebook['category'] === 'Network and Security' ? 'selected' : '' ?> value="Network and Security">Network and Security</option>
              <option <?= $ebook['category'] === 'Operating System' ? 'selected' : '' ?> value="Operating System">Operating System</option>
              <option <?= $ebook['category'] === 'Programming Languages' ? 'selected' : '' ?> value="Programming Languages">Programming Languages</option>
              <option <?= $ebook['category'] === 'Others' ? 'selected' : '' ?> value="Others">Others</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label" for="link">Link</label>
            <input class="form-control" id="link" name="link" type="text" value="<?= $ebook['link'] ?>" maxlength="255" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Type</label>
            <div class="row align-items-center mt-md-2">
              <div class="col-2 form-check form-check-inline ms-3">
                <input class="form-check-input" id="free" name="type" type="radio" <?= $ebook['type'] === 'Free' ? 'checked' : '' ?> value="Free">
                <label class="form-check-label" for="free">Free</label>
              </div>
              <div class="col-2 form-check form-check-inline">
                <input class="form-check-input" id="paid" name="type" type="radio" <?= $ebook['type'] === 'Paid' ? 'checked' : '' ?> value="Paid">
                <label class="form-check-label" for="paid">Paid</label>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <label class="form-label" for="cover">
              Cover <span class="fw-light">(Optional)</span>
            </label>
            <input class="form-control" id="cover" name="cover" type="file" accept=".jpg, .jpeg, .png" onchange="validateUploadCover()">
            <div class="form-text" id="coverInfo">Maximum File Size: 1 MB, Format File: jpg, jpeg, png</div>
          </div>
          <div class="col-md-6">
            <label class="form-label">Status</label>
            <div class="row align-items-center mt-md-2">
              <div class="col-3 form-check form-check-inline ms-3">
                <input class="form-check-input" id="verified" name="status" type="radio" <?= $ebook['status'] === 'Verified' ? 'checked' : '' ?> value="Verified">
                <label class="form-check-label" for="verified">Verified</label>
              </div>
              <div class="col-3 form-check form-check-inline">
                <input class="form-check-input" id="unverified" name="status" type="radio" <?= $ebook['status'] === 'Unverified' ? 'checked' : '' ?> value="Unverified">
                <label class="form-check-label" for="unverified">Unverified</label>
              </div>
            </div>
          </div>
          <div class="col-md-12 mt-4 text-center">
            <button class="btn btn-warning fw-semibold" name="submit" type="submit">Submit</button>
          </div>
        </div>
      </div>
    </form>
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
  <?php if (isset($_POST["submit"])): ?>
    <?php $result = updateEbook($_POST); ?>
    <?php if ($result > 0): ?>
    <script>
      let timerInterval;
      Swal.fire({
        title: 'Success!',
        html: 'eBook has been updated. <b>Wait a second!</b>',
        icon: 'success',
        allowOutsideClick: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: () => {
          Swal.showLoading();
        },
        willClose: () => {
          clearInterval(timerInterval);
        },
      }).then((result) => {
        if (result.dismiss === Swal.DismissReason.timer) {
          window.location.href = window.location.href;
        }
      });
    </script>
    <?php elseif ($result === 0): ?>
    <script>
      Swal.fire('No Updates!', 'Data eBook not changed', 'warning');
    </script>
    <?php else: ?>
    <script>
      Swal.fire('Error!', 'Failed to update eBook. Try again!', 'error');
    </script>
    <?php endif; ?>
  <?php endif; ?>
</body>

</html>
