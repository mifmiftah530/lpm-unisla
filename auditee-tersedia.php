<!-- db start -->
<?php
include 'koneksi.php';
require 'ceklogin.php';
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
<!-- Navbar Start -->

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3 me-4" href="dashboard-auditor.php">
        <div class="d-flex align-items-center">
                    <img src="ASSETS/logounisla.png" alt="" width="25px" height="25px" class="me-2">
                    <span>Audit Mutu Internal</span>
                </div>
        </a>


        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
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
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><img src="assets/PIC1.png" alt="" width="25px" height="25px"></a>
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
                            <img src="ASSETS/logounisla.jpg" alt="Unisla" class="rounded-circle me-3" width="80"
                                height="80">

                        </div>
                        <div class="sb-nav-link-icon"></div>
                        <a class="nav-link" href="profil-auditee.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-user"></i></div>

                            <?php echo htmlspecialchars($_SESSION['a_global']->NAMA); ?>

                        </a>
                        <div>
                            <a class="nav-link" href="dashboard-auditee.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                                Dashboard
                            </a>
                        </div>
                        <div class="sb-sidenav-menu-heading mt-4">Menu</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                            Akun
                            
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-file-lines"></i></div>
                            Data

                        </a>
                        <a class="nav-link" href="auditee.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-file-signature"></i></div>
                            Audit Mutu Internal
                        </a>
                    </div>
                </div>
            </nav>

        </div>

        <!-- konten Start -->
        <div id="layoutSidenav_content">
            <div class="container-fluid px-4">
                <h4 class="mt-4">AUDIT MUTU INTERNAL</h4>
                <div class="card">
                    <h5 class="card-header bg-success text-white">Audit Tersedia</h5>
                    <div class="card-body">
                        <div class="container">
                            <div class="row align-items-start">
                                <div class="col-4">
                                    <h4 class="mb-0">Standar</h4><br>
                                    <a href="auditee.php" class="btn btn-primary">
                                        <i class="fas fa-arrow-left"></i> Kembali
                                    </a>

                                    <!-- <a href="grafikauditee.php" class="btn btn-warning">
                                        <i class="fas fa-chart-bar"></i> Grafik
                                    </a> -->

                                    <!-- Bagian Tabel Standar -->
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th width="50px">NO</th>
                                                <th>KRITERIA</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            // $id = $_GET['id'];
                                            $kriteria = mysqli_query($koneksi, "SELECT * FROM `KRITERIA` 
                                            ");
                                            if (mysqli_num_rows($kriteria) > 0) {
                                                while ($row = mysqli_fetch_array($kriteria)) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $no++ ?>
                                                        </td>
                                                        <td><a href="auditee-pertanyaan.php?id=<?php echo $row['ID_KRITERIA']; ?>"
                                                                style="color: white; text-decoration: none;">
                                                                <button type="button" class="btn btn-success"
                                                                    style="border-radius: 5px; padding: 10px 20px; font-size: 16px; width: 100%;">

                                                                    <?php echo $row['KRITERIA'] ?>

                                                                </button> </a>

                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="3">TIDAK ADA DATA</td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <!-- Bagian Tabel Standar end -->
                                </div>
                                <div class="col-8">
                                    <h4>Instrumen</h4>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th width="10px">NO</th>
                                                <th widht="20px"></th>
                                                <th width="700px">KOMPONEN</th>
                                                <th widht="100px">Penilaian Auditor</th>
                                                <th widht="100px">Penilaian Auditee</th>
                                                <td width="50px"></td>
                                                <td width="50px"></td>
                                            </tr>
                                        </thead>
                                    </table>
                                    <h3>
                                        Silahkan Pilih Kriteria
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>