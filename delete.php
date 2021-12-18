<?php 
    require "functions.php";

    if(!isset($_SESSION["username"])){
        header("Location: login.php");
    }

    if(deleteEbook($_GET) > 0){
        header("Location: index.php?delete=success");
    }else{
        header("Location: index.php?delete=failed");
    }