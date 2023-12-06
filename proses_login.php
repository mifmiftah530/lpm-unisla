<?php
// Sambungkan dengan file koneksi.php
include("koneksi.php");
// Periksa apakah fungsi bersihkanInput sudah ada atau belum
if (!function_exists('bersihkanInput')) {
    // Jika belum, deklarasikan fungsi tersebut
    function bersihkanInput($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }
}
// Ambil data yang dikirimkan melalui form login
$username = bersihkanInput($_POST['username']);
$password = bersihkanInput($_POST['password']);
$user_type = bersihkanInput($_POST['user_type']);

// Hash password sebelum membandingkan dengan yang ada di database
$password = md5($password); // Anda bisa menggunakan metode hashing yang lebih aman, ini hanya contoh sederhana

// Buat kueri SQL berdasarkan tipe pengguna (admin atau mahasiswa)
if ($user_type == 'auditor') {
    $query = "SELECT * FROM auditor WHERE username='$username' AND password='$password'";
} elseif ($user_type == 'auditee') {
    $query = "SELECT * FROM auditee WHERE username='$username' AND password='$password'";
} elseif ($user_type == 'administrator') {
    $query = "SELECT * FROM administrator WHERE username='$username' AND password='$password'";
}elseif ($user_type == 'pemimpin') {
    $query = "SELECT * FROM pemimpin WHERE username='$username' AND password='$password'";
} else {
    // Jika tipe pengguna tidak valid, atur pesan kesalahan atau redirect ke halaman lain
    die("Tipe pengguna tidak valid");
}

// Jalankan kueri
$result = $koneksi->query($query);

// Periksa apakah kueri berhasil dijalankan
if ($result) {
    // Periksa apakah hasil kueri mengembalikan baris data
    if ($result->num_rows > 0) {
        // Pengguna berhasil login, lakukan tindakan yang diperlukan, misalnya, atur sesi atau arahkan ke halaman lain
        
        session_start();
        $d = mysqli_fetch_object($result);
        $_SESSION['status-login']=true;
        $_SESSION['a_global']=$d;
        // Contoh: atur sesi username
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $d->ID_AUDITOR;

        // Redirect ke halaman selamat datang atau halaman lain yang sesuai
        if ($user_type == 'auditor') {
            header('Location: dashboard-auditor.php');
        } elseif ($user_type == 'auditee') {
            header('Location: dashboard-auditee.php');
        } elseif ($user_type == 'administrator') {
            header('Location: dashboard-admin.php');
        } elseif ($user_type == 'pemimpin') {
            header('Location: dashboard-pemimpin.php');
        }else {
            // Jika tipe pengguna tidak valid, atur pesan kesalahan atau redirect ke halaman lain
            die("Tipe pengguna tidak valid");
        }
        
        exit();
    } else {
        // Jika tidak ada baris yang cocok, tampilkan pesan kesalahan atau redirect ke halaman login dengan pesan kesalahan
        header('Location: login.php?error=1');
        exit();
    }
} else {
    // Jika kueri gagal dijalankan, tampilkan pesan kesalahan atau redirect ke halaman login dengan pesan kesalahan
    header('Location: login.php?error=2');
    exit();
}
?>
