<?php
require_once '../../config/session.php';
require_once '../../config/database.php';

$title = 'Dashboard Administrator';

require_once '../../layouts/header.php';
require_once '../../layouts/navbar.php';
require_once '../../layouts/sidebar.php';

$queryUser = $conn->query('SELECT COUNT(*) AS total from users');
$totalUser = $queryUser->fetch_assoc()['total'];

$queryKategori = $conn->query('select count(*) as total from kategori');
$totalKategori = $queryKategori->fetch_assoc()['total'];

$queryAlat = $conn->query('select count(*) as total from alat');
$totalAlat = $queryAlat->fetch_assoc()['total'];

$queryPinjam = $conn->query('select count(*) as total from peminjaman');
$totalPinjam = $queryPinjam->fetch_assoc()['total'];

$queryKembali = $conn->query('select count(*) as total from pengembalian');
$totalKembali = $queryKembali->fetch_assoc()['total'];
?>

<div class="container-fluid">
    <h2 class="mb-2">
        <i class="bi bi-speedometer2"></i>
        Dashboard Administrator
    </h2>
    <p class="text-muted">
        Selamat Datang, <strong><?=  $_SESSION['nama_lengkap']; ?></strong>
    </p>
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-primary shadow-sm">
                <div class="card-body">
                    <h6>Total User</h6>
                    <h2><?= $totalUser ?></h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-primary shadow-sm">
                <div class="card-body">
                    <h6>Total Kategori</h6>
                    <h2><?= $totalKategori ?></h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-primary shadow-sm">
                <div class="card-body">
                    <h6>TotalAlat</h6>
                    <h2><?= $totalAlat ?></h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-primary shadow-sm">
                <div class="card-body">
                    <h6>Total Peminjam</h6>
                    <h2><?= $totalPinjam ?></h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-primary shadow-sm">
                <div class="card-body">
                    <h6>Total Pengembalian</h6>
                    <h2><?= $totalKembali ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once '../../layouts/footer.php';
?>


