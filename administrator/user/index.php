<?php
require_once '../../config/session.php';
require_once '../../config/database.php';

if ($_SESSION['level'] != 'Administrator') {
    header('location: ../../auth/login.php');
    exit();
}

$title = 'Master user';

require_once '../../layouts/header.php';
require_once '../../layouts/navbar.php';
require_once '../../layouts/sidebar.php';

$sql = "select id_user, nama_lengkap, username, level, status from users order by nama_lengkap ASC";
$result = $conn->query($sql);
?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3>
                <i class="bi bi-people-fill"></i>Master user
            </h3>
            <p class="text-muted mb-0">
                Kelola seluruh data pengguna aplikasi
            </p>
        </div>
        <a href="tambah.php" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i>Tambah User
        </a>
    </div>
</div>
