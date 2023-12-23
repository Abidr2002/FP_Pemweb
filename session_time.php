<?php
$session_timeout = 1800;
$inactive_timeout = time() - $_SESSION['login_time'];
if ($inactive_timeout >= $session_timeout) {
    // Pengguna melebihi waktu timeout, hapus sesi dan redirect ke halaman login
    header("Location: ../logout.php");
} else {
    // Update waktu login terakhir setiap kali pengguna mengakses halaman yang memerlukan otentikasi
    $_SESSION['login_time'] = time();
}
