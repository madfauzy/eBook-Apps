<?php 
    require "functions.php";

    if(!isset($_SESSION["username"])){
        header("Location: login.php");
    }

    if(deleteEbook($_GET) > 0){
        header("Location: list.php?delete=success");
    }else{
        header("Location: list.php?delete=failed");
    }