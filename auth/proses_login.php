<?php
session_start();

require_once '../config/database.php';

$username = trim($_POST['username']);
$password = trim($_POST['password']);

$sql = "select * from users where username = ? limit 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    if($user['status'] != 'Aktif'){
        $_SESSION['pesan'] = 'Akun tidak aktif';
        header('Location: login.php');
        exit();
    }

    if(password_verify($password,$user['password'])){
        $_SESSION['login'] = true;
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['level'] = $user['level'];

        switch ($user['level']){
            case 'Administrator':
                header('Location: ../administrator/dashboard/index.php');
                break;
            case 'Petugas':
                header('Location: ../petugas/dashboard/index.php');
                break;
            case 'Peminjam':
                header('Location: ../peminjam/dashboard/index.php');
                break;
            default:
            session_destroy();
            header('Location: login.php');
        }
        exit();
    } else {
        $_SESSION['pesan'] = 'Password yang anda masukkan salah';
        header('Location: login.php');
        exit();
    }
} else {
    $_SESSION['pesan'] = 'Username tidak ditemukan';
    header('Location: login.php');
    exit();
}
