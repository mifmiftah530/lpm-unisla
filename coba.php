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
        <a class="navbar-brand ps-3" href="dashboard-auditor.php">
            <div class="d-flex align-items-center">
                <img src="ASSETS/logounisla.png" alt="" width="25px" height="25px" class="me-2">
                <span>Audit Mutu Internal</span>
            </div>
        </a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </form>
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
                            <!-- Isi sesuai kebutuhan -->
                        </a>
                        <!-- ... (sisa HTML) ... -->
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <div class="container-fluid px-4">
                <h4 class="mt-4">AUDIT MUTU INTERNAL</h4>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "db_siamiunisla";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                ?>

                <div class="card">
                    <h5 class="card-header bg-dark text-white">Audit Tersedia</h5>
                    <div class="card-body">
                        <div class="container">
                            <div class="row align-items-start">

                                <div class="col-12">
                                    <h4>Instrumen</h4>
                                    <table class="table table-striped">
                                        <thead>

                                            <tr>
                                                <th width="10px">NO</th>
                                                <th widht="20px"></th>
                                                <th width="1000px">KOMPONEN</th>
                                                <th widht="100px">Penilaian Audite</th>
                                                <th widht="100px">Penilaian Auditor</th>
                                                <th width="50px">Aksi</th>
                                                <th width="50px">Dokumen</th>
                                            </tr>

                                            <?php
                                            $servername = "localhost";
                                            $username = "root";
                                            $password = "";
                                            $dbname = "db_siamiunisla";
                                            $id_kriteria = 1; // Replace with the desired ID_KRITERIA value
                                            $id_indikator = 2; // Replace with the desired ID_INDIKATOR value

                                            // Create connection
                                            $conn = new mysqli($servername, $username, $password, $dbname);

                                            // Check connection
                                            if ($conn->connect_error) {
                                                die("Connection failed: " . $conn->connect_error);
                                            }

                                            $sql = "SELECT
            indikator.INDIKATOR,
            jawab.JAWAB,
            jawab.NILAI
        FROM 
            indikator
        JOIN 
            jawab ON indikator.ID_INDIKATOR = jawab.ID_INDIKATOR
        WHERE 
            jawab.ID_KRITERIA = $id_kriteria AND
            indikator.ID_INDIKATOR = $id_indikator";

                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                // Initialize an associative array to store results grouped by INDIKATOR
                                                $groupedResults = array();

                                                // Fetch each row and group by INDIKATOR
                                                while ($row = $result->fetch_assoc()) {
                                                    $indikator = $row["INDIKATOR"];

                                                    // Check if the INDIKATOR is already a key in the array
                                                    if (!isset($groupedResults[$indikator])) {
                                                        $groupedResults[$indikator] = array();
                                                    }

                                                    // Add the JAWAB and NILAI values to the group
                                                    $groupedResults[$indikator][] = array(
                                                        "Jawab" => $row["JAWAB"],
                                                        "Nilai" => $row["NILAI"]
                                                    );
                                                }

                                                // Output data for each INDIKATOR group
                                                $rowNumber = 1;
                                                foreach ($groupedResults as $indikator => $group) { ?>
                                                    <tr>
                                                        <td><?php echo $rowNumber++ ?></td>
                                                        <td></td>
                                                        <td><?php echo $indikator ?></td>
                                                        <td>nilai auditee</td>
                                                        <td>nilai auditor</td>
                                                        <td>
                                                            <select name="p" id="">
                                                                <option value="">pilih</option>
                                                                <option value="">nilai 1</option>
                                                                <option value="">nilai 2</option>
                                                            </select>
                                                            <button style="margin: 8px;">simpan</button>
                                                        </td>
                                                        <td><a style="background-color: aqua;" href="">LINK</a></td>
                                                    </tr>
                                                    <th>
                                                            <td><b>NILAI</b></td>
                                                            <td><b>JAWABAN</b></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </th>
                                                    <?php foreach ($group as $item) : ?>
                                                        
                                                    <tr>
                                                    
                                                        <td></td>
                                                        
                                                            <td><?= $item['Nilai']; ?></td>
                                                            <td><?= $item['Jawab']; ?></td>
                                                        

                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                    <tr>
                                                        <td></td>
                                                        <td>note</td>
                                                    </tr> <?php

                                                        }
                                                    } else {
                                                        echo "0 results";
                                                    }

                                                    $conn->close();
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
<!-- $sql = "SELECT
            indikator.INDIKATOR,
            jawab.JAWAB,
            jawab.NILAI,
            audit.NILAI_AUDITOR,
            audit.NILAI_AUDITEE,
            audit.DOKUMEN
        FROM 
            indikator
        JOIN 
            jawab ON indikator.ID_INDIKATOR = jawab.ID_INDIKATOR
        JOIN
            audit ON indikator.ID_INDIKATOR = audit.ID_INDIKATOR
        WHERE 
            jawab.ID_KRITERIA = $id_kriteria AND
            indikator.ID_INDIKATOR = $id_indikator";
 -->
</html>