<!-- db start -->
<?php
//include 'koneksi.php';
require 'ceklogin.php';
?>
<!-- db start -->
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
<!-- Navbar Start -->


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
                        <div class="sb-sidenav-menu-heading"><img src="ASSETS/logounisla.jpg" alt="" width="60px" height="60px"></div>

                        <div class="sb-nav-link-icon"></div>
                        <a class="nav-link" href="profil-auditor.php">
                            <?php echo htmlspecialchars($_SESSION['a_global']->NAMA); ?>

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
        <!-- Navbar Start -->

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

                                    <table style="text-align: justify;" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th width="10px">NO</th>
                                                <th widht="20px"></th>
                                                <th width="1000px">KOMPONEN</th>
                                                <th widht="100px">Penilaian Auditee</th>
                                                <th widht="100px">Penilaian Auditor</th>
                                                <th width="50px">Aksi</th>
                                                <th width="50px">Dokumen</th>
                                            </tr>

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

                                                        // Add the JAWAB and NILAI values to the group
                                                        //$groupedResults[$indikator][] = array(
                                                        //"Jawab" => $row["JAWAB"],
                                                        //"Nilai" => $row["NILAI"]
                                                        //);
                                                        //$id_kriteria = $id_kr; // Replace with the desired ID_KRITERIA value
                                                        //$id_indikator = $id_in; // Replace with the desired ID_INDIKATOR value
                                                    }

                                                    // Output data for each INDIKATOR group
                                                    $rowNumber = 1;
                                                    foreach ($groupedResults as $indikator => $group) { ?>
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
                                                                <?php echo ($n_auditee !== null) ? $n_auditee : '<span style="color: red; font-style: italic;">Belum ada nilai</span>'; ?>
                                                            </td>
                                                            <td style="text-align: left; vertical-align: top;">
                                                                <?php echo ($n_auditor !== null) ? $n_auditor : '<span style="color: red; font-style: italic;">Belum ada nilai</span>'; ?>
                                                            </td>


                                                            <td style="text-align: left; vertical-align: top;">
                                                                <form action="" method="POST">
                                                                    <select class="form-control" id="nilai" name="nilai" required>
                                                                        <option value="">--Pilih--</option>
                                                                        <?php
                                                                        $kategori = mysqli_query($conn, "SELECT indikator.INDIKATOR, jawab.JAWAB, jawab.NILAI FROM indikator JOIN jawab ON indikator.ID_INDIKATOR = jawab.ID_INDIKATOR WHERE indikator.ID_INDIKATOR = $id_indikator AND jawab.ID_KRITERIA = $id_kriteria");
                                                                        while ($z = mysqli_fetch_array($kategori)) {
                                                                        ?>
                                                                            <option value="<?php echo $z['NILAI'] ?>">
                                                                                <?php echo $z['NILAI'] ?>

                                                                            <?php } ?>
                                                                            </option>
                                                                    </select>
                                                                    <button type="submit" class="btn btn-primary" name="submit" style="margin-top: 10px;">Simpan</button>
                                                                </form>
                                                            </td>


                                                            <td style="text-align: left; vertical-align: top;">
                                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                    Doc
                                                                </button>
                                                            </td>
                                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">LINK DOKUMEN TAMBAHAN</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h6>Catatan :</h6> <i style="color: red;">"Silahkan copy atau klik untuk menuju halaman dokumen"</i>
                                                                            <div class="card mt-2">
                                                                                <div class="card-body">
                                                                                    <?php if ($doc !== null) : ?>
                                                                                        <a target="_blank" style="text-decoration: none;" href="<?php echo $doc; ?>"><?php echo $doc; ?></a>
                                                                                    <?php else : ?>
                                                                                        <span style="color: red; font-style: italic;">Dokumen Belum Ada</span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        </div>
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
                                                        echo "0 results";
                                                    }

                                                    // $conn->close();
                                                } else {
                                                    // Handle ketika variabel tidak terdefinisi atau kosong
                                                    echo "Variabel ID_KRITERIA atau ID_INDIKATOR tidak terdefinisi atau kosong.";
                                                }
                                                            ?>

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
    if (isset($_POST['nilai'])) {
        // Get the selected nilai from the POST data
        $selectedNilai = $_POST['nilai'];

        // Perform the update query here
        // You need to replace the placeholders with the actual column names and table names from your database
        $updateQuery = "UPDATE audit SET NILAI_AUDITOR = '$selectedNilai' WHERE ID_AUDIT = '$id_indikator'";

        // Execute the update query
        if ($conn->query($updateQuery) === TRUE) {
            echo '<script>alert("UBAH DATA BERHASIL")</script>';
            echo '<script>window.location.href = "auditor-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
        }
    }
}
?>

</html>