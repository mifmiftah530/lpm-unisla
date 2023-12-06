<?php
session_start();

// Cek apakah sesi username ada
if (!isset($_SESSION['username'])) {
    // Jika tidak, redirect ke halaman login
    echo '<script>alert("Anda belum login. Silakan login terlebih dahulu."); window.location="login.php";</script>';
    exit(); // Pastikan untuk menghentikan eksekusi script setelah pengalihan
}

// Set waktu timeout sesi (dalam detik)
$sessionTimeout = 1800; // Contoh: 30 menit

// Periksa apakah sesi sudah melewati batas waktu
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $sessionTimeout)) {
    // Jika sudah melewati batas waktu, hapus sesi dan redirect ke halaman login
    session_unset();     // Hapus semua variabel sesi
    session_destroy();   // Hapus sesi dari server
    echo '<script>alert("Sesi Anda telah berakhir. Silakan login kembali."); window.location="login.php";</script>';
    exit();
}

// Perbarui waktu aktivitas terakhir
$_SESSION['last_activity'] = time();
?>
