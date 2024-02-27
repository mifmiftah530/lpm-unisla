<?php
include 'koneksi.php';
require 'ceklogin.php';
if ($_SESSION['status-login'] !== true) {
    echo '<script>window.location="login.php"</script>';
} else {
}
$query = mysqli_query($koneksi, "SELECT * FROM auditor WHERE ID_AUDITOR = '" . $_SESSION['id'] . "'");
$d = mysqli_fetch_object($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" type="image/png/jpg" href="images/unisla.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Siami - Unisla</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #66cdaa;">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3 me-4" href="dashboard-auditor.php">
            <div class="d-flex align-items-center">
                <img src="ASSETS/logounisla.png" alt="" width="25px" height="25px" class="me-2">
                <span>Audit Mutu Internal</span>
            </div>
        </a>


        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search -->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <!--<div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>-->
        </form>

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="assets/PIC1.png" alt="" width="25px" height="25px"></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="profil-auditor.php">Profil</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark bg-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading p-4">
                            <img src="ASSETS/logounisla.jpg" alt="Unisla" class="rounded-circle me-3" width="80" height="80">

                        </div>
                        <div class="sb-nav-link-icon"></div>
                        <a class="nav-link" href="profil-auditor.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-user"></i></div>

                            <?php echo htmlspecialchars($_SESSION['a_global']->NAMA); ?>

                        </a>
                        <div>
                            <a class="nav-link" href="dashboard-auditor.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                                Dashboard
                            </a>
                        </div>
                        <div class="sb-sidenav-menu-heading mt-4">Menu</div>
                        <a class="nav-link" href="profil-auditor.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                            Akun
                        </a>
                        <a class="nav-link" href="auditor.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-file-signature"></i></div>
                            Audit Mutu Internal
                        </a>
                        <a class="nav-link collapsed" href="data" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Data
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="catatan-lapangan.php">
                                    <div class="sb-nav-link-icon"></div>
                                    Catatan Lapangan
                                </a>
                                <a class="nav-link" href="tindak-koreksi.php">
                                    <div class="sb-nav-link-icon"></div>
                                    Tindak Koreksi & RTL
                                </a>
                        </div>
                    </div>
            </nav>

        </div>
        <div id="layoutSidenav_content">
            <div class="container-fluid px-4">
                <h1 class="mt-4">Profil</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Ubah Profil</li>
                </ol>
                <div class="card">
                    <h5 class="card-header bg-success text-white">Ubah Profil</h5>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row mb-3">
                                <label for="inputnama" class="col-sm-2 col-form-label">NAMA LENGKAP</label>
                                <div class="col-sm-10">
                                    <input name="nama" type="text" class="form-control" id="nama" value="<?= $d->NAMA ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputtgl" class="col-sm-2 col-form-label">TANGGAL LAHIR</label>
                                <div class="col-sm-10">
                                    <input name="tgl" type="date" class="form-control" id="tgl" value="<?php echo $d->TANGGAL_LAHIR; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputalamat" class="col-sm-2 col-form-label">ALAMAT</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $d->ALAMAT; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputuss" class="col-sm-2 col-form-label">USERNAME</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username" value="<?= $d->USERNAME; ?>">
                                </div>
                            </div>



                            <button type="submit" name="submit" class="btn btn-primary">Update</button>


                        </form>
                    </div>
                </div>
                <div class="card mt-4">
                    <h5 class="card-header bg-success text-white">Ubah Password</h5>
                    <div class="card-body">
                        <form>
                            <div class="row mb-3">
                                <label for="inputuss" class="col-sm-2 col-form-label">Password Lama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="pwlama">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputuss" class="col-sm-2 col-form-label">Password Baru</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="pwbaru">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
<?php
if (isset($_POST['submit'])) {
    $nama = ($_POST['nama']);
    $tgl = ($_POST['tgl']);
    $alamat = ($_POST['alamat']);
    $username = ($_POST['username']);

    $update = mysqli_query($koneksi, "UPDATE auditor SET NAMA = '" .
        $nama . "', TANGGAL_LAHIR = 
     '" . $tgl . "',ALAMAT = '" .

        $alamat . "', USERNAME = '"
        . $username . "' WHERE ID_AUDITOR = '" . $d->ID_AUDITOR . "'");

    if ($update) {
        echo '<script>alert("Profil Berhasil Diubah")</script>';
        echo '<script>window.location="profil-auditor.php"</script>';
    } else {
        echo 'gagal' . mysqli_error($koneksi);
    }
}

?>


</html>