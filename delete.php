<?php

require_once 'functions.php';

checkCookieLogin();
checkUserLogin();
checkUserRole();
checkUrlId();

if (deleteEbook($_GET) > 0) {
    header('Location: list?delete=success');
    exit();
} else {
    header('Location: list?delete=failed');
    exit();
}
