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

// Ambil nilai id_kriteria dan id_indikator dari URL
$id_indikator = isset($_GET['id_indikator']) ? $_GET['id_indikator'] : null;
$id_kriteria = isset($_GET['id_kriteria']) ? $_GET['id_kriteria'] : null;
//$id_audit = isset($_GET['id_audit']) ? $_GET['id_audit'] : null;




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




    if ($id_indikator == 5 && $id_kriteria == 2) { ?>
        <?php $query = "SELECT * FROM JAWAB WHERE ID_JAWAB = 1"; ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll">Jumlah Pendaftar <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="f39" name="f39">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah yang pendaftar yang diterima <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="f40" name="f40">
                </div>
                <button type="submit" name="t1" class="btn btn-success">Simpan</button>
            </form>
        </div>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $f39 = isset($_POST["f39"]) ? $_POST["f39"] : 0;
            $f40 = isset($_POST["f40"]) ? $_POST["f40"] : 0;

            // Fungsi untuk menghitung rasio
            function hitungRasio($f39, $f40)
            {
                if ($f40 != 0) {
                    return $f39 / $f40;
                } else {
                    return "Tidak dapat melakukan pembagian dengan nol.";
                }
            }

            // Fungsi untuk menghitung nilai berdasarkan kondisi
            function hitungNilai($f41)
            {
                if ($f41 >= 5) {
                    return 4;
                } else {
                    return (4 * $f41) / 5;
                }
            }

            // Menghitung rasio
            $rasio = hitungRasio($f39, $f40);
            echo "Rasio: $rasio <br>";

            // Menghitung nilai berdasarkan kondisi
            $nilai = hitungNilai($rasio); // Menggunakan nilai rasio sebagai parameter
            echo "Nilai: $nilai";

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t1'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = $nilai;

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE  = '$id_j',n1 = '$f39' ,n2 = '$f40' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 7 && $id_kriteria == 2) {

        ?>
        <?php $query = "SELECT * FROM JAWAB WHERE ID_JAWAB = 1"; ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll">Jumlah Mahasiswa Asing <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah Mahasiswa <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i2" name="i2">
                </div>
                <button type="submit" name="t2" class="btn btn-success">Simpan</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $input1 = isset($_POST["i1"]) ? $_POST["i1"] : 0;
            $input2 = isset($_POST["i2"]) ? $_POST["i2"] : 0;

            // Fungsi untuk menghitung pma
            function calculatePMA($F53, $F54)
            {
                if ($F53 == 0 || $F54 == 0) {
                    return 0;
                } else {
                    return ($F53 / $F54) * 100;
                }
            }

            // Fungsi untuk menghitung nilai berdasarkan kondisi
            function calculateNilai($F55)
            {
                if ($F55 > 0.01) {
                    return 4;
                } else {
                    return 2 + (200 * $F55);
                }
            }

            // Menghitung rasio
            $pmaResult = calculatePMA($input1, $input2);
            $nilaiResult = calculateNilai($input1);
            // Menampilkan hasil
            echo "Hasil PMA: " . $pmaResult . "%<br>";
            echo "Hasil nilai: " . $nilaiResult;


            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t2'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = $nilaiResult;

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 11 && $id_kriteria == 3) {

        ?>
        <?php $query = "SELECT * FROM JAWAB WHERE ID_JAWAB = 1"; ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll">Jumlah dosen tetap yang ditugaskan sebagai pengampu mata kuliah dengan bidang keahlian yang sesuai dengan kompetensi inti program studi yang diakreditasi (NDTPS) <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <button type="submit" name="t2" class="btn btn-success">Simpan</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $input1 = isset($_POST["i1"]) ? $_POST["i1"] : 0;

            // Menghitung hasil
            function calculateResult($F83)
            {
                if ($F83 >= 12) {
                    return 4;
                } else {
                    return (2 * $F83 + 12) / 9;
                }
            }

            $result = calculateResult($input1);

            // Menampilkan hasil
            echo "Hasil: " . $result;


            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t2'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = $result;

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 12 && $id_kriteria == 3) {
        ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll">NDS3(Jumlah DTPS yang berpendidikan tertinggi Doktor/Doktor Terapan/Subspesialis)<br><i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah dosen tetap yang ditugaskan sebagai pengampu mata kuliah dengan bidang keahlian yang sesuai dengan kompetensi inti program studi yang diakreditasi (NDTPS)<br><i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i2" name="i2">
                </div>
                <button type="submit" name="t3" class="btn btn-success">Simpan</button>
            </form>
        </div>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $f87 = isset($_POST["i1"]) ? $_POST["i1"] : 0;
            $f88 = isset($_POST["i2"]) ? $_POST["i2"] : 0;

            // Fungsi untuk menghitung nilai berdasarkan rumus yang diberikan
            function hitungNilai($f89)
            {
                if ($f89 >= 0.5) {
                    return 4;
                } else {
                    return 2 + (4 * $f89);
                }
            }

            $psd3 = $f87 / $f88;

            // Hitung nilai berdasarkan rumus yang diberikan
            $nilai = hitungNilai($psd3);


            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t3'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = $nilai;

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 13 && $id_kriteria == 3) {
        ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll">NDGB (Jumlah DTPS yang memiliki jabatan akademik Guru Besar)<br><i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <div class="form-group">
                    <label for="urll">NDLK (Jumlah DTPS yang memiliki jabatan akademik Lektor Kepala)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i2" name="i2">
                </div>
                <div class="form-group">
                    <label for="urll">NDL (Jumlah DTPS yang memiliki jabatan akademik Lektor)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i3" name="i3">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah dosen tetap yang ditugaskan sebagai pengampu mata kuliah dengan bidang keahlian yang sesuai dengan kompetensi inti program studi yang diakreditasi (NDTPS)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i4" name="i4">
                </div>
                <button type="submit" name="t3" class="btn btn-success">Simpan</button>
            </form>
        </div>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $f93 = isset($_POST["i1"]) ? $_POST["i1"] : 0;
            $f94 = isset($_POST["i2"]) ? $_POST["i2"] : 0;
            $f95 = isset($_POST["i3"]) ? $_POST["i3"] : 0;
            $f96 = isset($_POST["i4"]) ? $_POST["i4"] : 0;

            // Hitung PGBLKL
            $pgblkl = (($f93 + $f94 + $f95) / $f96) * 1.00;

            // Fungsi untuk menghitung nilai berdasarkan rumus yang diberikan
            function hitungNilai($f97)
            {
                if ($f97 >= 0.7) {
                    return 4;
                } else {
                    return 2 + (20 * $f97) / 7;
                }
            }
            // Hitung nilai berdasarkan rumus yang diberikan
            $nilai = hitungNilai($pgblkl);

            // Tampilkan hasil
            echo "PGBLKL: " . $pgblkl . "%<br>";
            echo "Nilai: " . $nilai . "<br>";

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t3'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = $nilai;

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 14 && $id_kriteria == 3) {

        ?>
        <?php $query = "SELECT * FROM JAWAB WHERE ID_JAWAB = 1"; ?>
        <div class="modal-body">
            <form action="" method="POST">
                <h4>Kelompok Sains Teknologi</h4>
                <hr>
                <div class="form-group">
                    <label for="urll">NM(Jumlah Mahasiswa pada saat TS)<br><i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah dosen tetap yang ditugaskan sebagai pengampu mata kuliah dengan bidang keahlian yang sesuai dengan kompetensi inti program studi yang diakreditasi (NDTPS)<br><i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i2" name="i2">
                </div>
                <h4>Kelompok Sosial Humaniora</h4>
                <hr>
                <div class="form-group">
                    <label for="urll">NM(Jumlah Mahasiswa pada saat TS)<br><i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i3" name="i3">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah dosen tetap yang ditugaskan sebagai pengampu mata kuliah dengan bidang keahlian yang sesuai dengan kompetensi inti program studi yang diakreditasi (NDTPS)<br><i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i4" name="i4">
                </div>
                <button type="submit" name="t2" class="btn btn-success">Simpan</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["i1"], $_POST["i2"], $_POST["i3"], $_POST["i4"])) {
                $f102 = isset($_POST["i1"]) ? $_POST["i1"] : 0;
                $f103 = isset($_POST["i2"]) ? $_POST["i2"] : 0;
                $f107 = isset($_POST["i3"]) ? $_POST["i3"] : 0;
                $f108 = isset($_POST["i4"]) ? $_POST["i4"] : 0;
                // Fungsi untuk menghitung nilai saintek berdasarkan rumus yang diberikan
                function hitungNilaiSaintek($f104)
                {
                    if ($f104 >= 15 && $f104 <= 25) {
                        return 4;
                    } elseif ($f104 < 15) {
                        return (4 * $f104) / 15;
                    } elseif ($f104 > 25 && $f104 <= 35) {
                        return (70 - (2 * $f104)) / 5;
                    } else {
                        return 0;
                    }
                }

                // Fungsi untuk menghitung nilai soshum berdasarkan rumus yang diberikan
                function hitungNilaiSoshum($f109)
                {
                    if ($f109 >= 25 && $f109 <= 35) {
                        return 4;
                    } elseif ($f109 < 25) {
                        return (4 * $f109) / 25;
                    } elseif ($f109 > 35 && $f109 <= 50) {
                        return (200 - (4 * $f109)) / 15;
                    } else {
                        return 0;
                    }
                }

                // Fungsi untuk menghitung nilai akhir berdasarkan rumus yang diberikan
                function hitungNilaiAkhir($f105, $f110)
                {
                    if ($f105 == 0) {
                        return $f110;
                    } elseif ($f110 == 0) {
                        return $f105;
                    }
                }

                // Hitung nilai RMD Saintek dan Soshum
                $rmdSaintek = $f102 / $f103;
                $nilaiSaintek = hitungNilaiSaintek($rmdSaintek);

                $rmdSoshum = $f107 / $f108;
                $nilaiSoshum = hitungNilaiSoshum($rmdSoshum);

                // Hitung nilai akhir
                $nilaiAkhir = hitungNilaiAkhir($nilaiSaintek, $nilaiSoshum);

                // Tampilkan hasil
                echo "RMD Saintek: " . $rmdSaintek . "<br>";
                echo "Nilai Saintek: " . $nilaiSaintek . "<br>";
                echo "RMD Soshum: " . $rmdSoshum . "<br>";
                echo "Nilai Soshum: " . $nilaiSoshum . "<br>";
                echo "Nilai Akhir: " . $nilaiAkhir . "<br>";
            } else {
                echo "Mohon isi semua input.";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t2'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = $nilaiAkhir;

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 15 && $id_kriteria == 3) {

        ?>
        <?php $query = "SELECT * FROM JAWAB WHERE ID_JAWAB = 1"; ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll">RDPU (Rata-rata jumlah bimbingan sebagai pembimbing utama di seluruh program/semester)<br><i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <button type="submit" name="t2" class="btn btn-success">Simpan</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["i1"])) {
                $f114 = isset($_POST["i1"]) ? $_POST["i1"] : 0;
                function hitungNilai($f114)
                {
                    if ($f114 <= 6) {
                        return 4;
                    } elseif ($f114 > 6 && $f114 <= 10) {
                        return 7 - ($f114 / 2);
                    } else {
                        return 0;
                    }
                }

                // Hitung nilai berdasarkan rumus yang diberikan
                $nilai = hitungNilai($f114);

                // Tampilkan hasil
                echo "Nilai: " . $nilai . "<br>";
            } else {
                echo "Mohon isi input F114.";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t2'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = $nilai;

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 16 && $id_kriteria == 3) {
        ?>
        <?php $query = "SELECT * FROM JAWAB WHERE ID_JAWAB = 1"; ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll">EWMP<br><i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <button type="submit" name="t2" class="btn btn-success">Simpan</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["i1"])) {
                $f118 = isset($_POST["i1"]) ? $_POST["i1"] : 0;
                function hitungNilai($f118)
                {
                    if ($f118 >= 12 && $f118 <= 16) {
                        return 4;
                    } elseif ($f118 >= 6 && $f118 < 12) {
                        return ((2 * $f118) - 12) / 3;
                    } elseif ($f118 > 16 && $f118 <= 18) {
                        return 36 - (2 * $f118);
                    } else {
                        return 0;
                    }
                }

                // Hitung nilai berdasarkan rumus yang diberikan
                $nilai = hitungNilai($f118);

                // Tampilkan hasil
                echo "Nilai: " . $nilai . "<br>";
            } else {
                echo "Mohon isi input F118.";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t2'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = $nilai;

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 17 && $id_kriteria == 3) {

        ?>
        <?php $query = "SELECT * FROM JAWAB WHERE ID_JAWAB = 1"; ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll">NDTT(Jumlah dosen tidak tetap yang ditugaskan sebagai pengampu mata kuliah di program studi yang diakreditasi)<br><i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <div class="form-group">
                    <label for="urll">NDT(Jumlah dosen tetap yang ditugaskan sebagai pengampu mata kuliah di program studi yang diakreditasi)<br><i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i2" name="i2">
                </div>
                <button type="submit" name="t2" class="btn btn-success">Simpan</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["i1"], $_POST["i2"])) {
                $f122 = isset($_POST["i1"]) ? $_POST["i1"] : 0;
                $f123 = isset($_POST["i2"]) ? $_POST["i2"] : 0;
                // Fungsi untuk menghitung PDTT
                function hitungPDTT($f122, $f123)
                {
                    return ($f122 / ($f123 + $f122)) * 1;
                }

                // Fungsi untuk menghitung nilai berdasarkan rumus yang diberikan
                function hitungNilai($f124)
                {
                    if ($f124 <= 0.1) {
                        return 4;
                    } elseif ($f124 > 0.1 && $f124 <= 0.4) {
                        return (14 - (20 * $f124)) / 3;
                    } else {
                        return 0;
                    }
                }

                // Hitung PDTT
                $pdtt = hitungPDTT($f122, $f123);

                // Hitung nilai berdasarkan rumus yang diberikan
                $nilai = hitungNilai($pdtt);

                // Tampilkan hasil
                echo "PDTT: " . $pdtt . "%<br>";
                echo "Nilai: " . number_format($nilai, 2) . "<br>";
            } else {
                echo "Mohon isi input F122 dan F123.";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t2'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = number_format($nilai, 2);

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 18 && $id_kriteria == 3) {

        ?>
        <?php $query = "SELECT * FROM JAWAB WHERE ID_JAWAB = 1"; ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll">Jumlah Pengakuan atas prestasi/kinerja DTPS yang relevan dengan bidang keahlian dalam 3 tahun terakhir (NRD)<br><i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah dosen tetap yang ditugaskan sebagai pengampu mata kuliah dengan bidang keahlian yang sesuai dengan kompetensi inti program studi yang diakreditasi (NDTPS)<br><i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i2" name="i2">
                </div>
                <button type="submit" name="t2" class="btn btn-success">Simpan</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["i1"], $_POST["i2"])) {
                $f128 = isset($_POST["i1"]) ? $_POST["i1"] : 0;
                $f129 = isset($_POST["i2"]) ? $_POST["i2"] : 0;
                function hitungRRD($f128, $f129)
                {
                    return $f128 / $f129;
                }

                // Fungsi untuk menghitung nilai berdasarkan rumus yang diberikan
                function hitungNilai($f130)
                {
                    if ($f130 >= 0.5) {
                        return 4;
                    } else {
                        return 2 + (4 * $f130);
                    }
                }

                // Hitung RRD
                $rrd = hitungRRD($f128, $f129);

                // Hitung nilai berdasarkan rumus yang diberikan
                $nilai = hitungNilai($rrd);

                // Tampilkan hasil
                echo "RRD: " . number_format($rrd, 2) . "<br>"; // Menampilkan dengan 2 digit desimal
                echo "Nilai: " . number_format($nilai, 2) . "<br>"; // Menampilkan dengan 2 digit desimal
            } else {
                echo "Mohon isi semua input.";
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t2'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = number_format($nilai, 5);

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 19 && $id_kriteria == 3) {
        ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll">Jumlah penelitian dengan sumber pembiayaan luar negeri dalam 3 tahun terakhir (NI)<br><i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah penelitian dengan sumber pembiayaan dalam negeri dalam 3 tahun terakhir (NN)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i2" name="i2">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah penelitian dengan sumber pembiayaan PT/mandiri dalam 3 tahun terakhir (NL)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i3" name="i3">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah dosen tetap yang ditugaskan sebagai pengampu mata kuliah dengan bidang keahlian yang sesuai dengan kompetensi inti program studi yang diakreditasi (NDTPS)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i4" name="i4">
                </div>
                <button type="submit" name="t3" class="btn btn-success">Simpan</button>
            </form>
        </div>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $f134 = isset($_POST["i1"]) ? $_POST["i1"] : 0;
            $f135 = isset($_POST["i2"]) ? $_POST["i2"] : 0;
            $f136 = isset($_POST["i3"]) ? $_POST["i3"] : 0;
            $f137 = isset($_POST["i4"]) ? $_POST["i4"] : 0;

            // Fungsi untuk menghitung RI
            function hitungRI($f134, $f137)
            {
                return ($f134 / 3) / $f137;
            }

            // Fungsi untuk menghitung RN
            function hitungRN($f135, $f137)
            {
                return ($f135 / 3) / $f137;
            }

            // Fungsi untuk menghitung RL
            function hitungRL($f136, $f137)
            {
                return ($f136 / 3) / $f137;
            }

            // Fungsi untuk menghitung nilai berdasarkan rumus yang diberikan
            function hitungNilai($f138, $f139, $f140)
            {
                if ($f138 >= 0.05) {
                    return 4;
                } elseif ($f138 < 0.05 && $f139 >= 0.3) {
                    return 3 + ($f138 / 0.05);
                } elseif (($f138 > 0 && $f138 < 0.05) || ($f139 > 0 && $f139 < 0.3)) {
                    return 2 + (2 * ($f138 / 0.05)) + ($f139 / 0.3) - (($f138 * $f139) / (0.05 * 0.3));
                } elseif ($f140 >= 1) {
                    return 2;
                } else {
                    return 2 * $f140;
                }
            }

            // Hitung RI, RN, dan RL
            $ri = hitungRI($f134, $f137);
            $rn = hitungRN($f135, $f137);
            $rl = hitungRL($f136, $f137);

            // Hitung nilai berdasarkan rumus yang diberikan
            $nilai = hitungNilai($ri, $rn, $rl);

            // Tampilkan hasil
            echo "RI: " . number_format($ri, 2) . "<br>"; // Menampilkan dengan 2 digit desimal
            echo "RN: " . number_format($rn, 2) . "<br>"; // Menampilkan dengan 2 digit desimal
            echo "RL: " . number_format($rl, 2) . "<br>"; // Menampilkan dengan 2 digit desimal
            echo "Nilai: " . number_format($nilai, 2) . "<br>"; // Menampilkan dengan 2 digit desimal
        }



        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t3'])) {
            $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
            $n_nilai = $nilai;

            // Melakukan query update di sini
            // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
            $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

            // Eksekusi query update
            if ($conn->query($updateQuery) === TRUE) {
                echo '<script>alert("UBAH DATA BERHASIL")</script>';
                echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }

    if ($id_indikator == 20 && $id_kriteria == 3) {
        ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll"> Jumlah publikasi di jurnal nasional tidak terakreditasi (NA1)<br><i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah publikasi di jurnal nasional terakreditasi (NA2)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i2" name="i2">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah publikasi di jurnal internasional(NA3)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i3" name="i3">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah publikasi di jurnal internasional bereputasi(NA4)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i4" name="i4">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah publikasi di seminar wilayah/lokal/PT(NB1)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i5" name="i5">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah publikasi di seminar nasional(NB2)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i6" name="i6">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah publikasi di seminar internasional(NB3)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i7" name="i7">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah publikasi di media massa wilayah (NC1)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i8" name="i8">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah publikasi di media massa nasional (NC2)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i9" name="i9">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah publikasi di media massa internasional (NC3)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i10" name="i10">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah dosen tetap yang ditugaskan sebagai pengampu mata kuliah dengan bidang keahlian yang sesuai dengan kompetensi inti program studi yang diakreditasi (NDTPS)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i11" name="i11">
                </div>
                <button type="submit" name="t3" class="btn btn-success">Simpan</button>
            </form>
        </div>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["i1"], $_POST["i2"], $_POST["i3"], $_POST["i4"], $_POST["i5"], $_POST["i6"], $_POST["i7"], $_POST["i8"], $_POST["i9"], $_POST["i10"], $_POST["i11"])) {
                $f144 = isset($_POST["i1"]) ? $_POST["i1"] : 0;
                $f145 = isset($_POST["i2"]) ? $_POST["i2"] : 0;
                $f146 = isset($_POST["i3"]) ? $_POST["i3"] : 0;
                $f147 = isset($_POST["i4"]) ? $_POST["i4"] : 0;
                $f148 = isset($_POST["i5"]) ? $_POST["i5"] : 0;
                $f149 = isset($_POST["i6"]) ? $_POST["i6"] : 0;
                $f150 = isset($_POST["i7"]) ? $_POST["i7"] : 0;
                $f151 = isset($_POST["i8"]) ? $_POST["i8"] : 0;
                $f152 = isset($_POST["i9"]) ? $_POST["i9"] : 0;
                $f153 = isset($_POST["i10"]) ? $_POST["i10"] : 0;
                $f154 = isset($_POST["i11"]) ? $_POST["i11"] : 0;

                // Fungsi untuk menghitung RW
                function hitungRW($f144, $f148, $f151, $f154)
                {
                    return ($f144 + $f148 + $f151) / $f154;
                }

                // Fungsi untuk menghitung RN
                function hitungRN($f145, $f146, $f149, $f152, $f154)
                {
                    return ($f145 + $f146 + $f149 + $f152) / $f154;
                }

                // Fungsi untuk menghitung RI
                function hitungRI($f147, $f150, $f153, $f154)
                {
                    return ($f147 + $f150 + $f153) / $f154;
                }

                // Hitung RW, RN, dan RI
                $rw = hitungRW($f144, $f148, $f151, $f154);
                $rn = hitungRN($f145, $f146, $f149, $f152, $f154);
                $ri = hitungRI($f147, $f150, $f153, $f154);

                // Fungsi untuk menghitung nilai berdasarkan rumus yang diberikan
                function hitungNilai($rw, $rn, $ri)
                {
                    if ($ri >= 0.1) {
                        return 4;
                    } elseif ($ri < 0.1 && $rn >= 1) {
                        return 3 + ($ri / 0.1);
                    } elseif (($ri > 0 && $ri < 0.1) || ($rn > 0 && $rn < 1)) {
                        return 2 + 2 * ($ri / 0.1) + $rn / 1 - ($ri * $rn) / (0.1 * 1);
                    } elseif ($rw >= 2) {
                        return 2 * ($rw / 2);
                    } else {
                        return 2 * ($rw / 2);
                    }
                }



                // Hitung nilai berdasarkan rumus yang diberikan
                $nilai = hitungNilai($rw, $rn, $ri);

                // Tampilkan hasil
                echo "RW: " . number_format($rw, 2) . "<br>"; // Menampilkan dengan 2 digit desimal
                echo "RN: " . number_format($rn, 2) . "<br>"; // Menampilkan dengan 2 digit desimal
                echo "RI: " . number_format($ri, 2) . "<br>"; // Menampilkan dengan 2 digit desimal
                echo "Nilai: " . number_format($nilai, 2) . "<br>"; // Menampilkan dengan 2 digit desimal
            } else {
                echo "Mohon isi semua input.";
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t3'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = $nilai;

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 21 && $id_kriteria == 3) {

        ?>
        <?php $query = "SELECT * FROM JAWAB WHERE ID_JAWAB = 1"; ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll">Jumlah artikel yang disitasi (NAS)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah dosen tetap yang ditugaskan sebagai pengampu mata kuliah dengan bidang keahlian yang sesuai dengan kompetensi inti program studi yang diakreditasi (NDTPS)<br><i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i2" name="i2">
                </div>
                <button type="submit" name="t2" class="btn btn-success">Simpan</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $f161 = isset($_POST["i1"]) ? $_POST["i1"] : 0;
            $f162 = isset($_POST["i2"]) ? $_POST["i2"] : 0;

            // Fungsi untuk menghitung rs
            function hitungRS($f161, $f162)
            {
                return $f161 / $f162;
            }
            // Hitung rs
            $rs = hitungRS($f161, $f162);

            function hitungNilai($rs)
            {
                if ($rs >= 0.5) {
                    return 4;
                } else {
                    return 2 + (4 * $rs);
                }
            }
            // Hitung nilai berdasarkan rumus yang diberikan
            $nilai = hitungNilai($rs);

            echo "rs: " . number_format($rs, 3) . "<br>"; // Menampilkan dengan 2 digit desimal
            echo "Nilai: " . number_format($nilai, 3) . "<br>"; // Menampilkan dengan 2 digit desimal


            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t2'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = $nilai;

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 22 && $id_kriteria == 3) {

        ?>
        <?php $query = "SELECT * FROM JAWAB WHERE ID_JAWAB = 1"; ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll">Jumlah PkM dengan sumber pembiayaan luar negeri dalam 3 tahun terakhir (NI)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah PkM dengan sumber pembiayaan dalam negeri dalam 3 tahun terakhir (NN)<br><i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i2" name="i2">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah PkM dengan sumber pembiayaan PT/mandiri dalam 3 tahun terakhir (NL)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i3" name="i3">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah dosen tetap yang ditugaskan sebagai pengampu mata kuliah dengan bidang keahlian yang sesuai dengan kompetensi inti program studi yang diakreditasi (NDTPS)<br><i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i4" name="i4">
                </div>
                <button type="submit" name="t2" class="btn btn-success">Simpan</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $f167 = isset($_POST["i1"]) ? $_POST["i1"] : 0;
            $f168 = isset($_POST["i2"]) ? $_POST["i2"] : 0;
            $f169 = isset($_POST["i3"]) ? $_POST["i3"] : 0;
            $f170 = isset($_POST["i4"]) ? $_POST["i4"] : 0;

            // Fungsi untuk menghitung ri
            function hitungRI($f167, $f170)
            {
                return ($f167 / 3) / $f170;
            }

            // Fungsi untuk menghitung rn
            function hitungRN($f168, $f170)
            {
                return ($f168 / 3) / $f170;
            }

            // Fungsi untuk menghitung rl
            function hitungRL($f169, $f170)
            {
                return ($f169 / 3) / $f170;
            }

            // Fungsi untuk menghitung nilai berdasarkan rumus yang diberikan
            function hitungNilai($f171, $f172, $f173)
            {
                if ($f171 >= 0.05) {
                    return 4;
                } elseif ($f171 < 0.05 && $f172 >= 0.3) {
                    return 3 + ($f171 / 0.05);
                } elseif (($f171 > 0 && $f171 < 0.05) || ($f172 > 0 && $f172 < 0.3)) {
                    return 2 + 2 * ($f171 / 0.05) + $f172 / 0.3 - ($f171 * $f172) / (0.05 * 0.3);
                } elseif ($f173 >= 1) {
                    return 2;
                } else {
                    return 2 * $f173;
                }
            }

            // Hitung ri, rn, dan rl
            $ri = hitungRI($f167, $f170);
            $rn = hitungRN($f168, $f170);
            $rl = hitungRL($f169, $f170);

            // Hitung nilai berdasarkan rumus yang diberikan
            $nilai = hitungNilai($ri, $rn, $rl);

            // Tampilkan hasil
            echo "ri: " . number_format($ri, 2) . "<br>"; // Menampilkan dengan 2 digit desimal
            echo "rn: " . number_format($rn, 2) . "<br>"; // Menampilkan dengan 2 digit desimal
            echo "rl: " . number_format($rl, 2) . "<br>"; // Menampilkan dengan 2 digit desimal
            echo "Nilai: " . number_format($nilai, 2) . "<br>"; // Menampilkan dengan 2 digit desimal


            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t2'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = $nilai;

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 23 && $id_kriteria == 3) {
        ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll">Jumlah luaran penelitian/PkM yang mendapat pengakuan HKI (Paten, Paten Sederhana) (NA)<br><i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah luaran penelitian/PkM yang mendapat pengakuan HKI (Hak Cipta, Desain Produk Industri, Perlindungan Varietas Tanaman, Desain Tata Letak Sirkuit Terpadu, dll) (NB)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i2" name="i2">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah luaran penelitian/PkM dalam bentuk Teknologi Tepat Guna, Produk (Produk Terstandarisasi, Produk Tersertifikasi), Karya Seni, Rekayasa Sosial (NC)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i3" name="i3">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah luaran penelitian/PkM yang diterbitkan dalam bentuk Buku ber-ISBN, Book Chapter (ND)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i4" name="i4">
                </div>
                <div class="form-group">
                    <label for="urll"> Jumlah dosen tetap yang ditugaskan sebagai pengampu mata kuliah dengan bidang keahlian yang sesuai dengan kompetensi inti program studi yang diakreditasi (NDTPS)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i5" name="i5">
                </div>

                <button type="submit" name="t3" class="btn btn-success">Simpan</button>
            </form>
        </div>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $f177 = isset($_POST["i1"]) ? $_POST["i1"] : 0;
            $f178 = isset($_POST["i2"]) ? $_POST["i2"] : 0;
            $f179 = isset($_POST["i3"]) ? $_POST["i3"] : 0;
            $f180 = isset($_POST["i4"]) ? $_POST["i4"] : 0;
            $f181 = isset($_POST["i5"]) ? $_POST["i5"] : 0;

            // Fungsi untuk menghitung rlp
            function hitungRLP($f177, $f178, $f179, $f180, $f181)
            {
                return (2 * ($f177 + $f178 + $f179) + $f180) / $f181;
            }
            // Hitung rlp
            $rlp = hitungRLP($f177, $f178, $f179, $f180, $f181);
            // Fungsi untuk menghitung nilai berdasarkan rumus yang diberikan
            function hitungNilai($rlp)
            {
                if ($rlp >= 1) {
                    return 4;
                } else {
                    return 2 + 2 * $rlp;
                }
            }



            // Hitung nilai berdasarkan rumus yang diberikan
            $nilai = hitungNilai($rlp);

            // Tampilkan hasil
            echo "rlp: " . number_format($rlp, 2) . "<br>"; // Menampilkan dengan 2 digit desimal
            echo "Nilai: " . number_format($nilai, 2) . "<br>"; // Menampilkan dengan 2 digit desimal


            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t3'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = $nilai;

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 38 && $id_kriteria == 4) {

        ?>
        <?php $query = "SELECT * FROM JAWAB WHERE ID_JAWAB = 1"; ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll">Jam Pembelajaran praktikum, praktik studio, praktik bengkel, atau praktik lapangan (termasuk KKN) (JP)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <div class="form-group">
                    <label for="urll">Jam pembelajaran total selama masa pendidikan (JB)<br><i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i2" name="i2">
                </div>
                <button type="submit" name="t2" class="btn btn-success">Simpan</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $f294 = isset($_POST["i1"]) ? $_POST["i1"] : 0;
            $f295 = isset($_POST["i2"]) ? $_POST["i2"] : 0;

            // Fungsi untuk menghitung pjp
            function hitungPJP($f294, $f295)
            {
                return $f294 / $f295;
            }
            // Hitung pjp
            $pjp = hitungPJP($f294, $f295);

            // Fungsi untuk menghitung nilai berdasarkan rumus yang diberikan
            function hitungNilai($pjp)
            {
                if ($pjp >= 0.20) {
                    return 4;
                } else {
                    return 20 * $pjp;
                }
            }
            // Hitung nilai berdasarkan rumus yang diberikan
            $nilai = hitungNilai($pjp);

            // Tampilkan hasil
            echo "pjp: " . number_format($pjp, 2) . "<br>"; // Menampilkan dengan 2 digit desimal
            echo "Nilai: " . number_format($nilai, 2) . "<br>"; // Menampilkan dengan 2 digit desimal
        }


        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t2'])) {
            $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
            $n_nilai = $nilai;

            // Melakukan query update di sini
            // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
            $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

            // Eksekusi query update
            if ($conn->query($updateQuery) === TRUE) {
                echo '<script>alert("UBAH DATA BERHASIL")</script>';
                echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }

    if ($id_indikator == 46 && $id_kriteria == 5) {

        ?>
        <?php $query = "SELECT * FROM JAWAB WHERE ID_JAWAB = 1"; ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll">NPM (Jumlah judul penelitian DTPS) yang dalam pelaksanaannya melibatkan mahasiswa program studi dalam 3 tahun terakhir<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <div class="form-group">
                    <label for="urll">NPD(Jumlah judul penelitian DTPS dalam 3 tahun terakhir)<br><i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i2" name="i2">
                </div>
                <button type="submit" name="t2" class="btn btn-success">Simpan</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $f356  = isset($_POST["i1"]) ? $_POST["i1"] : 0;
            $f357  = isset($_POST["i2"]) ? $_POST["i2"] : 0;

            // Hitung ppdm
            $ppdm = ($f356 / $f357) * 100;
            // Hitung nilai berdasarkan kondisi
            if ($ppdm >= 25) {
                $nilai = 4;
            } else {
                $nilai = 2 + (8 * $ppdm);
            }

            // Tampilkan hasil
            // echo "Hasil perhitungan ppdm: " . $ppdm . "%<br>";
            // echo "Hasil perhitungan nilai: " . $nilai;

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t2'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = $nilai;

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 50 && $id_kriteria == 6) {

        ?>
        <?php $query = "SELECT * FROM JAWAB WHERE ID_JAWAB = 1"; ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll">NPkMM (Jumlah judul PkM DTPS yang dalam pelaksanaannya melibatkan mahasiswa program studi dalam 3 tahun terakhir)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <div class="form-group">
                    <label for="urll">NPkMD (Jumlah judul PkM DTPS dalam 3 tahun terakhir)<br><i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i2" name="i2">
                </div>
                <button type="submit" name="t2" class="btn btn-success">Simpan</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $f386  = isset($_POST["i1"]) ? $_POST["i1"] : 0;
            $f387  = isset($_POST["i2"]) ? $_POST["i2"] : 0;

            // Hitung PPkMDM
            $ppkmdm = ($f386 / $f387) * 100;
            // Hitung nilai berdasarkan kondisi
            if ($ppkmdm >= 25) {
                $nilai = 4;
            } else {
                $nilai = 2 + (8 * $ppkmdm);
            }

            // Tampilkan hasil
            // echo "Hasil perhitungan ppdm: " . $ppdm . "%<br>";
            // echo "Hasil perhitungan nilai: " . $nilai;

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t2'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = $nilai;

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 52 && $id_kriteria == 7) {

        ?>
        <?php $query = "SELECT * FROM JAWAB WHERE ID_JAWAB = 1"; ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll"> RIPK (Rata-rata IPK lulusan dalam 3 tahun terakhir)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <button type="submit" name="t2" class="btn btn-success">Simpan</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $f400  = isset($_POST["i1"]) ? $_POST["i1"] : 0;

            // Hitung nilai berdasarkan kondisi
            if ($f400 >= 3.25) {
                $nilai = 4;
            } elseif ($f400 >= 2 && $f400 < 3.25) {
                $nilai = ((8 * $f400) - 6) / 5;
            } else {
                $nilai = 2;
            }

            // Tampilkan hasil
            echo "Hasil perhitungan nilai: " . $nilai;

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t2'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = $nilai;

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 53 && $id_kriteria == 7) {

        ?>
        <?php $query = "SELECT * FROM JAWAB WHERE ID_JAWAB = 1"; ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll"> NI (Jumlah prestasi akademik internasional)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <div class="form-group">
                    <label for="urll"> NN (Jumlah prestasi akademik nasional)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i2" name="i2">
                </div>
                <div class="form-group">
                    <label for="urll"> NW (Jumlah prestasi akademik wilayah/lokal)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i3" name="i3">
                </div>
                <div class="form-group">
                    <label for="urll"> NM (Jumlah mahasiswa pada saat TS)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i4" name="i4">
                </div>
                <button type="submit" name="t2" class="btn btn-success">Simpan</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $f404 = $_POST['i1'];
            $f405 = $_POST['i2'];
            $f406 = $_POST['i3'];
            $f407 = $_POST['i4'];
            // Hitung nilai f408, f409, dan f410
            $ri = $f404 / $f407;
            $rn = $f405 / $f407;
            $rw = $f406 / $f407;

            // Hitung nilai berdasarkan kondisi
            if ($ri >= 0.1) {
                $nilai = 4;
            } elseif ($ri < 0.1 && $rn >= 1) {
                $nilai = 3 + ($ri / 0.1);
            } elseif (($ri > 0 && $ri < 0.1) || ($rn > 0 && $rn < 1)) {
                $nilai = 2 + (2 * ($ri / 0.1)) + ($rn / 1) - (($ri * $rn) / (0.1 * 1));
            } elseif ($rw >= 2) {
                $nilai = 2;
            } else {
                $nilai = (2 * $rw) / 2;
            }

            // Tampilkan hasil
            // echo "Nilai f408: " . $ri . "<br>";
            // echo "Nilai f409: " . $rn . "<br>";
            // echo "Nilai f410: " . $rw . "<br>";
            // echo "Hasil perhitungan nilai: " . $nilai;

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t2'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = $nilai;

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 54 && $id_kriteria == 7) {

        ?>
        <?php $query = "SELECT * FROM JAWAB WHERE ID_JAWAB = 1"; ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll"> NI (Jumlah prestasi nonakademik internasional)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <div class="form-group">
                    <label for="urll"> NN (Jumlah prestasi nonakademik nasional)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i2" name="i2">
                </div>
                <div class="form-group">
                    <label for="urll"> NW (Jumlah prestasi nonakademik wilayah/lokal)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i3" name="i3">
                </div>
                <div class="form-group">
                    <label for="urll"> NM (Jumlah mahasiswa pada saat TS)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i4" name="i4">
                </div>
                <button type="submit" name="t2" class="btn btn-success">Simpan</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $f414 = $_POST['i1'];
            $f415 = $_POST['i2'];
            $f416 = $_POST['i3'];
            $f417 = $_POST['i4'];
            // Hitung nilai f418, f419, dan f420
            $f418 = $f414 / $f417;
            $f419 = $f415 / $f417;
            $f420 = $f416 / $f417;

            // Hitung nilai berdasarkan kondisi
            if ($f418 >= 0.2) {
                $nilai = 4;
            } elseif ($f418 < 0.2 && $f419 >= 2) {
                $nilai = 3 + ($f418 / 0.2);
            } elseif (($f418 > 0 && $f418 < 0.2) || ($f419 > 0 && $f419 < 2)) {
                $nilai = 2 + (2 * ($f418 / 0.2)) + ($f419 / 2) - (($f418 * $f419) / (0.2 * 2));
            } elseif ($f420 >= 4) {
                $nilai = 2;
            } else {
                $nilai = (2 * $f420) / 4;
            }

            // Tampilkan hasil
            echo "Nilai f418: " . $f418 . "<br>";
            echo "Nilai f419: " . $f419 . "<br>";
            echo "Nilai f420: " . $f420 . "<br>";
            echo "Hasil perhitungan nilai: " . $nilai;

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t2'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = $nilai;

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 55 && $id_kriteria == 7) {

        ?>
        <?php $query = "SELECT * FROM JAWAB WHERE ID_JAWAB = 1"; ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll"> MS (Rata-rata Masa studi lulusan (tahun))<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <button type="submit" name="t2" class="btn btn-success">Simpan</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $input1  = isset($_POST["i1"]) ? $_POST["i1"] : 0;

            // Hitung nilai berdasarkan kondisi
            if ($input1 > 3.5 && $input1 <= 4.5) {
                $nilai = 4;
            } elseif ($input1 > 3 && $input1 <= 3.5) {
                $nilai = (8 * $input1) - 24;
            } elseif ($input1 > 4.5 && $input1 <= 7) {
                $nilai = (56 - (8 * $input1)) / 5;
            } else {
                $nilai = 0;
            }

            // Tampilkan hasil
            echo "Nilai input1: " . $input1 . "<br>";
            echo "Hasil perhitungan nilai: " . $nilai;


            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t2'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = $nilai;

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 56 && $id_kriteria == 7) {

        ?>
        <?php $query = "SELECT * FROM JAWAB WHERE ID_JAWAB = 1"; ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll"> PTW<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <button type="submit" name="t2" class="btn btn-success">Simpan</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $input1  = isset($_POST["i1"]) ? $_POST["i1"] : 0;
            // Ambil nilai dari form menggunakan $_POST

            // Hapus karakter '%' dari input1 jika ada
            $input1 = str_replace('%', '', $input1);

            // Konversi nilai persen ke desimal
            $input1_decimal = $input1 / 100;

            // Hitung nilai berdasarkan kondisi
            if ($input1_decimal >= 0.5) {
                $nilai = 4;
            } else {
                $nilai = 1 + (6 * $input1_decimal);
            }

            // Tampilkan hasil
            echo "Nilai input1: " . $input1 . "<br>";
            echo "Hasil perhitungan nilai: " . $nilai;


            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t2'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = $nilai;

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 57 && $id_kriteria == 7) {

        ?>
        <?php $query = "SELECT * FROM JAWAB WHERE ID_JAWAB = 1"; ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll"> PPS (Persentase keberhasilan studi)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <button type="submit" name="t2" class="btn btn-success">Simpan</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $input1  = isset($_POST["i1"]) ? $_POST["i1"] : 0;
            // Hapus karakter '%' dari input1 jika ada
            $input1 = str_replace('%', '', $input1);

            // Konversi nilai persen ke desimal
            $input1_decimal = $input1 / 100;

            // Hitung nilai berdasarkan kondisi
            if ($input1_decimal >= 0.85) {
                $nilai = 4;
            } elseif ($input1_decimal >= 0.3 && $input1_decimal < 0.85) {
                $nilai = ((80 * $input1_decimal) - 24) / 11;
            } else {
                $nilai = 0;
            }

            // Tampilkan hasil
            echo "Nilai input1: " . $input1 . "<br>";
            echo "Hasil perhitungan nilai: " . $nilai;


            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t2'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = $nilai;

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 58 && $id_kriteria == 7) {

        ?>
        <?php $query = "SELECT * FROM JAWAB WHERE ID_JAWAB = 1"; ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll">WT (waktu tunggu lulusan untuk mendapatkan pekerjaan pertama dalam 3 tahun mulai TS-4 s.d TS-2)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <button type="submit" name="t2" class="btn btn-success">Simpan</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $input1  = isset($_POST["i1"]) ? $_POST["i1"] : 0;
            // Hitung nilai berdasarkan kondisi
            if ($input1 < 6) {
                $nilai = 4;
            } elseif ($input1 >= 6 && $input1 <= 18) {
                $nilai = (18 - $input1) / 3;
            } else {
                $nilai = 0;
            }

            // Tampilkan hasil
            echo "Nilai input1: " . $input1 . "<br>";
            echo "Hasil perhitungan nilai: " . $nilai;


            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t2'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = $nilai;

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 59 && $id_kriteria == 7) {

        ?>
        <?php $query = "SELECT * FROM JAWAB WHERE ID_JAWAB = 1"; ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll"> PBS (Kesesuaian bidang kerja lulusan saat mendapatkan pekerjaan pertama dalam 3 tahun, mulai TS-4 s.d TS-2)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <button type="submit" name="t2" class="btn btn-success">Simpan</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $input1  = isset($_POST["i1"]) ? $_POST["i1"] : 0;

            // Hapus karakter '%' dari input1 jika ada
            $input1 = str_replace('%', '', $input1);

            // Konversi nilai persen ke desimal
            $input1_decimal = $input1 / 100;

            // Hitung nilai berdasarkan kondisi
            if ($input1_decimal >= 0.6) {
                $nilai = 4;
            } else {
                $nilai = (20 * $input1_decimal) / 3;
            }

            // Tampilkan hasil
            echo "Nilai input1: " . $input1 . "<br>";
            echo "Hasil perhitungan nilai: " . $nilai;


            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t2'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = $nilai;

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 60 && $id_kriteria == 7) {

        ?>
        <?php $query = "SELECT * FROM JAWAB WHERE ID_JAWAB = 1"; ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll"> NI (Jumlah lulusan yang bekerja di badan usaha tingkat multi nasional/internasional)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <div class="form-group">
                    <label for="urll"> NN (Jumlah lulusan yang bekerja di badan usaha tingkat nasional atau berwirausaha yang berizin)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i2" name="i2">
                </div>
                <div class="form-group">
                    <label for="urll"> NW (Jumlah lulusan yang bekerja di badan usaha tingkat wilayah/lokal atau berwirausaha tidak berizin)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i3" name="i3">
                </div>
                <div class="form-group">
                    <label for="urll"> NL (Jumlah lulusan)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i4" name="i4">
                </div>
                <button type="submit" name="t2" class="btn btn-success">Simpan</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $f444 = isset($_POST["i1"]) ? $_POST["i1"] : 0;
            $f445 = isset($_POST["i2"]) ? $_POST["i2"] : 0;
            $f446 = isset($_POST["i3"]) ? $_POST["i3"] : 0;
            $f447 = isset($_POST["i4"]) ? $_POST["i4"] : 0;

            // Hapus karakter '%' dari f444, f445, f446 jika ada
            $f444 = str_replace('%', '', $f444);
            $f445 = str_replace('%', '', $f445);
            $f446 = str_replace('%', '', $f446);

            // Konversi nilai persen ke desimal
            $ri = ($f444 / $f447) * 100;
            $rn = ($f445 / $f447) * 100;
            $rw = ($f446 / $f447) * 100;

            // Hitung nilai berdasarkan rumus
            if ($ri >= 5) {
                $nilai = 4;
            } elseif ($ri < 5 && $rn >= 20) {
                $nilai = 3 + ($ri / 5);
            } elseif (($ri > 0 && $ri < 5) || ($rn > 0 && $rn < 20)) {
                $nilai = 2 + (2 * ($ri / 5)) + ($rn / 20) - (($ri * $rn) / (5 * 20));
            } elseif ($rw >= 90) {
                $nilai = 2;
            } else {
                $nilai = (2 * $rw) / 90;
            }
            // Tampilkan hasil
            echo "Nilai ri: " . $ri . "<br>";
            echo "Nilai rn: " . $rn . "<br>";
            echo "Nilai rw: " . $rw . "<br>";
            echo "Nilai: " . $nilai . "<br>";
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t2'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = $nilai;

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 62 && $id_kriteria == 7) {

        ?>
        <?php $query = "SELECT * FROM JAWAB WHERE ID_JAWAB = 1"; ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll"> Jumlah luaran penelitian/PkM mahasiswa yang mendapat pengakuan HKI (Paten, Paten Sederhana) (NA)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <div class="form-group">
                    <label for="urll"> Jumlah luaran penelitian/PkM mahasiswa yang mendapat pengakuan HKI (Hak Cipta, Desain Produk Industri, Perlindungan Varietas Tanaman, Desain Tata Letak Sirkuit Terpadu, dll) (NB)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i2" name="i2">
                </div>
                <div class="form-group">
                    <label for="urll"> Jumlah luaran penelitian/PkM mahasiswa dalam bentuk Teknologi Tepat Guna, Produk (Produk Terstandarisasi, Produk Tersertifikasi), Karya Seni, Rekayasa Sosial (NC)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i3" name="i3">
                </div>
                <div class="form-group">
                    <label for="urll"> Jumlah luaran penelitian/PkM mahasiswa yang diterbitkan dalam bentuk Buku ber-ISBN, Book Chapter (ND)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i4" name="i4">
                </div>
                <div class="form-group">
                    <label for="urll"> Jumlah mahasiswa pada saat TS (NM)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i5" name="i5">
                </div>
                <button type="submit" name="t2" class="btn btn-success">Simpan</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $f471 = isset($_POST["i1"]) ? $_POST["i1"] : 0;
            $f472 = isset($_POST["i2"]) ? $_POST["i2"] : 0;
            $f473 = isset($_POST["i3"]) ? $_POST["i3"] : 0;
            $f474 = isset($_POST["i4"]) ? $_POST["i4"] : 0;
            $f475 = isset($_POST["i5"]) ? $_POST["i5"] : 0;

            // Hitung RPL
            $rpl = (2 * ($f471 + $f472 + $f473) + $f474) / $f475;

            // Hitung nilai berdasarkan rumus
            $f476 = $rpl;
            $nilai = ($f476 >= 1) ? 4 : (2 + (2 * $f476));

            // Tampilkan hasil
            echo "Nilai rpl: " . $f476 . "<br>";
            echo "Nilai: " . $nilai . "<br>";

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t2'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = $nilai;

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 61 && $id_kriteria == 7) {

        $query = "SELECT * FROM JAWAB WHERE ID_JAWAB = 1"; ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll"> Jumlah publikasi di jurnal nasional tidak terakreditasi (NA1)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <div class="form-group">
                    <label for="urll"> Jumlah publikasi di jurnal nasional terakreditasi (NA2)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i2" name="i2">
                </div>
                <div class="form-group">
                    <label for="urll"> Jumlah publikasi di jurnal internasional(NA3)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i3" name="i3">
                </div>
                <div class="form-group">
                    <label for="urll"> Jumlah publikasi di jurnal internasional bereputasi(NA4)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i4" name="i4">
                </div>
                <div class="form-group">
                    <label for="urll"> Jumlah publikasi di seminar wilayah/lokal/PT(NB1)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i5" name="i5">
                </div>
                <div class="form-group">
                    <label for="urll">Jumlah publikasi di seminar nasional(NB2)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i6" name="i6">
                </div>
                <div class="form-group">
                    <label for="urll"> Jumlah publikasi di seminar internasional(NB3)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i7" name="i7">
                </div>
                <div class="form-group">
                    <label for="urll"> Jumlah publikasi di media massa wilayah (NC1)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i8" name="i8">
                </div>
                <div class="form-group">
                    <label for="urll"> Jumlah publikasi di media massa nasional (NC2)<br> <i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i9" name="i9">
                </div>
                <div class="form-group">
                    <label for="urll"> Jumlah publikasi di media massa internasional (NC3) <br><i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i10" name="i10">
                </div>
                <div class="form-group">
                    <label for="urll"> Jumlah mahasiswa pada saat TS (NM) <br><i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i11" name="i11">
                </div>
                <button type="submit" name="t2" class="btn btn-success">Simpan</button>
            </form>
        </div>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $f454 = isset($_POST["i1"]) ? $_POST["i1"] : 0;
            $f455 = isset($_POST["i2"]) ? $_POST["i2"] : 0;
            $f456 = isset($_POST["i3"]) ? $_POST["i3"] : 0;
            $f457 = isset($_POST["i4"]) ? $_POST["i4"] : 0;
            $f458 = isset($_POST["i5"]) ? $_POST["i5"] : 0;
            $f459 = isset($_POST["i6"]) ? $_POST["i6"] : 0;
            $f460 = isset($_POST["i7"]) ? $_POST["i7"] : 0;
            $f461 = isset($_POST["i8"]) ? $_POST["i8"] : 0;
            $f462 = isset($_POST["i9"]) ? $_POST["i9"] : 0;
            $f463 = isset($_POST["i10"]) ? $_POST["i10"] : 0;
            $f464 = isset($_POST["i11"]) ? $_POST["i11"] : 0;


            $rl = (($f454 + $f458 + $f461) / $f464) * 100;
            $rn = (($f455 + $f456 + $f459 + $f462) / $f464) * 100;
            $ri = (($f457 + $f460 + $f463) / $f464) * 100;

            // Hitung nilai berdasarkan rumus
            if ($ri >= 1) {
                $nilai = 4;
            } elseif ($ri < 1 && $rn >= 10) {
                $nilai = 3 + ($ri / 1);
            } elseif (($ri > 0 && $ri < 1) || ($rn > 0 && $rn < 10)) {
                $nilai = 2 + (2 * ($ri / 1)) + ($rn / 10) - (($ri * $rn) / (1 * 10));
            } elseif ($rl >= 50) {
                $nilai = 2;
            } else {
                $nilai = (2 * $rl) / 50;
            }

            // Tampilkan hasil
            echo "Nilai rl: " . $rl . "<br>";
            echo "Nilai rn: " . $rn . "<br>";
            echo "Nilai ri: " . $ri . "<br>";
            echo "Nilai: " . $nilai . "<br>";

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t2'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = $nilai;

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    if ($id_indikator == 29 && $id_kriteria == 4) {

        ?>
        <?php $query = "SELECT * FROM JAWAB WHERE ID_JAWAB = 1"; ?>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="urll">Jumlah mata kuliah yang dikembangkan berdasarkan hasil penelitian/PkM dalam 3 tahun terakhir (NMKI) <br><i style="color: red;">( Di isi oleh auditee )</i></label>
                    <input type="text" class="form-control" id="i1" name="i1">
                </div>
                <button type="submit" name="t2" class="btn btn-success">Simpan</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $input1 = isset($_POST["i1"]) ? $_POST["i1"] : 0;

            // Menghitung hasil
            // Convert Excel formula to PHP
            if ($input1 > 3) {
                $result = 4;
            } elseif ($input1 == 2) {
                $result = 3;
            } else {
                $result = 2;
            }

            echo $result;


            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['t2'])) {
                $id_j = htmlspecialchars($_SESSION['a_global']->ID_AUDITEE);
                $n_nilai = $result;

                // Melakukan query update di sini
                // Gantilah placeholder dengan nama kolom dan tabel sesungguhnya dari basis data Anda
                $updateQuery = "UPDATE audit SET NILAI_AUDITEE = '$n_nilai',ID_AUDITEE = '$id_j',n1 = '$input1' WHERE ID_AUDIT = '$id_indikator'";

                // Eksekusi query update
                if ($conn->query($updateQuery) === TRUE) {
                    echo '<script>alert("UBAH DATA BERHASIL")</script>';
                    echo '<script>window.location.href = "auditee-jawaban.php?id_kriteria=' . urlencode($id_kriteria) . '&id_indikator=' . urlencode($id_indikator) . '";</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }




    if ($id_kriteria == 1 || $id_indikator == 6 || $id_indikator == 8 || $id_indikator == 9 || $id_indikator == 10 || $id_indikator == 24 || $id_indikator == 25 || $id_indikator == 26 || $id_indikator == 27 || $id_indikator == 28 || $id_indikator == 30 || $id_indikator == 31 || $id_indikator == 32 || $id_indikator == 33 || $id_indikator == 34 || $id_indikator == 35 || $id_indikator == 36 || $id_indikator == 37 || $id_indikator == 39 || $id_indikator == 40 || $id_indikator == 41 || $id_indikator == 42 || $id_indikator == 43 || $id_indikator == 44 || $id_indikator == 45 || $id_indikator == 47 || $id_indikator == 48 || $id_indikator == 49 || $id_indikator == 51) {
        ?>
        <div class="modal-body">
            <i>Tidak ada Input Manual Pada Indikator ini</i>
        </div>
<?php
    }
}
?>