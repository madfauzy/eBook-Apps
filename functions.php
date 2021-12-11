<?php 
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
        $cover = htmlspecialchars($ebook["cover"]);

        mysqli_query($conn,"INSERT INTO ebooks (title,author,category,price,cover) VALUES ('$title','$author','$category','$price','$cover')");

        return mysqli_affected_rows($conn);
    }