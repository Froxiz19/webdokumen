<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}
include "../config.php";

// Ambil data admin dari database
$username = $_SESSION['login'];
$query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' LIMIT 1");
$data = mysqli_fetch_assoc($query);

// Hitung jumlah user dan dokumen
$userCount = mysqli_num_rows(mysqli_query($conn, "SELECT id_user FROM user"));
$dokumenCount = mysqli_num_rows(mysqli_query($conn, "SELECT id_dokumen FROM dokumen"));

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/admin/dashboard.css">
</head>
<body>
    <div class="sidebar" id="sidebar">
        <button class="sidebar-toggle" id="sidebarToggle" title="Minimize Sidebar">&#9776;</button>
        <h3>Admin Panel</h3>
        <ul class="sidebar-menu">
            <li><a href="#" class="active"><span>&#128200;</span> Dashboard</a></li>
            <li><a href="#"><span>&#128101;</span> Master User</a></li>
            <li><a href="#"><span>&#128196;</span> Master Dokumen</a></li>
        </ul>
    </div>
    <div class="main-content" id="mainContent">
        <div class="dashboard-header">
            <h2>Dashboard</h2>
            <div style="display: flex; align-items: center;">
                <div class="admin-info">
                    <?php echo htmlspecialchars($data['username']); ?> (<?php echo htmlspecialchars($data['role']); ?>)
                </div>
                <form method="post" style="display:inline;">
                    <button type="submit" name="logout" class="logout-btn">Logout</button>
                </form>
            </div>
        </div>
        <div style="display: flex; gap: 24px; flex-wrap: wrap; margin-bottom: 32px;">
            <div class="stat-card">
                <div class="stat-icon user"><span>&#128101;</span></div>
                <div class="stat-title">Jumlah User</div>
                <div class="stat-value"><?php echo $userCount; ?></div>
            </div>
            <div class="stat-card">
                <div class="stat-icon dokumen"><span>&#128196;</span></div>
                <div class="stat-title">Jumlah Dokumen</div>
                <div class="stat-value"><?php echo $dokumenCount; ?></div>
            </div>
        </div>
        <div class="dashboard-card">
            <h3>Selamat datang, <b><?php echo htmlspecialchars($data['username']); ?></b>!</h3>
            <p>Ini adalah halaman dashboard admin yang profesional dan elegan.<br>
            Silakan pilih menu di sidebar untuk mengelola user dan dokumen.</p>
        </div>
    </div>
    <script>
        // Sidebar minimize toggle
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('minimized');
        });
    </script>
</body>
</html>