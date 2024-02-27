<?php
include("koneksi.php");
require("ceklogin.php");
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
      <main class="container-fluid px-4">
        <h1 class="text-center my-4">Laporan Auditor</h1>
        <div class="row gx-4">
          <div class="col-md-6">
            <div class="card border-success mb-4">
              <div class="card-header bg-success text-white">
                <h5 class="card-title">Formulir Laporan Auditor</h5>
              </div>
              <div class="card-body">
                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th scope="col">Formulir</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tindak Koreksi</td>
                      <td>
                        <button class="btn btn-primary me-2" onclick="generateWord2()"><i class="fas fa-print fa-fw"></i> Cetak</button>
                      </td>
                    </tr>
                    <tr>
                      <td>Temuan AMI</td>
                      <td>
                        <button class="btn btn-primary me-2" onclick="generateWord()"><i class="fas fa-print fa-fw"></i> Cetak</button>
                      </td>
                    </tr>
                    <tr>
                      <td>Berita Acara</td>
                      <td>
                        <a href="#" class="btn btn-primary ">
                          <i class="fas fa-print fa-fw"></i> Cetak
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="d-flex justify-content-between align-items-center mb-4">
                  <h6 class="card-subtitle mb-2 text-muted">Status Verifikasi:</h6>
                  <span class="badge bg-success rounded-pill">Terverifikasi</span>
                </div>
                <div class="alert alert-success" role="alert">
                  <i class="fas fa-check-circle"></i> Berita acara telah terverifikasi!
                </div>
              </div>
            </div>
          </div>
          <?php
          $id = htmlspecialchars($_SESSION['a_global']->ID_AUDITOR);
          $kriteriaIndikator = mysqli_query($koneksi, "SELECT * FROM beritaacara WHERE ID_AUDITOR = '$id'");
          if (mysqli_num_rows($kriteriaIndikator) > 0) {
            $rowIndikator = mysqli_fetch_array($kriteriaIndikator); ?>
            <div class="col-md-6">
              <div class="card border-success mb-4">
                <div class="card-header bg-success text-white">
                  <h5 class="card-title">Upload Berita Acara</h5>
                </div>
                <div class="card-body">
                  <div class="mb-4 d-flex align-items-center">
                    <table class="table table-borderless">
                      <thead>
                        <tr>
                          <th scope="col">Formulir</th>
                          <th scope="col">Aksi</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <form action="" method="post">
                            <td><label for="fileUpload" class="form-label me-2">Upload File:</label></td>
                            <td>
                              <input type="hidden" name="id_berita">
                              <input type="text" name="link" class="form-control" id="fileUpload">
                            </td>
                            <td>
                              <button type="submit" class="btn btn-primary ms-2">Upload</button>
                            </td>
                          </form>
                        </tr>
                        <tr>
                          <td><label for="fileUpload" class="form-label me-2">Link Saya : </label></td>
                          <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalzz">
                              Lihat
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td><label for="fileUpload" class="form-label me-2">Link Dari Auditee : </label></td>
                          <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalaa">
                              Lihat
                            </button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  <?php } ?>
                  <!-- modal auditor -->
                  <div class="modal fade" id="exampleModalzz" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <?php if ($rowIndikator['LINK_AUDITOR'] == Null) {
                          ?> <span style="color: red;">Belum Upload Link Berita Acara</span>
                          <?php
                          } else { ?>
                            <a href="<?php echo $rowIndikator['LINK_AUDITOR']; ?>"><?php echo $rowIndikator['LINK_AUDITOR']; ?></a>
                          <?php } ?>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- midal audite -->
                  <div class="modal fade" id="exampleModalaa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <?php if ($rowIndikator['LINK_AUDITEE'] == Null) {
                          ?> <span style="color: red;">Belum Upload Link Berita Acara</span>
                          <?php
                          } else { ?>
                            <a href="<?php echo $rowIndikator['LINK_AUDITEE']; ?>"><?php echo $rowIndikator['LINK_AUDITEE']; ?></a>
                          <?php } ?>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  </div>
                  <?php
                  if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Retrieve the values from the form
                    $id_auditor = htmlspecialchars($_SESSION['a_global']->ID_AUDITOR);
                    $link = $_POST['link'];


                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "db_siamiunisla";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "UPDATE beritaacara SET
            LINK_AUDITOR = '$link'
            WHERE ID_AUDITOR = '$id_auditor'";

                    if ($conn->query($sql) === TRUE) {
                      echo '<script>window.location.href = window.location.href;</script>';
                    } else {
                      $alertMessage = "Error: " . $sql . "<br>" . $conn->error;
                    }

                    $conn->close();
                  } ?>
                  <div class="d-flex justify-content-between align-items-center">
                    <h6 class="card-subtitle mb-2 text-muted">Status Verifikasi:</h6>
                    <span class="badge bg-success rounded-pill">Terverifikasi</span>
                  </div>
                </div>
              </div>

              <div class="card border-success">
                <div class="card-header bg-success text-white">
                  <h6 class="card-title">Verifikasi</h6>
                </div>
                <div class="card-body">
                  <div class="d-grid gap-2">
                    <a href="#" class="btn btn-outline-warning btn-sm text-center">
                      <i class="fas fa-check-circle"></i> Verifikasi Auditor
                    </a>
                    <a href="#" class="btn btn-outline-success btn-sm text-center" data-bs-toggle="modal" data-bs-target="#selesaiModal">
                      <i class="fas fa-check-circle"></i> Verifikasi Auditor
                    </a>
      </main>
    </div>
  </div>
  <footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
      <div class="d-flex align-items-center justify-content-between small">
        <div class="text-muted">Copyright &copy; Anak D.U.M</div>
        <div>
          <a href="#">Privacy Policy</a>
          &middot;
          <a href="#">Terms &amp; Conditions</a>
        </div>
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
  <script src="js/datatables-simple-demo.js"></script>
</body>
<script>
  function generateWord() {
    // Mengarahkan ke skrip PHP yang akan menghasilkan dokumen Word
    window.location.href = 'generate_word_catatan_lapangan.php';
  }

  function generateWord2() {
    // Mengarahkan ke skrip PHP yang akan menghasilkan dokumen Word
    window.location.href = 'generate_word_tindak_koreksi.php';
  }
</script>

</html>