<?php

session_start();
mysqli_report(MYSQLI_REPORT_OFF);

function connect()
{
    return mysqli_connect('localhost', 'root', '', 'ebookapps');
}

function query($query, $associative = false)
{
    $conn = connect();
    $result = mysqli_query($conn, $query);

    if ($associative) {
        $rows = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    return mysqli_fetch_assoc($result);
}

function addEbook($ebook)
{
    $conn = connect();
    $username = $_SESSION['username'];
    $title = htmlspecialchars($ebook['title']);
    $author = htmlspecialchars($ebook['author']);
    $category = htmlspecialchars($ebook['category']);
    $type = htmlspecialchars($ebook['type']);
    $link = htmlspecialchars($ebook['link']);
    $cover = uploadCover();

    if (empty($title) || empty($author) || empty($category) || empty($type) || empty($link)) {
        return false;
    }

    if (is_null($cover)) {
        $cover = 'default-cover.jpg';
    } elseif ($cover === false) {
        return false;
    }

    if (!filter_var($link, FILTER_VALIDATE_URL)) {
        $link = "https://$link";
    } else {
        $link = str_replace('http://', 'https://', $link);
    }

    mysqli_query($conn, "INSERT INTO ebooks (added_by, title, author, category, type, link, cover) VALUES ('$username', '$title', '$author', '$category', '$type', '$link', '$cover')");

    if (mysqli_affected_rows($conn) < 0 && $cover !== 'default-cover.jpg') {
        unlink("assets/img/ebook/$cover");
    }

    return mysqli_affected_rows($conn);
}

function uploadCover()
{
    $coverName = $_FILES['cover']['name'];
    $coverType = $_FILES['cover']['type'];
    $coverTmpName = $_FILES['cover']['tmp_name'];
    $coverError = $_FILES['cover']['error'];
    $coverSize = $_FILES['cover']['size'];

    if ($coverError === 4) {
        return null;
    }

    $coverExtension = strtolower(pathinfo($coverName, PATHINFO_EXTENSION));
    $allowedExtensions = ['jpg', 'jpeg', 'png'];

    if (!in_array($coverExtension, $allowedExtensions)) {
        return false;
    }

    if ($coverType !== 'image/jpeg' && $coverType !== 'image/png') {
        return false;
    }

    if ($coverSize > 1048576) {
        return false;
    }

    $newId = getNewId();

    if ($newId < 10) {
        $newCoverName = 'IMG-' . date('dmY') . "-EA00$newId.$coverExtension";
    } elseif ($newId < 100) {
        $newCoverName = 'IMG-' . date('dmY') . "-EA0$newId.$coverExtension";
    } else {
        $newCoverName = 'IMG-' . date('dmY') . "-EA$newId.$coverExtension";
    }

    $pathFile = "assets/img/ebook/$newCoverName";

    if (file_exists($pathFile)) {
        return false;
    }

    move_uploaded_file($coverTmpName, $pathFile);

    return $newCoverName;
}

function getNewId()
{
    $ebooks = query('SELECT cover FROM ebooks ORDER BY id DESC', true);

    if (!empty($ebooks)) {
        foreach ($ebooks as $ebook) {
            if (strpos($ebook['cover'], 'IMG') !== false) {
                $cover = $ebook['cover'];
                break;
            } else {
                $cover = '';
            }
        }

        $cover = explode('-', $cover);
        $coverDate = $cover[1] ?? null;
        $coverId = $cover[2] ?? null;

        if ($coverDate === date('dmY')) {
            $newId = (int)explode('EA', $coverId)[1];
            $newId += 1;
        } else {
            $newId = 1;
        }
    } else {
        $newId = 1;
    }

    return $newId;
}

function deleteEbook($ebook)
{
    $conn = connect();
    $id = htmlspecialchars($ebook['id']);
    $cover = query("SELECT cover FROM ebooks WHERE id = $id")['cover'];

    mysqli_query($conn, "DELETE FROM ebooks WHERE id = $id");

    if (mysqli_affected_rows($conn) > 0 && $cover !== 'default-cover.jpg') {
        unlink("assets/img/ebook/$cover");
    }

    return mysqli_affected_rows($conn);
}

function updateEbook($ebook)
{
    $conn = connect();
    $id = htmlspecialchars($ebook['id']);
    $title = htmlspecialchars($ebook['title']);
    $author = htmlspecialchars($ebook['author']);
    $category = htmlspecialchars($ebook['category']);
    $type = htmlspecialchars($ebook['type']);
    $link = htmlspecialchars($ebook['link']);
    $status = htmlspecialchars($ebook['status']);
    $oldCover = htmlspecialchars($ebook['oldCover']);
    $cover = uploadCover();

    if (empty($id) || empty($title) || empty($author) || empty($category) || empty($type) || empty($link) || empty($status) || empty($oldCover)) {
        return false;
    }

    if (is_null($cover)) {
        $cover = $oldCover;
    } elseif ($cover === false) {
        return false;
    }

    if (!filter_var($link, FILTER_VALIDATE_URL) && !str_contains($link, 'https://')) {
        $link = "https://$link";
    } else {
        $link = str_replace('http://', 'https://', $link);
    }

    mysqli_query($conn, "UPDATE ebooks SET title = '$title', author = '$author', category = '$category', type = '$type', link = '$link', status = '$status', cover = '$cover' WHERE id = $id");

    if (mysqli_affected_rows($conn) > 0 && $cover !== $oldCover && $oldCover !== 'default-cover.jpg') {
        unlink("assets/img/ebook/$oldCover");
    } elseif (mysqli_affected_rows($conn) < 0 && $cover !== $oldCover) {
        unlink("assets/img/ebook/$cover");
    }

    return mysqli_affected_rows($conn);
}

function searchEbook($keyword, $index = null, $ebookPerPage = null)
{
    if (isset($index, $ebookPerPage)) {
        return query("SELECT * FROM ebooks WHERE title LIKE '%$keyword%' OR author LIKE '%$keyword%' OR category LIKE '%$keyword%' OR type LIKE '%$keyword%' OR status LIKE '%$keyword%' ORDER BY id DESC LIMIT $index, $ebookPerPage", true);
    }

    return query("SELECT * FROM ebooks WHERE title LIKE '%$keyword%' OR author LIKE '%$keyword%' OR category LIKE '%$keyword%' OR type LIKE '%$keyword%' OR status LIKE '%$keyword%'", true);
}

function userSignUp($user)
{
    $conn = connect();
    $username = str_replace(' ', '', strtolower(mysqli_real_escape_string($conn, $user['username'])));
    $password = mysqli_real_escape_string($conn, $user['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $user['confirmPassword']);

    if (empty(trim($username)) || empty(trim($password))) {
        return [
            'error' => true,
            'message' => 'Invalid username or password!'
        ];
    }

    $users = query("SELECT username FROM users WHERE username = '$username'", true);

    if (!empty($users)) {
        return [
            'error' => true,
            'message' => 'Username already exists!'
        ];
    }

    if (!preg_match("/^.{8,}$/", $password)) {
        return [
            'error' => true,
            'message' => 'Password must be at least 8 characters long!'
        ];
    }

    if ($password !== $confirmPassword) {
        return [
            'error' => true,
            'message' => "Password didn't match!"
        ];
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password')");

    if (mysqli_affected_rows($conn) > 0) {
        return [
            'success' => true,
            'message' => 'Sign up success!'
        ];
    } else {
        return [
            'error' => true,
            'message' => 'Failed to sign up. Try again!'
        ];
    }
}

function userLogin($user)
{
    $conn = connect();
    $username = mysqli_real_escape_string($conn, $user['username']);
    $password = mysqli_real_escape_string($conn, $user['password']);
    $user = query("SELECT * FROM users WHERE username = '$username'");

    if (empty($user)) {
        return false;
    }

    if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        if (isset($_POST['remember'])) {
            setcookie('user_id', $user['id'], time() + (60 * 60 * 24 * 3));
            setcookie('user_key', hash('sha256', $user['username']), time() + (60 * 60 * 24 * 3));
            setcookie('user_auth', hash('sha256', $user['password']), time() + (60 * 60 * 24 * 3));
        }

        return true;
    }

    return false;
}

function checkCookieLogin()
{
    if (isset($_COOKIE['user_id'], $_COOKIE['user_key'], $_COOKIE['user_auth'])) {
        $id = $_COOKIE['user_id'];
        $key = $_COOKIE['user_key'];
        $auth = $_COOKIE['user_auth'];
        $user = query("SELECT * FROM users WHERE id = $id");

        if ($key === hash('sha256', $user['username']) && $auth === hash('sha256', $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
        }
    }
}

function checkUserLogin()
{
    if (!isset($_SESSION['username'])) {
        header('Location: login');
        exit();
    }
}

function checkUserRole()
{
    if (isset($_SESSION['username']) && $_SESSION['role'] !== 'admin') {
        header('Location: list');
        exit();
    }
}

function checkUrlId()
{
    if (!isset($_GET['id'])) {
        header('Location: list');
        exit();
    }
}
