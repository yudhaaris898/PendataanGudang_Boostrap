<?php
session_start();
if (!isset($_SESSION["ses_username"])) {
    header("location: login.php");
    exit();
}

$data_nama = $_SESSION["ses_nama"];
$data_id = $_SESSION["ses_id"];

$koneksi = new mysqli("localhost", "root", "", "db_pendataanbarang");

$timezone = new DateTimeZone('Asia/Jakarta');
$date = new DateTime('now', $timezone);

$tahun = $_POST["tahun"] ?? '';
$total_jml = 0; // total harga beli terakhir
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Cetak Buku Pengeluaran (Landscape)</title>
<style>
body { font-family: Arial; font-size: 12px; }
h2,h3 { margin:0; }
table { width:100%; border-collapse: collapse; margin-top:15px; }
table, th, td { border:1px solid black; }
th, td { padding:5px; text-align:center; }
td.right { text-align:right; }
.signature-container { display:flex; justify-content:space-between; margin-top:50px; }
.signature { width:45%; text-align:center; }
.signature u { display:block; margin-top:70px; }
</style>
</head>
<body>

<h3 style="text-align:left;">PEMERINTAH KABUPATEN KUDUS</h3>
<h3 style="text-align:left;">SKPD : KECAMATAN UNDAAN</h3>
<h2 style="text-align:center;">LAPORAN PENERIMAAN DAN PENGELUARAN BARANG PERSEDIAN</h2>
<h3 style="text-align:center;">BULAN : JANUARI - DESEMBER <?= $tahun ?></h3>

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

// Ambil data penerimaan barang per tahun
$sql = $koneksi->query("
    SELECT stok.kd_brng, stok.nma_brng, stok.satuan,
           bukuterima.vlm_masuk, bukuterima.hrg_satuan, bukuterima.jml_harga,
           IFNULL(bukukeluar.vlm_keluar,0) as vlm_keluar,
           stok.jumlah_stok
    FROM stok_barang stok
    INNER JOIN data_buku_penerimaan bukuterima ON stok.kd_brng = bukuterima.kd_brng
    LEFT JOIN data_buku_pengeluaran bukukeluar ON stok.kd_brng = bukukeluar.kd_brng AND bukukeluar.tanggal LIKE '%$tahun%'
    WHERE bukuterima.tanggal LIKE '%$tahun%'
");

while ($data = $sql->fetch_assoc()) {
    $total_jml += $data['jml_harga'];
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
<b><u>RIFA'I, S.H, M.si</u></b><br>
Pembina TK.I<br>
NIP. 031022
</div>

<div class="signature">
<br><b>Penyimpan Barang</b><br>
<u><b><?= $data_nama ?></b></u><br>
Administrator<br>
NIP. <?= $data_id ?>
</div>
</div>

<script>window.print();</script>
</body>
</html>
