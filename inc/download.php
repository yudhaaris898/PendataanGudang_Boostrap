<?php
include("config.php");

// Ambil ID dari request
$id = isset($_GET['id']) ? $_GET['id'] : 0;

// Pastikan ID berupa angka
if (!is_numeric($id) || $id <= 0) {
    die("ID tidak valid.");
}

// Siapkan prepared statement
$stmt = $koneksi_mysql->prepare("SELECT filename, filetype, filesize, filedata FROM kirim_spj WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

// Ambil hasil
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
    $filename = $row['filename'];
    $filetype = $row['filetype'];
    $filesize = $row['filesize'];
    $filedata = $row['filedata'];

    // Bersihkan output buffer untuk mencegah file corrupt
    if (ob_get_level()) {
        ob_end_clean();
    }

    // Header untuk download file
    header('Content-Type: ' . $filetype);
    header('Content-Length: ' . $filesize);
    header('Content-Transfer-Encoding: binary');
    header('Pragma: no-cache');
    header('Expires: 0');
    header('Content-Disposition: attachment; filename="' . basename($filename) . '"');

    // Kirim file
    echo $filedata;
    exit();
} else {
    die("File tidak ditemukan.");
}

// Tutup statement
$stmt->close();
?>
