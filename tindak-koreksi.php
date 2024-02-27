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
                width: 960px;
                /* Set the desired width for desktop */
                margin: 0 auto;
                /* Center the container */
            }
        }
    </style>
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

                            <?php echo htmlspecialchars($_SESSION['a_global']->NAMA);
                            $id = htmlspecialchars($_SESSION['a_global']->ID_AUDITOR) ?>

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
                <h4 class="mt-4">AUDIT MUTU INTERNAL</h4>
                <div class="card shadow">
                    <h5 class="card-header bg-success text-white">Tindak Koreksi & RTL</h5>
                    <div class="card-body">
                        <div class="table-responsive">

                            <div class="container">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="btn-group">
                                            <button class="btn btn-danger me-2" onclick="generatePDF()">PDF</button>
                                            <button class="btn btn-primary me-2" onclick="generateWord()">Word</button>
                                            <button class="btn btn-success" onclick="generateExcel()">Excel</button>
                                        </div>

                                    </div>
                                    <div class="col-6 text-end">
                                        <a href="tindak-koreksi-edit.php" class="btn btn-success">Edit Tindak Koreksi & RTL</a>
                                    </div>
                                </div>
                            </div>



                            <table id="data-table" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">NO</th>
                                        <th style="width: 25%;">INDIKATOR</th>
                                        <th style="width: 5%;">NILAI</th>
                                        <th style="width: 20%;">TEMUAN</th>
                                        <th style="width: 20%;">REKOMENDASI</th>
                                        <th style="width: 25%;">TINDAK KOREKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data tabel ditempatkan di sini -->
                                    <?php
                                    $kriteriaTemuan = mysqli_query($koneksi, "SELECT * FROM temuan WHERE ID_AUDITOR = '$id'");
                                    if (mysqli_num_rows($kriteriaTemuan) > 0) {
                                        while ($rowTemuan = mysqli_fetch_array($kriteriaTemuan)) {
                                    ?>
                                            <tr>
                                                <td><?php echo $rowTemuan['ID_AUDIT'] ?></td>
                                                <?php
                                                $id_audit = $rowTemuan['ID_AUDIT'];
                                                $kriteriaIndikator = mysqli_query($koneksi, "SELECT * FROM indikator WHERE ID_INDIKATOR = (SELECT ID_AUDIT FROM temuan WHERE ID_AUDIT = '$id_audit' LIMIT 1)");
                                                if (mysqli_num_rows($kriteriaIndikator) > 0) {
                                                    $rowIndikator = mysqli_fetch_array($kriteriaIndikator);
                                                ?>
                                                    <td><?php echo $rowIndikator['INDIKATOR'] ?></td>
                                                <?php
                                                }
                                                ?>
                                                <td><?php echo $rowTemuan['NILAI'] ?></td>
                                                <td><?php
                                                    if ($rowTemuan['TEMUAN'] == NULL) {
                                                        echo '<i>Belum Diisi</i>';
                                                    } else {
                                                        echo $rowTemuan['TEMUAN'];
                                                    }
                                                    ?></td>

                                                <td><?php
                                                    if ($rowTemuan['REKOMENDASI'] == NULL) {
                                                        echo '<i>Belum Diisi</i>';
                                                    } else {
                                                        echo $rowTemuan['REKOMENDASI'];
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php
                                                    if ($rowTemuan['TINDAK_KOREKSI'] == NULL) {
                                                        echo '<i>Belum Diisi</i>';
                                                    } else {
                                                        echo $rowTemuan['TINDAK_KOREKSI'];
                                                    }
                                                    ?>
                                                </td>
                                            </tr>

                                    <?php
                                        }
                                    } else {
                                        // Handle case when there are no rows
                                    }
                                    ?>


                                </tbody>
                            </table>

                            <!-- PDF library -->
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.0/html2pdf.bundle.js"></script>
                            <!-- Excel (xlsx) library -->
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
                            <script>
                                function generatePDF() {
                                    const element = document.getElementById('data-table');
                                    const options = {
                                        margin: 10,
                                        filename: 'table_to_pdf.pdf',
                                        image: {
                                            type: 'jpeg',
                                            quality: 0.98
                                        },
                                        html2canvas: {
                                            scale: 2
                                        },
                                        jsPDF: {
                                            unit: 'mm',
                                            format: 'a4',
                                            orientation: 'portrait'
                                        }
                                    };

                                    html2pdf(element, options);
                                }

                                function generateExcel() {
                                    const table = document.getElementById('data-table');
                                    const wb = XLSX.utils.table_to_book(table, {
                                        sheet: 'Sheet 1'
                                    });
                                    XLSX.writeFile(wb, 'table_to_excel.xlsx');
                                }

                                function generateWord() {
                                    // Mengarahkan ke skrip PHP yang akan menghasilkan dokumen Word
                                    window.location.href = 'generate_word_tindak_koreksi.php';
                                }
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.0/html2pdf.bundle.js"></script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="js/scripts.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.0/html2pdf.bundle.js"></script>

        <script>
            function generatePDF() {
                // Select the table element by its ID or class
                const element = document.getElementById('data-table');

                // Configuration for html2pdf
                const options = {
                    margin: 10,
                    filename: 'table_to_pdf.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'mm',
                        format: 'a4',
                        orientation: 'portrait'
                    }
                };

                // Use html2pdf to generate the PDF
                html2pdf(element, options);
            }
        </script>


</body>

</html>