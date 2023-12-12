<?php
include 'koneksi.php';
require 'ceklogin.php';

$query = 'SELECT
indikator.INDIKATOR,
jawab.JAWAB,
audit.NILAI_AUDITEE,
SUM(audit.NILAI_AUDITEE) AS totalaudit,
COUNT(kriteria.KRITERIA) AS jumlah_k,
AVG(audit.NILAI_AUDITEE) AS rata_nilai,
audit.NILAI_AUDITOR,
kriteria.KRITERIA
FROM 
audit
JOIN 
jawab ON audit.ID_JAWAB = jawab.ID_JAWAB
JOIN
indikator ON jawab.ID_INDIKATOR = indikator.ID_INDIKATOR
JOIN
kriteria ON indikator.ID_KRITERIA = kriteria.ID_KRITERIA
GROUP BY kriteria.ID_KRITERIA;';

$result = $koneksi->query($query);
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
    <!-- Sertakan library Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Tambahkan elemen canvas untuk menampilkan grafik -->

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">
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
                    <li><a class="dropdown-item" href="profil-auditee.php">Profil</a></li>
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
                        <div class="sb-sidenav-menu-heading"><img src="ASSETS/logounisla.png" width="60px" height="60px"></div>

                        <div class="sb-nav-link-icon"></div>
                        <a class="nav-link" href="profil-auditee.php">
                            <?php echo htmlspecialchars($_SESSION['a_global']->NAMA); ?>

                        </a>
                        <a class="nav-link" href="dashboard-auditee.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
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
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-file-lines"></i></div>
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
                        <a class="nav-link" href="auditee.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-file-signature"></i></div>
                            Audit Mutu Internal
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <div class="container-fluid px-4">
                <h4 class="mt-4">AUDIT MUTU INTERNAL</h4>
                <div class="card">

                    <h5 class="card-header bg-success text-white">Grafik</h5>

                    <div class="card-body">
                        <button type="button" class="btn btn-primary" onclick="javascript:history.go(-1);">
                            <i class="fas fa-arrow-left me-2"></i> Kembali
                        </button>
                        <div style="max-width: 600px; margin: auto;">
                            <canvas id="radarChart">
                                <?php
                                if ($result->num_rows > 0) {
                                    $labels = array();
                                    $data = array();
                                    $borderColors = array();

                                    while ($row = $result->fetch_assoc()) {
                                        $labels[] = $row["KRITERIA"];
                                        $data[] = $row["rata_nilai"];
                                        $borderColors[] = 'rgba(' . rand(0, 1) . ',' . rand(0, 280) . ',' . rand(0, 200) . ', 1)';
                                    }
                                ?>

                                    <script>
                                        // Ambil data dari PHP dan simpan dalam variabel
                                        var labels = <?= json_encode($labels); ?>;
                                        var data = <?= json_encode($data); ?>;
                                        var borderColors = <?= json_encode($borderColors); ?>;

                                        // Konfigurasi grafik radar
                                        var config = {
                                            type: 'radar',
                                            data: {
                                                labels: labels,
                                                datasets: [{
                                                    label: 'Total Nilai Audit',
                                                    data: data,
                                                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna area grafik
                                                    borderColor: borderColors, // Warna garis grafik
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                elements: {
                                                    line: {
                                                        tension: 0, // Tidak menggunakan ketegangan pada garis
                                                    }
                                                }
                                            }
                                        };

                                        // Inisialisasi grafik radar pada elemen canvas dengan id 'radarChart'
                                        var ctx = document.getElementById('radarChart').getContext('2d');
                                        var myRadarChart = new Chart(ctx, config);
                                    </script>
                                <?php
                                } else {
                                    // Handle jika tidak ada data
                                    echo 'Tidak ada data.';
                                }
                                ?>
                            </canvas>
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

</html>