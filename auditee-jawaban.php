<!-- db start -->
<?php
//include 'koneksi.php';
require 'ceklogin.php';
?>
<!-- db start -->
<!-- db start -->
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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<!-- Navbar Start -->


<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="dashboard-auditee.php">
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
                        <div class="sb-sidenav-menu-heading"><img src="ASSETS/logounisla.jpg" alt="" width="60px" height="60px"></div>

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
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></i></div>
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


        <!-- konten Start -->
        <div id="layoutSidenav_content">
            <div class="container-fluid px-4">
                <h4 class="mt-4">AUDIT MUTU INTERNAL</h4>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "db_siamiunisla";

                // Membuat koneksi
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Memeriksa koneksi
                if ($conn->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }
                ?>
                <div class="card">
                    <h5 class="card-header bg-dark text-white">Audit Tersedia</h5>
                    <div class="card-body">
                        <div class="container">
                            <div class="row align-items-start">

                                <div class="col-12">
                                    <h4>Instrumen</h4>




                                    <?php
                                    // Ambil nilai id_kriteria dan id_indikator dari URL
                                    $id_indikator = isset($_GET['id_indikator']) ? $_GET['id_indikator'] : null;
                                    $id_kriteria = isset($_GET['id_kriteria']) ? $_GET['id_kriteria'] : null;
                                    //$id_audit = isset($_GET['id_audit']) ? $_GET['id_audit'] : null;


                                    if ($id_indikator !== null && $id_kriteria !== null) {

                                        if ($query = "SELECT * FROM jawab WHERE ID_JAWAB IS NULL") {
                                            $sql = "SELECT
                                                indikator.INDIKATOR,
                                                jawab.JAWAB,
                                                jawab.NILAI,
                                                jawab.ID_JAWAB,
                                                audit.NILAI_AUDITEE,
                                                audit.NILAI_AUDITOR,
                                                audit.DOKUMEN,
                                                audit.ID_AUDIT
                                            FROM 
                                                audit
                                            JOIN 
                                                jawab ON audit.ID_JAWAB = jawab.ID_JAWAB
                                            JOIN
                                                indikator ON jawab.ID_INDIKATOR = indikator.ID_INDIKATOR
                                            WHERE 
                                                audit.ID_AUDIT = '$id_indikator' AND
                                                jawab.ID_KRITERIA = '$id_kriteria'";
                                        } else {
                                            $sql = "SELECT
                                                indikator.INDIKATOR,
                                                jawab.JAWAB,
                                                jawab.NILAI,
                                                jawab.ID_JAWAB,
                                                audit.NILAI_AUDITEE,
                                                audit.NILAI_AUDITOR,
                                                audit.DOKUMEN,
                                                indikator.ID_KRITERIA
                                            FROM 
                                                audit
                                            JOIN 
                                                jawab ON audit.ID_JAWAB = jawab.ID_JAWAB
                                            JOIN
                                                indikator ON jawab.ID_INDIKATOR = indikator.ID_INDIKATOR
                                            WHERE 
                                                
                                                jawab.ID_KRITERIA = '$id_kriteria'";
                                        }

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // Initialize an associative array to store results grouped by INDIKATOR
                                            $groupedResults = array();

                                            // Fetch each row and group by INDIKATOR
                                            while ($row = $result->fetch_assoc()) {
                                                $indikator = $row["INDIKATOR"];
                                                $n_auditee = $row["NILAI_AUDITEE"];
                                                $n_auditor = $row["NILAI_AUDITOR"];
                                                $doc = $row["DOKUMEN"];

                                                // Check if the INDIKATOR is already a key in the array
                                                if (!isset($groupedResults[$indikator])) {
                                                    $groupedResults[$indikator] = array();
                                                }
                                            }

                                            // Output data for each INDIKATOR group
                                            $rowNumber = 1;
                                            foreach ($groupedResults as $indikator => $group) {
                                    ?>
                                                <table style="text-align: justify;" class="table table-striped table-hover">

                                                    <?php
                                                    $maxIndikatorQuery = "SELECT MAX(ID_INDIKATOR) AS max_indikator FROM indikator WHERE ID_KRITERIA = '$id_kriteria'";
                                                    $maxIndikatorResult = $conn->query($maxIndikatorQuery);

                                                    if ($maxIndikatorResult->num_rows > 0) {
                                                        $maxIndikatorRow = $maxIndikatorResult->fetch_assoc();
                                                        $maxIndikator = $maxIndikatorRow['max_indikator'];
                                                    } else {
                                                        // Tangani kasus ketika tidak ada baris yang dikembalikan
                                                        $maxIndikator = 0;
                                                    }
                                                    ?>
                                                    <!-- Tambahkan tautan ini di tempat Anda ingin menampilkan navigasi -->
                                                    <thead>
                                                        <tr>
                                                            <td><?php
                                                                $prevIndikator = $id_indikator - 1;
                                                                if ($prevIndikator > -1) {
                                                                    echo '<a href="auditee-jawaban.php?id_indikator=' . urlencode($prevIndikator) . '&id_kriteria=' . urlencode($id_kriteria) . '" class="btn btn-secondary"> <i class="fas fa-arrow-left"></i> Sebelumnya
</a>';
                                                                } ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td> <?php
                                                                    // Periksa jika ada halaman berikutnya
                                                                    $nextIndikator = $id_indikator + 1;
                                                                    if ($nextIndikator <= $maxIndikator) {
                                                                        echo '<a href="auditee-jawaban.php?id_indikator=' . urlencode($nextIndikator) . '&id_kriteria=' . urlencode($id_kriteria) . '" class="btn btn-primary">Selanjutnya <i class="fas fa-arrow-right"></i></a>';
                                                                    }
                                                                    ?>
                                                                <?php
                                                                // Periksa jika ada halaman berikutnya
                                                                $nextIndikator = $id_indikator + 1;
                                                                if ($nextIndikator > $maxIndikator) {
                                                                    echo '<a href="auditee-tersedia.php" class="btn btn-warning">Pilih Pertanyaan</a>';
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>

                                                        <thead>
                                                            <tr>
                                                                <th width="10px">NO</th>
                                                                <th widht="20px"></th>
                                                                <th width="1000px">KOMPONEN</th>
                                                                <th widht="100px">Penilaian Auditor</th>
                                                                <th widht="100px">Penilaian Auditee</th>
                                                                <th width="50px">Aksi</th>
                                                                <th width="50px">Dokumen</th>
                                                            </tr>




                                                            <tr>
                                                                <td style="text-align: left; vertical-align: top;"><?php echo $rowNumber++ ?></td>
                                                                <td></td>
                                                                <td style="text-align: left; vertical-align: top;">
                                                                    <?php
                                                                    $kategori = mysqli_query($conn, "SELECT * FROM indikator WHERE ID_INDIKATOR = $id_indikator");
                                                                    while ($z = mysqli_fetch_array($kategori)) {
                                                                    ?>


                                                                        <?php echo $z['INDIKATOR'] ?>
                                                                    <?php } ?></td>



                                                                <td style="text-align: left; vertical-align: top;">
                                                                    <?php echo ($n_auditor !== null) ? $n_auditor : '<span style="color: red; font-style: italic;">Belum ada nilai</span>'; ?>
                                                                </td>
                                                                <td style="text-align: left; vertical-align: top;">
                                                                    <?php echo ($n_auditee !== null) ? $n_auditee : '<span style="color: red; font-style: italic;">Belum ada nilai</span>'; ?>
                                                                </td>


                                                                <td style="text-align: left; vertical-align: top;">
                                                                    <form action="" method="POST">
                                                                        <select class="form-control" id="nilai" name="nilai" required>
                                                                            <option value="">--Pilih--</option>
                                                                            <?php
                                                                            $kategori = mysqli_query($conn, "SELECT indikator.INDIKATOR, jawab.JAWAB, jawab.NILAI, jawab.ID_JAWAB FROM indikator JOIN jawab ON indikator.ID_INDIKATOR = jawab.ID_INDIKATOR WHERE indikator.ID_INDIKATOR = $id_indikator AND jawab.ID_KRITERIA = $id_kriteria");
                                                                            while ($z = mysqli_fetch_array($kategori)) {
                                                                            ?>
                                                                                <option value="<?php echo $z['NILAI'] ?>">
                                                                                    <?php echo $z['NILAI'] ?>
                                                                                </option>
                                                                            <?php } ?>

                                                                        </select>

                                                                        <button type="submit" class="btn btn-primary" name="submit" style="margin-top: 10px;">Simpan</button>
                                                                    </form>

                                                                </td>


                                                                <td style="text-align: left; vertical-align: top;">
                                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                        +
                                                                    </button>
                                                                </td>
                                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">TAMBAH DATA PERBAIKAN</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <form action="" method="POST">
                                                                                <div class="modal-body">
                                                                                    <!-- Formulir untuk pengisian data -->

                                                                                    <div class="form-group">
                                                                                        <label for="urll">Masukan URL Baru <i style="color: red;">( Di isi oleh auditee )</i></label>
                                                                                        <input type="text" class="form-control" id="urll" name="urll" placeholder="Masukkan URL ">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="akar_penyebab">Akar Penyebabnya? <i style="color: red;">( Di isi oleh auditee )</i></label>
                                                                                        <textarea class="form-control" id="akar_penyebab" rows="3" placeholder="Apa akar penyebabnya?"></textarea>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="rencana_perbaikan">Apa Rencana
                                                                                            Perbaikan Perbaikannya? <i style="color: red;">( Di isi oleh auditee )</i></label>
                                                                                        <textarea class="form-control" id="rencana_perbaikan" rows="3" placeholder="Apa rencana perbaikannya?"></textarea>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="rentang_waktu_perbaikan">Rentang
                                                                                            Waktu Perbaikan <i style="color: red;">( Di isi oleh auditee )</i></label>
                                                                                        <input type="text" class="form-control" id="rentang_waktu_perbaikan" placeholder="Rentang waktu perbaikan">
                                                                                    </div>

                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>

                                                                                    <button type="submit" class="btn btn-primary" name="simpen">Simpan</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td><b>NILAI</b></td>
                                                                <td><b>JAWABAN</b></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <?php // foreach ($group as $item) : 
                                                            ?><?php
                                                                $kategori = mysqli_query($conn, "SELECT * FROM jawab WHERE ID_INDIKATOR = $id_indikator");
                                                                while ($z = mysqli_fetch_array($kategori)) {
                                                                ?>
                                                            <tr>

                                                                <td></td>

                                                                <td style="text-align: left; vertical-align: top;"><?php echo $z['NILAI'] ?></td>
                                                                <td style="text-align: left; vertical-align: top;"><?php echo $z['JAWAB'] ?></td>


                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>

                                                        <?php // endforeach; 
                                                                } ?>

                                                        <tr>
                                                            <td></td>
                                                            <td>note</td>
                                                        </tr> <?php


                                                            }
                                                        } else {
                                                            echo '<script>alert("Silahkan Pilih Pertanyaan Lagi \u{1F6A8}")</script>';
                                                            echo '<script>window.location.href = "auditee-pertanyaan.php?id=' . urlencode($id_kriteria) . '";</script>';
                                                        }

                                                        // $conn->close();
                                                    } else {
                                                        echo '<script>alert("Silahkan Pilih Pertanyaan Lagi \u{1F6A8}")</script>';
                                                        echo '<script>window.location.href = "auditee-pertanyaan.php?id=' . urlencode($id_kriteria) . '";</script>';
                                                    } ?>

                                                        </thead>
                                                    <tbody>
                                                        <!-- Isi sesuai kebutuhan -->
                                                    </tbody>
                                                </table>
                                </div>
                            </div>
                        </div>
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
<!-- Di antara tag <body> dan <html> -->
<?php
// Your existing code...

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Check if the 'nilai' is set in the POST data
    // if (isset($_POST['nilai'])) {
    // Get the selected nilai from the POST data
    $selectedNilai = $_POST['nilai'];
    $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);

    // Perform the update query here
    // You need to replace the placeholders with the actual column names and table names from your database
    $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$selectedNilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

    // Execute the update query
    if ($conn->query($updateQuery) === TRUE) {
        echo '<script>alert("UBAH DATA BERHASIL")</script>';
        echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
    }
    // }
} ?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['simpen'])) {
    // Check if the 'urll' is set in the POST data
    if (isset($_POST['urll'])) {
        // Get the selected value from the POST data
        $urll = $_POST['urll'];
        $akar_penyebab = $_POST['akar_penyebab'];
        $rencana_perbaikan = $_POST['rencana_perbaikan'];
        $rentang_waktu_perbaikan = $_POST['rentang_waktu_perbaikan'];

        // Perform the update query here
        $updateQuery1 = "UPDATE audit SET DOKUMEN = '$urll' WHERE ID_AUDIT = '$id_indikator'";


        // Execute the update query
        if ($conn->query($updateQuery1) === TRUE) {
            echo '<script>alert("UBAH DATA BERHASIL")</script>';
            echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
        }
    }
    //$updateQuery = "UPDATE audit SET DOKUMEN = '$urll', AKAR_PENYEBAB = '$akar_penyebab', RENCANA_PERBAIKAN = '$rencana_perbaikan', RENTANG_WAKTU_PERBAIKAN = '$rentang_waktu_perbaikan' WHERE ID_AUDIT = '$id_indikator'";
}

?>

</html>