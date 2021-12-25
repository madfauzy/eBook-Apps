<?php require "functions.php" ?>
<!DOCTYPE html>
<html lang="en" class="h-100">
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
    <title>Home - eBook Apps</title>
</head>
<body class="d-flex h-100 flex-column text-light bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark mb-auto" aria-label="Navigation">
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
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list.php">List eBook</a>
                    </li>
                    <?php if(isset($_SESSION["username"])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="create.php">Add eBook</a>
                    </li>
                    <?php endif; ?>
                </ul>
                <?php if(isset($_SESSION["username"])) : ?>
                    <a class="btn btn-warning mx-lg-2 my-lg-0 mt-3 mb-2 fw-bold" href="logout.php">Logout</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <main class="container text-center">
        <div class="col col-lg-6 mx-auto">
            <h1>Getting Started</h1>
            <p class="lead">The eBook Apps is a web application that helps you browse ebooks from anywhere using your smartphone, laptop, and computer. <span class="fw-bold">Sign Up to become a member</span></p>
            <p class="lead">
                <a class="btn btn-lg btn-secondary fw-bold bg-white text-dark" href="signup.php">Sign Up</a>
            </p>
        </div>
    </main>
    
    <footer class="mt-auto text-light p-4">
        <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-center">
            <div>&copy; 2021 Copyright <a class="link-warning text-decoration-none fw-bold" href="https://github.com/madfauzy" target="_blank" rel="noopener">Ahmad Fauzy</a>. All Rights Reserved.</div>
            <div>Icon made by <a class="link-warning text-decoration-none fw-bold" href="https://www.flaticon.com/authors/freepik" title="Freepik" target="_blank" rel="noopener">Freepik</a> from <a class="link-warning text-decoration-none fw-bold" href="https://www.flaticon.com/" title="Flaticon" target="_blank" rel="noopener">www.flaticon.com</a></div>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>