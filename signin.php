<?php require "functions.php" ?>
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
    <title>Sign In - eBook Apps</title>
</head>
<body>
    <div class="form-signin text-center">
        <form action="" method="post">
            <img class="logo mb-3" src="assets/img/logo_ebook.png" alt="Logo eBook">
            <h1 class="h3 mb-3">Please Sign In</h1>
            <div class="form-floating">
                <input class="form-control" type="text" id="username" name="username" placeholder="Username" maxlength="20" autocomplete="off" required autofocus>
                <label for="username">Username</label>
            </div>
            <div class="form-floating">
                <input class="form-control" type="password" id="password" name="password" placeholder="Password" autocomplete="off" required>
                <label for="password">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-warning mt-3" type="submit" name="signin">Sign In</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2021 Copyright eBook Apps</p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if(isset($_POST["signin"])) : ?>
        <?php $result = userSignIn($_POST) ?>
        <?php if($result === "UsernameDoesNotExist") : ?>
        <script>
            Swal.fire(
                'Warning!',
                'Username Doesn\'t Exist!',
                'warning'
            );
        </script>
        <?php elseif($result === "Success") : ?>
        <script>
            let timerInterval
            Swal.fire({
                title: 'Login successfully!',
                html: '<b>You Will Be Redirected!</b>',
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
                    window.location.href = 'index.php';
                }
            });
        </script>
        <?php else : ?>
        <script>
            Swal.fire(
                'Warning!',
                'Wrong Password!',
                'warning'
            );
        </script>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>