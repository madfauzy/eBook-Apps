<?php 
    require "functions.php";
    
    if(isset($_POST["signup"])){
        $result = userSignUp($_POST);
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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/sign.css">
    <link rel="icon" href="assets/img/logo_ebook.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Sign Up - eBook Apps</title>
</head>
<body>
    <div class="form-sign text-center">
        <form action="" method="post">
            <img class="logo mb-3" src="assets/img/logo_ebook.png" alt="Logo eBook">
            <h1 class="h3 mb-3">Please Sign Up</h1>
            <?php if(isset($result)) : ?>
                <?php if($result === "Empty") : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Invalid username or password!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php elseif($result === "UsernameAlreadyExist") : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username already exist!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php elseif($result === "WrongPassword") : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Incorrect confirm password!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php elseif($result > 0) : ?>
                <?php $success = true; ?>
                <?php else : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Failed to sign up. Try again!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
            <?php endif; ?>
            <div class="form-floating">
                <input class="form-control" type="text" id="username" name="username" placeholder="Username" maxlength="20" autocomplete="off" required autofocus>
                <label for="username">Username</label>
            </div>
            <div class="form-floating">
                <input class="form-control" type="password" id="password" name="password" placeholder="Password" autocomplete="off" required>
                <label for="password">Password</label>
            </div>
            <div class="form-floating">
                <input class="form-control" type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" autocomplete="off" required>
                <label for="confirmPassword">Confirm Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-warning mt-3" type="submit" name="signup">Sign Up</button>
            <p class="my-3">Already have an account? <a class="link-danger text-decoration-none fw-bold" href="login.php">Sign In</a></p>
            <p class="mt-5 mb-3 text-muted">&copy; 2021 Copyright <a class="link-warning text-decoration-none fw-bold" href="https://github.com/madfauzy" target="_blank">Ahmad Fauzy</a></p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if(isset($success)) : ?>
    <script>
        let timerInterval
        Swal.fire({
            title: 'Success!',
            html: 'You Will Be Redirected!',
            icon: 'success',
            allowOutsideClick: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
                window.location.href = 'login.php';
            }
        });
    </script>
    <?php endif; ?>
</body>
</html>