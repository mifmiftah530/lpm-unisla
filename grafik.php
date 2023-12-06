<!DOCTYPE html>
<html>
<head>
    <title>Grafik Radar Nilai Auditee vs Nilai Auditor</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="nilaiRadarChart" width="800" height="400"></canvas>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_siamiunisla";

    // Membuat koneksi ke database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Query untuk mengambil data nilai auditee dan auditor dari tabel 'audit'
    $sql = "SELECT NILAI_AUDITEE, NILAI_AUDITOR FROM audit";
    $result = $conn->query($sql);

    $nilaiAuditee = [];
    $nilaiAuditor = [];

    if ($result->num_rows > 0) {
        // Menyimpan data nilai auditee dan auditor ke dalam array
        while ($row = $result->fetch_assoc()) {
            $nilaiAuditee[] = $row["NILAI_AUDITEE"];
            $nilaiAuditor[] = $row["NILAI_AUDITOR"];
        }
    }

    // Menutup koneksi database
    $conn->close();
    ?>

    <script>
        // Mengambil data nilai auditee dan auditor dari PHP dan menyimpannya dalam variabel JavaScript
        var nilaiAuditee = <?php echo json_encode($nilaiAuditee); ?>;
        var nilaiAuditor = <?php echo json_encode($nilaiAuditor); ?>;

        // Membuat grafik menggunakan Chart.js
        var ctx = document.getElementById('nilaiRadarChart').getContext('2d');
        var nilaiRadarChart = new Chart(ctx, {
            type: 'bar', // Jenis grafik (radar)
            data: {
                labels: Array.from(Array(nilaiAuditee.length), (_, i) => i + 1), // Label pada sumbu X
                datasets: [{
                    label: 'Nilai Auditee',
                    data: nilaiAuditee,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }, {
                    label: 'Nilai Auditor',
                    data: nilaiAuditor,
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    r: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
