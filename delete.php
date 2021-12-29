<?php 
require "functions.php";

if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit;
}

if(isset($_SESSION["username"]) && $_SESSION["level"] !== "admin"){
    header("Location: list.php");
    exit;
}

if(deleteEbook($_GET) > 0){
    header("Location: list.php?delete=success");
}else{
    header("Location: list.php?delete=failed");
}