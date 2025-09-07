<!-- Start Code -->
<?php
$host     = "localhost";  $username = "root";  $password = "";  $database = "db_pendataanbarang";
$koneksi_mysql = mysqli_connect($host,$username,$password) or die ("gagal terhubung !");
mysqli_select_db($koneksi_mysql,$database) or die ("gagal memilih database !");
?>
<!-- End Code -->