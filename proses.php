<?php
include "config.php";

// Proses hanya jika tombol regis ditekan
if (isset($_POST['regis'])) {

    // Tangkap data dari form register
    $username = strtoupper(trim($_POST['username'] ?? ''));
    $password = $_POST['password'] ?? '';
    $role     = $_POST['role'] ?? 'user';

    // Validasi input kosong
    if (empty($username) || empty($password) || empty($role)) {
        header("Location: register.php?error=empty");
        exit();
    }

    // Validasi karakter username (hanya huruf dan angka, tanpa spasi dan karakter khusus)
    if (!preg_match('/^[A-Z0-9]+$/', $username)) {
        header("Location: register.php?error=char");
        exit();
    }

    // Validasi role
    if ($role !== 'admin' && $role !== 'user') {
        header("Location: register.php?error=role");
        exit();
    }

    // Cek apakah username sudah ada
    $stmt = mysqli_prepare($conn, "SELECT username FROM user WHERE username=?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    if (mysqli_stmt_num_rows($stmt) > 0) {
        header("Location: register.php?error=exists");
        exit();
    }
    mysqli_stmt_close($stmt);

    // Enkripsi password
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Simpan ke database (id_user auto increment, gunakan NOW() untuk created_at)
    $query = mysqli_query($conn, "INSERT INTO user (id_user, username, password, role, created_at) VALUES ('', '$username', '$hash', '$role', NOW())");

    if ($query) {
        header("Location: login.php?success=register");
        exit();
    } else {
        header("Location: register.php?error=failed");
        exit();
    }
} else {
    header("Location: register.php");
    exit();
}
?>