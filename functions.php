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

    function deleteEbook($ebook){
        global $conn;
        $id = htmlspecialchars($ebook["id"]);
        $cover = htmlspecialchars($ebook["cover"]);

        mysqli_query($conn,"DELETE FROM ebooks WHERE id = $id AND cover = '$cover'");

        return mysqli_affected_rows($conn);
    }

    function updateEbook($ebook){
        global $conn;
        $id = htmlspecialchars($ebook["id"]);
        $title = htmlspecialchars($ebook["title"]);
        $author = htmlspecialchars($ebook["author"]);
        $category = htmlspecialchars($ebook["category"]);
        $price = htmlspecialchars($ebook["price"]);
        $cover = htmlspecialchars($ebook["cover"]);

        mysqli_query($conn,"UPDATE ebooks SET title = '$title', author = '$author', category = '$category', price = '$price', cover = '$cover' WHERE id = $id");

        return mysqli_affected_rows($conn);
    }

    function searchEbook($keyword){
        return query("SELECT * FROM ebooks WHERE title LIKE '%$keyword%' OR author LIKE '%$keyword%' OR category LIKE '%$keyword%' OR price LIKE '%$keyword%'");
    }