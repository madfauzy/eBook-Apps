<?php 
session_start();
$conn = mysqli_connect("localhost","root","","ebookapps");

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}

function addEbook($ebook){
    global $conn;
    $title = htmlspecialchars($ebook["title"]);
    $author = htmlspecialchars($ebook["author"]);
    $category = htmlspecialchars($ebook["category"]);
    $price = htmlspecialchars($ebook["price"]);
    $link = htmlspecialchars($ebook["link"]);
    $cover = uploadCover();

    if(!$cover){
        return false;
    }elseif($cover === "InvalidExtension"){
        return "InvalidExtension";
    }elseif($cover === "SizeTooBig"){
        return "SizeTooBig";
    }

    mysqli_query($conn,"INSERT INTO ebooks (title,author,category,price,link,verified,cover) VALUES ('$title','$author','$category','$price','$link','No','$cover')");

    if(mysqli_affected_rows($conn) < 0){
        unlink("assets/img/$cover");
    }

    return mysqli_affected_rows($conn);
}

function deleteEbook($ebook){
    global $conn;
    $id = htmlspecialchars($ebook["id"]);
    $cover = htmlspecialchars($ebook["cover"]);

    mysqli_query($conn,"DELETE FROM ebooks WHERE id = $id AND cover = '$cover'");

    if(mysqli_affected_rows($conn) > 0){
        unlink("assets/img/$cover");
    }

    return mysqli_affected_rows($conn);
}

function updateEbook($ebook){
    global $conn;
    $id = htmlspecialchars($ebook["id"]);
    $title = htmlspecialchars($ebook["title"]);
    $author = htmlspecialchars($ebook["author"]);
    $category = htmlspecialchars($ebook["category"]);
    $price = htmlspecialchars($ebook["price"]);
    $link = htmlspecialchars($ebook["link"]);
    $verified = htmlspecialchars($ebook["verified"]);
    $oldCover = htmlspecialchars($ebook["oldCover"]);
    $cover = uploadCover();

    if(!$cover){
        return false;
    }elseif($cover === "NothingUploaded"){
        $cover = $oldCover;
    }elseif($cover === "InvalidExtension"){
        return "InvalidExtension";
    }elseif($cover === "SizeTooBig"){
        return "SizeTooBig";
    }

    mysqli_query($conn,"UPDATE ebooks SET title = '$title',author = '$author',category = '$category',price = '$price',link = '$link',verified = '$verified',cover = '$cover' WHERE id = $id");

    if(mysqli_affected_rows($conn) > 0 && $cover !== $oldCover){
        unlink("assets/img/$oldCover");
    }elseif(mysqli_affected_rows($conn) < 0 && $cover !== $oldCover){
        unlink("assets/img/$cover");
    }

    return mysqli_affected_rows($conn);
}

function searchEbook($keyword,$index = null,$ebookPerPage = null){
    if(isset($index,$ebookPerPage)){
        return query("SELECT * FROM ebooks WHERE title LIKE '%$keyword%' OR author LIKE '%$keyword%' OR category LIKE '%$keyword%' OR price LIKE '%$keyword%' LIMIT $index,$ebookPerPage");
    }

    return query("SELECT * FROM ebooks WHERE title LIKE '%$keyword%' OR author LIKE '%$keyword%' OR category LIKE '%$keyword%' OR price LIKE '%$keyword%'");
}

function uploadCover(){
    $coverName = $_FILES["cover"]["name"];
    $coverTmpName = $_FILES["cover"]["tmp_name"];
    $coverError = $_FILES["cover"]["error"];
    $coverSize = $_FILES["cover"]["size"];

    if($coverError === 4){
        return "NothingUploaded";
    }

    $validExtension = ["jpg","jpeg","png"];
    $coverExtension = strtolower(pathinfo($coverName,PATHINFO_EXTENSION));

    if(!in_array($coverExtension,$validExtension)){
        return "InvalidExtension";
    }

    if($coverSize > 1000000){
        return "SizeTooBig";
    }

    $newCoverName = "IMG_" . md5(uniqid(rand(),true)) . ".$coverExtension";
    $pathFile = "assets/img/$newCoverName";

    if(file_exists($pathFile)){
        return false;
    }

    move_uploaded_file($coverTmpName,$pathFile);

    return $newCoverName;
}

function userSignUp($user){
    global $conn;
    $username = str_replace(" ","",strtolower(stripslashes($user["username"])));
    $password = mysqli_real_escape_string($conn,$user["password"]);
    $confirmPassword = mysqli_real_escape_string($conn,$user["confirmPassword"]);

    if(empty(trim($username)) || empty(trim($password))){
        return "Empty";
    }

    $users = query("SELECT username FROM users WHERE username = '$username'");

    if(!empty($users)){
        return "UsernameAlreadyExist";
    }

    if(!preg_match("/^.{8,}$/",$password)){
        return "InvalidPassword";
    }

    if($password !== $confirmPassword){
        return "WrongPassword";
    }
    
    $password = password_hash($password,PASSWORD_DEFAULT);

    mysqli_query($conn,"INSERT INTO users (username,password,level) VALUES ('$username','$password','member')");

    return mysqli_affected_rows($conn);
}

function userLogin($user){
    global $conn;
    $username = mysqli_real_escape_string($conn,$user["username"]);
    $password = mysqli_real_escape_string($conn,$user["password"]);
    $users = query("SELECT * FROM users WHERE username = '$username'");

    if(empty($users)){
        return false;
    }

    $users = $users[0];

    if(password_verify($password,$users["password"])){
        $_SESSION["username"] = $username;
        $_SESSION["level"] = $users["level"];
        if(isset($_POST["remember"])){
            setcookie("user_id",$users["id"],time() + (86400 * 30));
            setcookie("user_key",hash("sha256",$username),time() + (86400 * 30));
        }
        return "Success";
    }

    return false;
}