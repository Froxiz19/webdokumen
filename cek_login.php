<?php
session_start();
include "config.php";

// Tangkap data dari form login
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Validasi input
if (empty($username) || empty($password)) {
    header("Location: login.php?error=empty");
    exit();
}

// Cek user di database
$query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' LIMIT 1");
$user = mysqli_fetch_assoc($query);

if ($user && password_verify($password, $user['password'])) {
    // Set session login dan role
    $_SESSION['login'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    // Redirect sesuai role ke dashboard
    if ($user['role'] === 'admin') {
        header("Location: admin/dashboard.php?login=" . urlencode($user['username']));
        exit();
    } elseif ($user['role'] === 'user') {
        header("Location: user/dashboard.php?login=" . urlencode($user['username']));
        exit();
    } else {
        // Role tidak dikenali
        session_destroy();
        header("Location: login.php?error=role");
        exit();
    }
} else {
    // Login gagal
    header("Location: login.php?error=invalid");
    exit();
}
?>