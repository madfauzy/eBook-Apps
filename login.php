<?php 
require "functions.php";

if(isset($_COOKIE["user_id"],$_COOKIE["user_key"])){
    $user_id = $_COOKIE["user_id"];
    $user_key = $_COOKIE["user_key"];
    $users = query("SELECT * FROM users WHERE id = $user_id")[0];
    if($user_key === hash("sha256",$users["username"])){
        $_SESSION["username"] = $users["username"];
    }
}

if(isset($_SESSION["username"])){
    header("Location: index.php");
}

if(isset($_POST["login"])){
    $result = userLogin($_POST);
    
    if($result === "Success"){
        header("Location: index.php");
    }else{
        $alert = true;
    }
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
    <link rel="stylesheet" href="assets/css/sign.css">
    <link rel="icon" href="assets/img/icon_ebook.png">
    <title>Login - eBook Apps</title>
</head>
<body>
    <div class="form-sign text-center">
        <form action="" method="post">
            <img class="icon mb-3" src="assets/img/icon_ebook.png" alt="Icon eBook">
            <h1 class="h3 mb-3">Login to eBook Apps</h1>
            <?php if(isset($alert)) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Incorrect username or password!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>
            <div class="form-floating">
                <input class="form-control" type="text" id="username" name="username" placeholder="Username" maxlength="20" autocomplete="off" required autofocus>
                <label for="username">Username</label>
            </div>
            <div class="form-floating">
                <input class="form-control" type="password" id="password" name="password" placeholder="Password" autocomplete="off" required>
                <label for="password">Password</label>
            </div>
            <div class="checkbox my-3">
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-warning" type="submit" name="login">Login</button>
            <p class="my-3">Not a member yet? <a class="link-danger text-decoration-none fw-bold" href="signup.php">Sign Up</a></p>
            <p class="mt-5 mb-3 text-muted">&copy; 2021 Copyright <a class="link-warning text-decoration-none fw-bold" href="https://github.com/madfauzy" target="_blank" rel="noopener">Ahmad Fauzy</a></p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>