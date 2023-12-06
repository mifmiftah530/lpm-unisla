<?php
include 'koneksi.php';
require 'ceklogin.php';
if($_SESSION['status-login'] !== true){
    echo '<script>window.location="login.php"</script>';
}
else{
}
$query = mysqli_query($koneksi, "SELECT * FROM auditor WHERE ID_AUDITOR = '" . $_SESSION['id'] . "'");
$d = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Siami - Unisla</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="dashboard-auditor.php">
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
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">
                            <img src="images/placeholder-profil.png" onclick="triggerClick()" id="profileDisplay" class="rounded-circle" alt="" width="60px" height="60px">
                            <input type="file" name="profileImage" id="profileImage" onchange="displayImage(this)" style="display: none;">
                        </div>

                        <div class="sb-nav-link-icon"></div>
                        <a class="nav-link" href="profil-auditor.php">

                        <?php echo htmlspecialchars($d->NAMA); ?>
                        </a>
                        <a class="nav-link" href="dashboard-auditor.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Akun
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Kelola Akun</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Kelola Akun Lagi</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Data
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Kelola Data
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Kelola Data Lagi
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <a class="nav-link" href="auditor.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Audit Mutu Internal
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
                                    <input name="nama" type="text" class="form-control" id="nama" value="<?php echo htmlspecialchars($d->NAMA); ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputtgl" class="col-sm-2 col-form-label">TANGGAL LAHIR</label>
                                <div class="col-sm-10">
                                    <input name="tgl" type="date" class="form-control" id="tgl" value="<?php echo htmlspecialchars($_SESSION['a_global']->TANGGAL_LAHIR); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputalamat" class="col-sm-2 col-form-label">ALAMAT</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="<?php echo htmlspecialchars($_SESSION['a_global']->ALAMAT); ?>" value="<?php echo htmlspecialchars($_SESSION['a_global']->ALAMAT); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputuss" class="col-sm-2 col-form-label">USERNAME</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($_SESSION['a_global']->USERNAME); ?>" placeholder="<?php echo htmlspecialchars($_SESSION['a_global']->USERNAME); ?>">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">FOTO PROFIL</label>
                                <input type="file" class="form-control" name="foto" name="foto">

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

    $update = mysqli_query($koneksi, "UPDATE auditor SET NAMA = '" . mysqli_real_escape_string($koneksi, $nama) . "' WHERE ID_AUDITOR = '" . $d->ID_AUDITOR . "'");

    if ($update) {
        echo '<script>alert("p")</script>';
        echo '<script>window.location="profil-auditor.php"</script>';
    } else {
        echo 'gagal' . mysqli_error($koneksi);
    }
}

?>


</html>