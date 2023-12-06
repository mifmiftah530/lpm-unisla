<?php
include 'koneksi.php';
require 'ceklogin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h4>Selamat Datang <?php echo htmlspecialchars($_SESSION['a_global']->nama); ?> Di Tokokita</h4>
    <a href="logout.php">logout</a>
</body>
</html>