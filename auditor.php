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
    <style>
    /* Set the container width for desktop */
    @media (min-width: 992px) {
      .desktop-container {
        width: 960px; /* Set the desired width for desktop */
        margin: 0 auto; /* Center the container */
      }
    }
  </style>
</head>

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
                            <a class="nav-link" href="dashboard-auditor.php">
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
                        <a class="nav-link" href="auditor.php">
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
                    <h5 class="card-header bg-success text-white">Audit Tersedia</h5>
                    <div class="card-body">
                        <!-- <table id="auditTable" class="table table-striped"> -->

                        <table id="auditTable" class="table table-striped">
                            <div>
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                    data-bs-target="#modal-column-visibility">
                                    Visibilitas Kolom
                                </button>
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                    data-bs-target="#modal-print">
                                    Cetak
                                </button>
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                    data-bs-target="#modal-pdf">
                                    PDF
                                </button>
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                    data-bs-target="#modal-csv">
                                    CSV
                                </button>
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                    data-bs-target="#modal-excel">
                                    Excel
                                </button>
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                    data-bs-target="#modal-copy">
                                    Salin
                                </button>

                            </div>
                            <thead class="container-fluid desktop-container">
                                <tr>
                                    <th class="text-center" width="50px">NO</th>
                                    <th class="text-center">Tanggal Audit</th>
                                    <th class="text-center">Auditee / Unit</th>
                                    <th class="text-center">Instrumen</th>
                                    <th class="text-center">Tahun</th>
                                    <th class="text-center">Auditor</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $no = 1;
                                $kriteria = mysqli_query($koneksi, "SELECT * FROM jadwal ORDER BY ID_JADWAL DESC");
                                if (mysqli_num_rows($kriteria) > 0) {
                                    while ($row = mysqli_fetch_array($kriteria)) {
                                        ?>
                                        <tr>
                                            <td class="text-center align-middle">
                                                <?php echo $no++ ?>
                                            </td>
                                            <td class="align-middle">
                                                <?php echo $row['TANGGAL'] ?>
                                            </td>
                                            <td class="align-middle">
                                                <?php echo $row['UNIT'] ?>
                                            </td>
                                            <td class="align-middle">
                                                <?php echo $row['INSTRUMEN'] ?>
                                            </td>
                                            <td class="text-center align-middle">
                                                <?php echo $row['TAHUN'] ?>
                                            </td>
                                            <td class="align-middle">
                                                <?php echo $row['ID_AUDITOR'] . 'Nama Tidak Tersedia'; ?>
                                            </td>
                                            <td class="text-center align-middle">
                                                <a href="auditor-tersedia.php?id=<?php echo $row['UNIT']; ?>"
                                                    class="btn btn-success">
                                                    <i class="fas fa-play"></i> Mulai Audit
                                                </a>

                                            </td>
                                            <td class="text-center align-middle">
                                                <a href="grafikauditor.php" class="btn btn-primary">
                                                    <i class="fas fa-map"></i> Peta Mutu
                                                </a>
                                            </td>

                                            <td class="text-center align-middle">
                                                <a href="form-auditor.php?id=<?php echo $row['UNIT']; ?>"
                                                    class="btn btn-warning">
                                                    <i class="fas fa-file-alt"></i> Form
                                                </a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="js/scripts.js"></script>
    <!-- ... Script lainnya ... -->

    <script>
        $(document).ready(function () {
            // Aktifkan pengurutan tabel menggunakan plugin DataTables
            $('#auditTable').DataTable();
        });
    </script>
</body>

</html>