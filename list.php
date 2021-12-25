<?php
require "functions.php"; 

if(!isset($_SESSION["username"])){
    header("Location: login.php");
}

$ebookPerPage = 10;
$totalEbook = count(query("SELECT * FROM ebooks"));
$totalPage = ceil($totalEbook / $ebookPerPage);
$activePage = isset($_GET["page"]) ? $_GET["page"] : 1;
$index = $ebookPerPage * $activePage - $ebookPerPage;
$ebooks = query("SELECT * FROM ebooks LIMIT $index,$ebookPerPage");

if(isset($_GET["keyword"])){
    $keyword = htmlspecialchars($_GET["keyword"]);
    $totalEbook = searchEbook($keyword);
    $totalPage = ceil(count($totalEbook) / $ebookPerPage);
    $ebooks = searchEbook($keyword,$index,$ebookPerPage);
}

$totalEbook = count($ebooks);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/img/icon_ebook.png">
    <title>List eBook - eBook Apps</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" aria-label="Navigation">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img class="me-1" src="assets/img/icon_ebook.png" alt="Icon eBook"> eBook Apps
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="list.php">List eBook</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.php">Add eBook</a>
                    </li>
                </ul>
                <form class="d-flex" action="" method="get">
                    <input class="form-control me-2" id="keyword" aria-label="Search" type="search" name="keyword" placeholder="Search eBooks" autocomplete="off" value="<?php if(isset($keyword)){echo $keyword;}?>" autofocus>
                </form>
                <a class="btn btn-warning mx-lg-2 my-lg-0 mt-3 mb-2 fw-bold" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <main class="container my-4">
        <h1 class="h3 mb-4">Total Ebooks: <?= $totalEbook ?></h1>
        <?php if($totalEbook === 0) : ?>
        <div class="not-found d-flex flex-column align-items-center justify-content-center">
            <i class="bi bi-search" aria-hidden="true"></i>
            <h2 class="my-4">Oops couldn't find any ebooks!</h2>
        </div>
        <?php else: ?>
            <div class="list-ebook <?php if($totalEbook === 1 || $totalEbook === 2){echo "full-height";}?>">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-2 g-xl-3 g-2">
                    <?php foreach($ebooks as $ebook) : ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <div class="row g-0">
                                <div class="col-xl-4 text-center">
                                    <img class="img-fluid rounded-start" src="assets/img/<?= $ebook["cover"] ?>" alt="<?= $ebook["cover"] ?>">
                                </div>
                                <div class="col-xl-8">
                                    <div class="card-body">
                                        <h5 class="card-title text-center fw-bold my-2"><?= $ebook["title"] ?></h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Author: <?= $ebook["author"] ?></li>
                                        <li class="list-group-item">Category: <?= $ebook["category"] ?></li>
                                        <li class="list-group-item">Price: 
                                            <?php if($ebook["price"] === "Free") : ?>
                                            <span class="badge bg-success">Free</span>
                                            <?php else : ?>
                                            <span class="badge bg-danger">Paid</span>
                                            <?php endif; ?>
                                        </li>
                                    </ul>
                                    <div class="card-body text-center">
                                        <div class="btn-group" role="group" aria-label="Update and Delete">
                                            <a class="btn btn-sm btn-outline-success" href="update.php?id=<?= $ebook["id"] ?>">Update</a>
                                            <a class="btn btn-sm btn-outline-danger delete-ebook" href="delete.php?id=<?= $ebook["id"] ?>&cover=<?= $ebook["cover"] ?>">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if($totalEbook > 0) : ?>
        <nav class="my-4" aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item <?php if($activePage <= 1){echo "disabled";}?>">
                    <a class="page-link" href="?page=<?= $activePage - 1 ?><?php if(isset($keyword)){echo "&keyword=$keyword";}?>">Previous</a>
                </li>
                <?php for($i = 1; $i <= $totalPage; $i++) : ?>
                    <li class="page-item <?php if($i == $activePage){echo "active";}?>">
                        <a class="page-link" href="?page=<?= $i ?><?php if(isset($keyword)){echo "&keyword=$keyword";}?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?php if($activePage >= $totalPage){echo "disabled";}?>">
                    <a class="page-link" href="?page=<?= $activePage + 1 ?><?php if(isset($keyword)){echo "&keyword=$keyword";}?>">Next</a>
                </li>
            </ul>
        </nav>
        <?php endif; ?>
    </main>

    <footer class="bg-dark text-light p-4">
        <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-center">
            <div>&copy; 2021 Copyright <a class="link-warning text-decoration-none fw-bold" href="https://github.com/madfauzy" target="_blank" rel="noopener">Ahmad Fauzy</a>. All Rights Reserved.</div>
            <div>Icon made by <a class="link-warning text-decoration-none fw-bold" href="https://www.flaticon.com/authors/freepik" title="Freepik" target="_blank" rel="noopener">Freepik</a> from <a class="link-warning text-decoration-none fw-bold" href="https://www.flaticon.com/" title="Flaticon" target="_blank" rel="noopener">www.flaticon.com</a></div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js" integrity="sha256-nk6ExuG7ckFYKC1p3efjdB14TU+pnGwTra1Fnm6FvZ0=" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
    <?php if(isset($_GET["delete"])) : ?>
        <?php if($_GET["delete"] === "success") : ?>
        <script>
            Swal.fire(
                'Success!',
                'eBook has been deleted.',
                'success'
            );
        </script>
        <?php else : ?>
        <script>
            Swal.fire(
                'Error!',
                'Failed to delete eBook. Try again!',
                'error'
            );
        </script>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>