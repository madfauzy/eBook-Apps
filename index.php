<?php require "functions.php"; ?>
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <?php require "template/head.php"; ?>
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
                <div class="text-white mb-lg-0 mb-3">Signed in as <strong><?= $_SESSION["username"]; ?></strong></div>
                <a class="btn btn-warning mx-lg-2 my-lg-0 mb-2 fw-bold" href="logout.php">Logout</a>
                <?php else : ?>
                <a class="btn btn-warning mx-lg-2 my-lg-0 mb-2 fw-bold" href="login.php">Sign In</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <main class="container text-center">
        <div class="col col-md-10 col-lg-8 col-xl-6 mx-auto">
            <h1>Getting Started</h1>
            <p class="lead">The eBook Apps is a web application that helps you browse ebooks from anywhere using your smartphone and laptop. <span class="fw-bold">Sign Up to become a member</span></p>
            <p class="lead">
                <a class="btn btn-lg btn-secondary fw-bold bg-white text-dark" href="signup.php">Sign Up</a>
            </p>
        </div>
    </main>
    
    <footer class="mt-auto text-light p-sm-4 py-4 px-0">
        <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-center">
            <div>&copy; 2022 Copyright <a class="link-warning text-decoration-none fw-bold" href="https://github.com/madfauzy" target="_blank" rel="noopener">Ahmad Fauzy</a>. All Rights Reserved.</div>
            <div>Icon made by <a class="link-warning text-decoration-none fw-bold" href="https://www.flaticon.com/authors/freepik" title="Freepik" target="_blank" rel="noopener">Freepik</a> from <a class="link-warning text-decoration-none fw-bold" href="https://www.flaticon.com/" title="Flaticon" target="_blank" rel="noopener">www.flaticon.com</a></div>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>