<?php
session_start();

if (!isset($_SESSION["ses_username"])) {
    header("location: login.php");
    exit();
}

$data_nama = $_SESSION["ses_nama"];
$data_id = $_SESSION["ses_id"];
$data_user = $_SESSION["ses_username"];
$data_level = $_SESSION["ses_level"];

$koneksi = new mysqli("localhost", "root", "", "db_pendataanbarang");

$timezone = new DateTimeZone('Asia/Jakarta');
$date = new DateTime('now', $timezone);

$bulan = $_POST["bulan"] ?? '';
$tahun = $_POST["tahun"] ?? '';

// Ambil total jumlah
$sql = $koneksi->query("SELECT SUM(jml_harga) as jumlah 
                        FROM data_buku_penerimaan 
                        WHERE bulan='$bulan' AND tanggal LIKE '%$tahun%'");
$jumlah = $sql->fetch_assoc()['jumlah'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cetak Buku Pengeluaran (Landscape)</title>
    <link rel="icon" href="../dist/img/print.jpg">
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; line-height: 1.4; }
        h2, h3 { margin: 0; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 5px; text-align: center; }
        td.right { text-align: right; }
        .signature-container { display: flex; justify-content: space-between; margin-top: 50px; }
        .signature { width: 45%; text-align: center; }
        .signature u { display: block; margin-top: 70px; }
    </style>
</head>
<body>

    <h3 style="text-align: left;">PEMERINTAH KABUPATEN KUDUS</h3>
<h3 style="text-align: left;">SKPD : KECAMATAN UNDAAN</h3>
    <h2>LAPORAN PENERIMAAN DAN PENGELUARAN BARANG PERSEDIAN</h2>
    <h3>BULAN : <?= $bulan ?> <?= $tahun ?></h3>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Masuk</th>
                <th>Keluar</th>
                <th>Sisa</th>
                <th>Harga Satuan</th>
                <th>Harga Beli Terakhir</th>
            </tr>
        </thead>
        <tbody>
        <?php
         $no = 1;
    $total_jml = 0; // Total jumlah
    $sql = $koneksi->query("
        SELECT stok.kd_brng, stok.nma_brng, stok.satuan,
               bukuterima.vlm_masuk, bukukeluar.vlm_keluar,
               stok.jumlah_stok, bukuterima.hrg_satuan, bukuterima.jml_harga
        FROM stok_barang stok
        INNER JOIN data_buku_penerimaan bukuterima ON stok.kd_brng = bukuterima.kd_brng
        INNER JOIN data_buku_pengeluaran bukukeluar ON stok.kd_brng = bukukeluar.kd_brng
        WHERE bukuterima.bulan='$bulan' AND bukuterima.tanggal LIKE '%$tahun%'
    ");

    while ($data = $sql->fetch_assoc()) {
        $total_jml += $data['jml_harga']; // akumulasi total
        echo "<tr>
                <td>{$no}</td>
                <td>{$data['kd_brng']}</td>
                <td>{$data['nma_brng']}</td>
                <td>{$data['satuan']}</td>
                <td>{$data['vlm_masuk']}</td>
                <td>{$data['vlm_keluar']}</td>
                <td>{$data['jumlah_stok']}</td>
                <td class='right'>".number_format($data['hrg_satuan'],0,',','.')."</td>
                <td class='right'>".number_format($data['jml_harga'],0,',','.')."</td>
              </tr>";
        $no++;
    }
        ?>
        <tr>
            <th colspan="8">Jumlah</th>
            <th class="right"><?= number_format($total_jml,0,',','.'); ?></th>
        </tr>
        </tbody>
    </table>

    <div class="signature-container">
        <div class="signature">
            Kudus, <?= $date->format("d F Y") ?><br>
            <b>Atasan Langsung</b><br>
            <u><b>Annas Wahyudi, A.Md</b></u>
            Pembina TK.I<br>
            NIP. 1011
        </div>

        <div class="signature">
            <br><b>Penyimpan Barang</b><br>
            <u><b><?= $data_nama ?></b></u>
            Administrator<br>
            NIP. <?= $data_id ?>
        </div>
    </div>

    <script>window.print();</script>
</body>
</html>
