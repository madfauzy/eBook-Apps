<?php 
    session_start();
        
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
    }
    
    require "functions.php";
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Add eBook - eBook Apps</title>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img class="me-1" src="assets/img/logo_ebook.png" alt="Logo eBook"> eBook Apps
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
                        <!-- TODO: Buat List eBook -->
                        <a class="nav-link" href="#">List eBook</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="create.php">Add eBook</a>
                    </li>
                </ul>
                <a class="btn btn-danger mx-2 my-lg-0 my-2 fw-bold" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <main class="container text-md-center my-4 p-4">
        <h1 class="h3 fw-bold text-center">Add eBook</h1>
        <p class="text-center">Add your favorite eBook now.</p>
        <hr>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <label class="col-md-2 col-form-label" for="title">Title</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" id="title" name="title" maxlength="100" autocomplete="off" required autofocus>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label" for="author">Author</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" id="author" name="author" maxlength="100" autocomplete="off" required>
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

    <footer>
        <div class="text-center text-light p-4 bg-dark">© 2021 Copyright eBook Apps. All Rights Reserved.</div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if(isset($_POST["submit"])) : ?>
        <?php $result = addEbook($_POST) ?>
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
                'Max File Size: 1MB.',
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