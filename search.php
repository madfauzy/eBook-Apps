<?php
require_once 'functions.php';

checkCookieLogin();

$keyword = htmlspecialchars($_GET['keyword']);
$ebookPerPage = 10;
$totalEbook = count(searchEbook($keyword));
$totalPage = ceil($totalEbook / $ebookPerPage);
$activePage = $_GET['page'] ?? 1;
$index = $ebookPerPage * $activePage - $ebookPerPage;
$ebooks = searchEbook($keyword, $index, $ebookPerPage);
?>
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
