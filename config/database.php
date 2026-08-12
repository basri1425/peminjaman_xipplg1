<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'peminjaman';

$conn = new mysqli($host,$username,$password,$database);

if ($conn->connect_error) {
    die('Koneksi Database Gagal: '.$conn->connect_error);
}

$conn->set_charset('utf8');