<?php

session_start();

if (isset($_SESSION['errors']) === false) {
    $_SESSION['errors'] = [];
}
if (isset($_SESSION['post']) === false) {
    $_SESSION['post'] = [];
}

define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'password');
define('DB_NAME', 'info_development');