<?php
include 'koneksi.php';

$query = 'SELECT
            indikator.INDIKATOR,
            indikator.ID_INDIKATOR,
            jawab.JAWAB,
            audit.NILAI_AUDITEE,
            SUM(audit.NILAI_AUDITEE) AS totalaudit,
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
        GROUP BY indikator.ID_INDIKATOR;';

$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png/jpg" href="images/unisla.png">
    <title>Radar Chart</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Sertakan library Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<button type="button" class="btn btn-primary" onclick="javascript:history.go(-1);">
    <i class="fas fa-arrow-left me-2"></i> Kembali
</button>
<body>
    <!-- Tambahkan elemen canvas untuk menampilkan grafik -->
   <!-- Tambahkan elemen canvas untuk menampilkan grafik -->
   <div style="max-width: 600px; margin: auto;">
        <canvas id="radarChart"></canvas>
    </div>
        <?php
        if ($result->num_rows > 0) {
            $labels = array();
            $data = array();
            $borderColors = array();

            while ($row = $result->fetch_assoc()) {
                $labels[] = $row["ID_INDIKATOR"];
                $data[] = $row["totalaudit"];
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

</body>

</html>