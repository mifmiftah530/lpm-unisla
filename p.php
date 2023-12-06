<?php
//include 'koneksi.php';
require 'ceklogin.php';
?>
<!-- db start -->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ... (Bagian head tetap sama) ... -->
</head>

<body class="sb-nav-fixed">
    <!-- ... (Bagian body tetap sama) ... -->

    <!-- konten Start -->
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
                                <table style="text-align: justify;" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th width="10px">NO</th>
                                            <th width="20px"></th>
                                            <th width="1000px">KOMPONEN</th>
                                            <th width="100px">Penilaian Audite</th>
                                            <th width="100px">Penilaian Auditor</th>
                                            <th width="50px">Aksi</th>
                                            <th width="50px">Dokumen</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        // ... (Bagian kode yang tidak berubah)

                                        if ($id_indikator !== null && $id_kriteria !== null) {

                                            if ($query = "SELECT * FROM jawab WHERE ID_JAWAB IS NULL") {
                                                $sql = "SELECT
                                                indikator.INDIKATOR,
                                                jawab.JAWAB,
                                                jawab.NILAI,
                                                jawab.ID_JAWAB,
                                                audit.NILAI_AUDITEE,
                                                audit.NILAI_AUDITOR,
                                                audit.DOKUMEN
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
                                                audit.DOKUMEN
                                            FROM 
                                                audit
                                            JOIN 
                                                jawab ON audit.ID_JAWAB = jawab.ID_JAWAB
                                            JOIN
                                                indikator ON jawab.ID_INDIKATOR = indikator.ID_INDIKATOR
                                            WHERE 
                                                audit.ID_AUDIT = '$id_indikator' OR
                                                jawab.ID_KRITERIA = '$id_kriteria'";
                                            }

                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                // ... (Bagian yang tidak berubah)

                                                // Output data for each INDIKATOR group
                                                $rowNumber = 1;
                                                foreach ($groupedResults as $indikator => $group) { ?>
                                                    <?php
                                                    $kategori = mysqli_query($conn, "SELECT * FROM indikator WHERE ID_INDIKATOR = $id_indikator");
                                                    while ($z = mysqli_fetch_array($kategori)) {
                                                    ?>
                                                        <tr>
                                                            <td style="text-align: left; vertical-align: top;"><?php echo $rowNumber++ ?></td>
                                                            <td></td>
                                                            <td style="text-align: left; vertical-align: top;"><?php echo $z['INDIKATOR'] ?></td>
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
                                                                            </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <button type="submit" class="btn btn-primary" name="submit" style="margin-top: 10px;">Simpan</button>
                                                                </form>
                                                            </td>
                                                            <td style="text-align: left; vertical-align: top;">
                                                                <button style="margin: 1px;" class="btn btn-primary ">link</button>
                                                            </td>
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

                                                        <?php
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
                                        <?php
                                                        }
                                                    }
                                                }
                                            } else {
                                                echo "0 results";
                                            }

                                            $conn->close();
                                        } else {
                                            echo "Variabel ID_KRITERIA atau ID_INDIKATOR tidak terdefinisi atau kosong.";
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
    </div>
    </div>
<!-- Tambahkan referensi ke Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Tombol untuk menampilkan modal -->
<button style="margin: 1px;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data Perbaikan</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Perbaikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulir untuk pengisian data -->
                <form id="perbaikanForm">
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" class="form-control" id="url" placeholder="Masukkan URL">
                    </div>
                    <div class="form-group">
                        <label for="akar_penyebab">Akar Penyebab</label>
                        <textarea class="form-control" id="akar_penyebab" rows="3" placeholder="Apa akar penyebabnya?"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="rencana_perbaikan">Rencana Perbaikan</label>
                        <textarea class="form-control" id="rencana_perbaikan" rows="3" placeholder="Apa rencana perbaikannya?"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="rentang_waktu_perbaikan">Rentang Waktu Perbaikan</label>
                        <input type="text" class="form-control" id="rentang_waktu_perbaikan" placeholder="Rentang waktu perbaikan">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="simpanDataPerbaikan()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan referensi ke Bootstrap JS dan jQuery untuk mengaktifkan modal -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <!-- ... (Bagian script tetap sama) ... -->

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Pastikan form yang sesuai dikirimkan
        if (isset($_POST['submit'])) {
            // Tangani pengiriman formulir
            $selectedValue = $_POST['nilai'];

            // Lakukan tindakan yang diperlukan di sini, misalnya, perbarui database
            // Gantilah pernyataan di bawah ini sesuai kebutuhan
            $updateQuery = $conn->prepare("UPDATE audit SET NILAI_AUDITOR = ? WHERE ID_JAWAB IN (SELECT ID_JAWAB FROM jawab WHERE ID_INDIKATOR = ? AND ID_KRITERIA = ?)");
            $updateQuery->bind_param("iii", $selectedValue, $id_indikator, $id_kriteria);

            if ($updateQuery->execute()) {
                echo "Nilai auditor berhasil diperbarui.";
            } else {
                echo "Error updating record: " . $conn->error;
            }

            $updateQuery->close();
        }
    }
    ?>

</html>