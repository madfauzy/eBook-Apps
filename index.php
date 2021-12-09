<?php 
    require "functions.php";

    $ebooks = query("SELECT * FROM ebooks");

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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/img/logo_ebook.png">
    <title>eBook Apps</title>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark position-sticky sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="assets/img/logo_ebook.png" alt="Logo eBook"> eBook Apps
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <!-- TODO: Buat List eBook -->
                        <a class="nav-link" href="#">List eBook</a>
                    </li>
                    <li class="nav-item">
                        <!-- TODO: Buat Add eBook -->
                        <a class="nav-link" href="#">Add eBook</a>
                    </li>
                </ul>
                <form class="d-flex" action="" method="post">
                    <!-- TODO: Buat Search eBook -->
                    <input class="form-control me-2" aria-label="Search" type="search" name="keyword" placeholder="Search eBooks" autocomplete="off" autofocus>
                    <button class="btn btn-warning" type="submit" name="search">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <h1 class="h3 mb-4">Total Ebooks: <?= $totalEbook ?></h1>
        <?php if($totalEbook === 0) : ?>
        <div class="text-center my-5 py-5">
            <i class="bi bi-search display-1"></i>
            <h3 class="my-5 py-1">Oops couldn't find any ebooks!</h3>
        </div>
        <?php endif; ?>
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
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div class="btn-group m-auto" role="group" aria-label="Update and Delete">
                                    <!-- TODO: Buat Update eBook -->
                                    <a class="btn btn-sm btn-outline-success" href="#">Update</a>
                                    <!-- TODO: Buat Delete eBook -->
                                    <a class="btn btn-sm btn-outline-danger delete-ebook" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <footer>
        <div class="text-center text-light p-4 bg-dark">© 2021 Copyright eBook Apps. All Rights Reserved.</div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>