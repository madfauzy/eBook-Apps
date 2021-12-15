<?php 
    session_start();
    
    if(isset($_SESSION["username"])){
        header("Location: index.php");
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
    <link rel="stylesheet" href="assets/css/sign.css">
    <link rel="icon" href="assets/img/logo_ebook.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Login - eBook Apps</title>
</head>
<body>
    <div class="form-sign text-center">
        <form action="" method="post">
            <img class="logo mb-3" src="assets/img/logo_ebook.png" alt="Logo eBook">
            <h1 class="h3 mb-3">Login to eBook Apps</h1>
            <div class="form-floating">
                <input class="form-control" type="text" id="username" name="username" placeholder="Username" maxlength="20" autocomplete="off" required autofocus>
                <label for="username">Username</label>
            </div>
            <div class="form-floating">
                <input class="form-control" type="password" id="password" name="password" placeholder="Password" autocomplete="off" required>
                <label for="password">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-warning mt-3" type="submit" name="login">Login</button>
            <p class="my-3">Not a member yet? <a class="link-danger text-decoration-none fw-bold" href="signup.php">Sign Up</a></p>
            <p class="mt-5 mb-3 text-muted">&copy; 2021 Copyright <a class="link-warning text-decoration-none fw-bold" href="https://github.com/madfauzy" target="_blank">Ahmad Fauzy</a></p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if(isset($_POST["login"])) : ?>
        <?php $result = userLogin($_POST) ?>
        <?php 
            if($result === "Success") :
                $_SESSION["username"] = $_POST["username"];
                header("Location: index.php");
        ?>
        <?php else : ?>
        <script>
            Swal.fire(
                'Warning!',
                'Incorrect username or password!',
                'warning'
            );
        </script>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>