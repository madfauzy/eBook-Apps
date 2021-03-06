<?php 
require "functions.php";
    
if(!isset($_SESSION["username"])){
    header("Location: login.php");
}
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
    <title>Add eBook - eBook Apps</title>
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
                        <a class="nav-link" href="list.php">List eBook</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="create.php">Add eBook</a>
                    </li>
                </ul>
                <div class="text-light mb-lg-0 mb-3 me-2">Signed in as <strong><?= $_SESSION["username"]; ?></strong></div>
                <a class="btn btn-warning mx-lg-2 my-lg-0 mb-2 fw-bold" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <main class="container text-md-center my-4 p-4">
        <h1 class="fs-3 fw-bold text-center">Add eBook</h1>
        <p class="text-center">Add your favorite eBook now.</p>
        <hr>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <label class="col-md-2 col-form-label" for="title">Title</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" id="title" name="title" autocomplete="off" placeholder="Tutorial Programming" required autofocus>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label" for="author">Author</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" id="author" name="author" autocomplete="off" placeholder="Anonymous" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label" for="category">Category</label>
                <div class="col-md-10">
                    <select class="form-select" aria-label="category" id="category" name="category">
                        <option value="Artificial Intelligence">Artificial Intelligence</option>
                        <option value="Cyber Security">Cyber Security</option>
                        <option value="Data Science">Data Science</option>
                        <option value="Design">Design</option>
                        <option value="Development">Development</option>
                        <option value="IT & Software">IT & Software</option>
                        <option value="Machine Learning">Machine Learning</option>
                        <option value="Programming Languages">Programming Languages</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3 align-items-center">
                <label class="col-md-2 col-form-label">Price</label>
                <div class="col-md-10 text-start">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="price" id="free" value="Free" checked>
                        <label class="form-check-label" for="free">Free</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="price" id="paid" value="Paid">
                        <label class="form-check-label" for="paid">Paid</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label" for="link">Link</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" id="link" name="link" autocomplete="off" placeholder="https://www." required>
                </div>
            </div>
            <div class="row mb-3 align-items-center">
                <label class="col-md-2 col-form-label" for="cover">Cover</label>
                <div class="col-md-10">
                    <div class="form-text text-md-end" id="coverInfo">Maximum File Size: 1 MB, Format File: jpg, jpeg, png</div>
                    <input class="form-control" aria-describedby="coverInfo" type="file" id="cover" name="cover" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12 text-center">
                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                </div>
            </div>
        </form>
    </main> 

    <footer class="bg-dark text-light p-sm-4 py-4 px-0">
        <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-center">
            <div>&copy; 2022 Copyright <a class="link-warning text-decoration-none fw-bold" href="https://github.com/madfauzy" target="_blank" rel="noopener">Ahmad Fauzy</a>. All Rights Reserved.</div>
            <div>Icon made by <a class="link-warning text-decoration-none fw-bold" href="https://www.flaticon.com/authors/freepik" title="Freepik" target="_blank" rel="noopener">Freepik</a> from <a class="link-warning text-decoration-none fw-bold" href="https://www.flaticon.com/" title="Flaticon" target="_blank" rel="noopener">www.flaticon.com</a></div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js" integrity="sha256-nk6ExuG7ckFYKC1p3efjdB14TU+pnGwTra1Fnm6FvZ0=" crossorigin="anonymous"></script>
    <?php if(isset($_POST["submit"])) : ?>
        <?php $result = addEbook($_POST); ?>
        <?php if($result === "InvalidExtension") : ?>
        <script>
            Swal.fire(
                'Invalid Extension!',
                'Supported Extensions: jpg, jpeg, and png.',
                'warning'
            );
        </script>
        <?php elseif($result === "SizeTooBig") : ?>
        <script>
            Swal.fire(
                'Size Too Big!',
                'Max File Size: 1 MB.',
                'warning'
            );
        </script>
        <?php elseif($result > 0) : ?>
        <script>
            Swal.fire(
                'Success!',
                'eBook has been added.',
                'success'
            );
        </script>
        <?php else : ?>
        <script>
            Swal.fire(
                'Error!',
                'Failed to add eBook. Try again!',
                'error'
            );
        </script>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>