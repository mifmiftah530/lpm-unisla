<?php
// Memulai session (jika belum dimulai)
session_start();

// Periksa apakah variabel sesi 'a_global' dan ID_AUDITOR di dalamnya sudah diinisialisasi
if (isset($_SESSION['a_global']) && isset($_SESSION['a_global']->ID_AUDITOR)) {
    $id = $_SESSION['a_global']->ID_AUDITOR;

    // Fungsi untuk membersihkan dan mengonversi HTML menjadi teks biasa
    function cleanHtml($html)
    {
        $cleaned = strip_tags($html);
        $cleaned = html_entity_decode($cleaned);
        return $cleaned;
    }

    // Misalkan Anda mendapatkan data dari database
    // Sesuaikan koneksi dan query SQL sesuai kebutuhan Anda
    $koneksi = mysqli_connect("localhost", "root", "", "db_siamiunisla");
    $query = "SELECT temuan.*, indikator.INDIKATOR
              FROM temuan
              LEFT JOIN indikator ON temuan.ID_AUDIT = indikator.ID_INDIKATOR
              WHERE temuan.ID_AUDITOR = '$id'";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die(mysqli_error($koneksi));
    }

    // Header untuk mengatur tipe konten sebagai dokumen Word
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=TindakKoreksi.doc");

    // Mencetak tag HTML untuk dokumen Word
    echo '<html xmlns:w="urn:schemas-microsoft-com:office:word">';
    echo '<head>';
    echo '<style>';
    echo '@page { size: 29.7cm 21cm; margin: 2cm }'; // Set page size and margins for A4 landscape
    echo 'body { font-family: Calibri, sans-serif; }'; // Set font family for better compatibility
    echo '</style>';
    echo '</head>';
    echo '<body>';

    // Isi tabel HTML
    echo '<table>';
    echo '<thead>
    <tr>
    <th>NO</th>
    <th>INDIKATOR</th>
    <th>NILAI</th>
    <th>TEMUAN</th>
    <th>REKOMENDASI</th>
    <th>TINDAK KOREKSI</th>
    </tr>
    </thead>';
    echo '<tbody>';

    // Loop untuk menambahkan data ke tabel
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['ID_AUDIT'] . '</td>';
        echo '<td>' . cleanHtml($row['INDIKATOR']) . '</td>';
        echo '<td>' . $row['NILAI'] . '</td>';
        echo '<td>' . (empty($row['TEMUAN']) ? '<i>Belum Diisi</i>' : cleanHtml($row['TEMUAN'])) . '</td>';
        echo '<td>' . (empty($row['REKOMENDASI']) ? '<i>Belum Diisi</i>' : cleanHtml($row['REKOMENDASI'])) . '</td>';
        echo '<td>' . (empty($row['TINDAK_KOREKSI']) ? '<i>Belum Diisi</i>' : cleanHtml($row['TINDAK_KOREKSI'])) . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</body>';
    echo '</html>';
} else {
    $id = $_SESSION['a_global']->ID_AUDITEE;

    // Fungsi untuk membersihkan dan mengonversi HTML menjadi teks biasa
    function cleanHtml($html)
    {
        $cleaned = strip_tags($html);
        $cleaned = html_entity_decode($cleaned);
        return $cleaned;
    }

    // Misalkan Anda mendapatkan data dari database
    // Sesuaikan koneksi dan query SQL sesuai kebutuhan Anda
    $koneksi = mysqli_connect("localhost", "root", "", "db_siamiunisla");
    $query = "SELECT temuan.*, indikator.INDIKATOR
              FROM temuan
              LEFT JOIN indikator ON temuan.ID_AUDIT = indikator.ID_INDIKATOR
              WHERE temuan.ID_AUDITOR = '$id'";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die(mysqli_error($koneksi));
    }

    // Header untuk mengatur tipe konten sebagai dokumen Word
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=TindakKoreksi.doc");

    // Mencetak tag HTML untuk dokumen Word
    echo '<html xmlns:w="urn:schemas-microsoft-com:office:word">';
    echo '<head>';
    echo '<style>';
    echo '@page { size: 29.7cm 21cm; margin: 2cm }'; // Set page size and margins for A4 landscape
    echo 'body { font-family: Calibri, sans-serif; }'; // Set font family for better compatibility
    echo '</style>';
    echo '</head>';
    echo '<body>';

    // Isi tabel HTML
    echo '<table>';
    echo '<thead>
    <tr>
    <th>NO</th>
    <th>INDIKATOR</th>
    <th>NILAI</th>
    <th>TEMUAN</th>
    <th>REKOMENDASI</th>
    <th>TINDAK KOREKSI</th>
    </tr>
    </thead>';
    echo '<tbody>';

    // Loop untuk menambahkan data ke tabel
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['ID_AUDIT'] . '</td>';
        echo '<td>' . cleanHtml($row['INDIKATOR']) . '</td>';
        echo '<td>' . $row['NILAI'] . '</td>';
        echo '<td>' . (empty($row['TEMUAN']) ? '<i>Belum Diisi</i>' : cleanHtml($row['TEMUAN'])) . '</td>';
        echo '<td>' . (empty($row['REKOMENDASI']) ? '<i>Belum Diisi</i>' : cleanHtml($row['REKOMENDASI'])) . '</td>';
        echo '<td>' . (empty($row['TINDAK_KOREKSI']) ? '<i>Belum Diisi</i>' : cleanHtml($row['TINDAK_KOREKSI'])) . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</body>';
    echo '</html>';
}
