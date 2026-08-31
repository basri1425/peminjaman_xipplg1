<?php
require_once '../../config/session.php';
require_once '../../config/database.php';

$title = 'Dashboard Administrator';

require_once '../../layouts/header.php';
require_once '../../layouts/navbar.php';
require_once '../../layouts/sidebar.php';

$queryUser = $conn->query('SELECT COUNT(*) AS total from users');
$totalUser = $queryUser->fetch_assoc()['total'];