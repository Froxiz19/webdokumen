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
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #e0e7ff 0%, #f0f2f5 100%);
            min-height: 100vh;
            display: flex;
        }
        .sidebar {
            width: 220px;
            background: linear-gradient(180deg, #007bff 60%, #5a8dee 100%);
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 32px 0 0 0;
            box-shadow: 2px 0 12px rgba(0,0,0,0.08);
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
        }
        .sidebar h3 {
            margin-bottom: 32px;
            font-size: 22px;
            font-weight: 700;
            letter-spacing: 1px;
            text-shadow: 0 1px 2px #5a8dee;
        }
        .sidebar-menu {
            width: 100%;
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .sidebar-menu li {
            width: 100%;
        }
        .sidebar-menu a {
            display: block;
            padding: 14px 32px;
            color: #fff;
            text-decoration: none;
            font-size: 17px;
            font-weight: 500;
            border-left: 4px solid transparent;
            transition: background 0.2s, border-left 0.2s;
        }
        .sidebar-menu a.active,
        .sidebar-menu a:hover {
            background: rgba(255,255,255,0.08);
            border-left: 4px solid #feb47b;
        }
        .main-content {
            margin-left: 220px;
            padding: 40px 24px;
            width: 100%;
            min-height: 100vh;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .dashboard-header {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }
        .dashboard-header h2 {
            font-size: 28px;
            font-weight: 700;
            color: #2d3748;
            margin: 0;
        }
        .admin-info {
            font-size: 16px;
            color: #444;
            background: #f7fafc;
            padding: 10px 18px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        }
        .logout-btn {
            padding: 10px 24px;
            background: linear-gradient(90deg, #ff7e5f 0%, #feb47b 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0,0,0,0.10);
            transition: background 0.2s, box-shadow 0.2s, transform 0.2s;
            margin-left: 16px;
        }
        .logout-btn:hover {
            background: linear-gradient(90deg, #feb47b 0%, #ff7e5f 100%);
            box-shadow: 0 4px 16px rgba(255,126,95,0.18);
            transform: translateY(-2px) scale(1.03);
        }
        .dashboard-card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.10);
            padding: 32px 24px;
            margin-bottom: 24px;
            width: 100%;
            max-width: 600px;
        }
        @media (max-width: 700px) {
            .sidebar {
                width: 100px;
                padding: 18px 0 0 0;
            }
            .sidebar h3 {
                font-size: 16px;
                margin-bottom: 18px;
            }
            .sidebar-menu a {
                font-size: 14px;
                padding: 10px 12px;
            }
            .main-content {
                margin-left: 100px;
                padding: 18px 8px;
            }
            .dashboard-header h2 {
                font-size: 20px;
            }
            .dashboard-card {
                padding: 18px 10px;
                max-width: 98vw;
            }
        }
        @media (max-width: 480px) {
            .sidebar {
                display: none;
            }
            .main-content {
                margin-left: 0;
                padding: 12px 4px;
            }
            .dashboard-card {
                padding: 12px 6px;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h3>Admin Panel</h3>
        <ul class="sidebar-menu">
            <li><a href="#" class="active">Dashboard</a></li>
            <li><a href="#">Master User</a></li>
            <li><a href="#">Master Dokumen</a></li>
        </ul>
    </div>
    <div class="main-content">
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
        <div class="dashboard-card">
            <h3>Selamat datang, <b><?php echo htmlspecialchars($data['username']); ?></b>!</h3>
            <p>Ini adalah halaman dashboard admin yang profesional dan elegan.<br>
            Silakan pilih menu di sidebar untuk mengelola user dan dokumen.</p>
        </div>
    </div>
</body>
</html>