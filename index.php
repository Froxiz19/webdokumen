<?php
session_start();

if (!isset($_SESSION['login']) || !isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['role'] === 'admin') {
    header("Location: admin.php");
    exit();
} elseif ($_SESSION['role'] === 'user') {
    header("Location: user/dashboard.php");
    exit();
} else {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>