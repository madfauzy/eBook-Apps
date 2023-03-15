<?php

session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('user_id', '', time() - 3600);
setcookie('user_key', '', time() - 3600);
setcookie('user_auth', '', time() - 3600);

header('Location: home');
exit();
