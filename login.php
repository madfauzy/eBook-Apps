<?php 
require "functions.php";

if(isset($_COOKIE["user_id"],$_COOKIE["user_key"])){
    $user_id = $_COOKIE["user_id"];
    $user_key = $_COOKIE["user_key"];
    $users = query("SELECT * FROM users WHERE id = $user_id")[0];

    if($user_key === hash("sha256",$users["username"])){
        $_SESSION["username"] = $users["username"];
        $_SESSION["level"] = $users["level"];
    }
}

if(isset($_SESSION["username"])){
    header("Location: list.php");
}

if(isset($_POST["login"])){
    $result = userLogin($_POST);
    
    if($result === "Success"){
        header("Location: list.php");
    }else{
        $alert = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <?php require "template/head.php"; ?>
    <link rel="stylesheet" href="assets/css/sign.css">
    <title>Login - eBook Apps</title>
</head>
<body class="h-100 align-items-center py-5">
    <div class="form-sign">
        <form action="" method="post">
            <a href="index.php">
                <img class="icon" src="assets/img/icon_ebook.png" alt="Icon eBook">
            </a>
            <h1 class="fs-3 my-3">Login to <span>eBook Apps</span></h1>
            <?php if(isset($alert)) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Incorrect username or password!
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
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
            <div class="checkbox mt-3">
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-warning my-3" type="submit" name="login">Login</button>
            <p>Not a member yet? <a class="link-danger text-decoration-none fw-bold" href="signup.php">Sign Up</a></p>
            <p class="mt-5 mb-3 text-muted">&copy; 2022 Copyright <a class="link-warning text-decoration-none fw-bold" href="https://github.com/madfauzy" target="_blank" rel="noopener">Ahmad Fauzy</a></p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>