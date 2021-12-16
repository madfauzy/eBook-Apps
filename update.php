<?php 
    require "functions.php";

    if(!isset($_SESSION["username"])){
        header("Location: login.php");
    }

    $id = $_GET["id"];

    $ebooks = query("SELECT * FROM ebooks WHERE id = $id")[0];
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
    <title>Update eBook - eBook Apps</title>
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
                        <a class="nav-link" href="create.php">Add eBook</a>
                    </li>
                </ul>
                <a class="btn btn-danger mx-2 my-lg-0 my-2 fw-bold" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <main class="container my-4 p-4">
        <h1 class="h3 fw-bold text-center">Update eBook</h1>
        <p class="text-center">Update your favorite eBook now.</p>
        <hr>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-3 text-center">
                    <figure class="figure">
                        <img class="figure-img img-thumbnail" src="assets/img/<?= $ebooks["cover"] ?>" alt="<?= $ebooks["cover"] ?>">
                        <figcaption class="figure-caption">
                            <input class="form-control-plaintext" type="text" name="oldCover" value="<?= $ebooks["cover"] ?>" readonly>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-9">
                    <div class="mb-3">
                        <label class="form-label" for="id">ID</label>
                        <input class="form-control" type="text" id="id" name="id" value="<?= $ebooks["id"] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="title">Title</label>
                        <input class="form-control" type="text" id="title" name="title" value="<?= $ebooks["title"] ?>" maxlength="100" autocomplete="off" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="author">Author</label>
                        <input class="form-control" type="text" id="author" name="author" value="<?= $ebooks["author"] ?>" maxlength="100" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="category">Category</label>
                        <select class="form-select" aria-label="category" id="category" name="category">
                            <option <?php if($ebooks["category"] === "Artificial Intelligence") echo "selected" ?> value="Artificial Intelligence">Artificial Intelligence</option>
                            <option <?php if($ebooks["category"] === "Cyber Security") echo "selected" ?> value="Cyber Security">Cyber Security</option>
                            <option <?php if($ebooks["category"] === "Data Science") echo "selected" ?> value="Data Science">Data Science</option>
                            <option <?php if($ebooks["category"] === "Design") echo "selected" ?> value="Design">Design</option>
                            <option <?php if($ebooks["category"] === "Development") echo "selected" ?> value="Development">Development</option>
                            <option <?php if($ebooks["category"] === "IT & Software") echo "selected" ?> value="IT & Software">IT & Software</option>
                            <option <?php if($ebooks["category"] === "Machine Learning") echo "selected" ?> value="Machine Learning">Machine Learning</option>
                            <option <?php if($ebooks["category"] === "Programming Languages") echo "selected" ?> value="Programming Languages">Programming Languages</option>
                            <option <?php if($ebooks["category"] === "Others") echo "selected" ?> value="Others">Others</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="price" id="free" <?php if($ebooks["price"] === "Free") echo "checked" ?> value="Free">
                            <label class="form-check-label" for="free">Free</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="price" id="paid" <?php if($ebooks["price"] === "Paid") echo "checked" ?> value="Paid">
                            <label class="form-check-label" for="paid">Paid</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="cover">Cover</label>
                        <div class="form-text text-md-end" id="coverInfo">Maximum File Size: 1 MB, Format File: jpg, jpeg, png</div>
                        <input class="form-control" aria-describedby="coverInfo" type="file" id="cover" name="cover">
                    </div>
                    <div class="mb-3 text-center">
                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </main> 

    <footer>
        <div class="text-center text-light p-4 bg-dark">&copy; 2021 Copyright <a class="link-warning text-decoration-none fw-bold" href="https://github.com/madfauzy" target="_blank">Ahmad Fauzy</a>. All Rights Reserved.</div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if(isset($_POST["submit"])) : ?>
        <?php $result = updateEbook($_POST) ?>
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
            let timerInterval
            Swal.fire({
                title: 'Success!',
                html: 'eBook has been updated. <b>Wait a second!</b>',
                icon: 'success',
                allowOutsideClick: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    window.location.href = window.location.href;
                }
            });
        </script>
        <?php elseif($result === 0) : ?>
        <script>
            Swal.fire(
                'No Updates!',
                'Data eBook not changed.',
                'warning'
            );
        </script>
        <?php else : ?>
        <script>
            Swal.fire(
                'Error!',
                'Failed to update eBook. Try again!',
                'error'
            );
        </script>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>