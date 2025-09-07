<?php
	$sql = $koneksi->query("SELECT count(id) as spj from kirim_spj where unit_kerja='".$data_unit."'");
	while ($data= $sql->fetch_assoc()) {
	
		$filespj=$data['spj'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(NIP) as pengguna from users where unit_kerja='".$data_unit."'");
	while ($data= $sql->fetch_assoc()) {
	
		$pengguna=$data['pengguna'];
	}
?>


<section class="content-header">
	<h1>
		Beranda |
		<small>Staff</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">

		<div class="col-lg-4 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-primary">
				<div class="inner">
					<h2>
						<b>
							<?= $filespj; ?>
						</b>
					</h2>

					<p>File Dokumen SPJ</p>
				</div>
				<div class="icon">
					<i class="ion-document"></i>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h2>
						<b>
							<?= $pengguna; ?>
						</b>
					</h2>

					<p>Users <?php echo $data_unit; ?></p>
				</div>
				<div class="icon">
					<i class="ion-person-stalker"></i>
				</div>
			</div>
		</div>

		</div>
		
	<h3>Kirim File Dokumen SPJ</h3>
	<form enctype="multipart/form-data" method="post">
            <table width="50%">
            <tr>
                <td>File</td>
                <td>Max File: 1 mb<input type="file" accept=".doc,.docx,.pdf,.xlsx,.xls" name="berkas" /></td>
            </tr>
			<tr>
                <td><br></td>
            </tr>
            <tr>
                <td>Unit Kerja</td>
                <td><input type="text" size="50" name="unitkerja" value="<?php echo $data_unit; ?>" readonly></td>
            </tr>
			<tr>
                <td><br></td>
            </tr>
			<tr>
                <td>Tanggal</td>
                <td><input type="text" size="15" name="tanggal" value="<?php echo date("Y/m/d"); ?>" readonly></td>
            </tr>
			<tr>
                <td><br></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><textarea name="keterangan" cols="50" rows="6"></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Kirim File"></td>
            </tr>
            </table>
        </form>
		<br>
</section>
        
    </body>
</html>
<?php
include ("inc/config.php");
 
if ($_POST)
{
   $filedata = addslashes(fread(fopen($_FILES['berkas']['tmp_name'], 'r'),
               $_FILES['berkas']['size']));
   $tipe  = $_FILES['berkas']['type'];
   $ukuran = $_FILES['berkas']['size'];
   $nama_file = $_FILES['berkas']['name'];
   $keterangan = $_POST['keterangan'];
   $unitkerja = $_POST['unitkerja'];
   $tanggal = $_POST['tanggal'];
 
   $result = mysqli_query ($koneksi_mysql,"insert into kirim_spj values ('','$keterangan','$tipe','$filedata','$nama_file',$ukuran,'$unitkerja','$tanggal')") 
                            or die(mysqli_error($koneksi_mysql));
 
   if ($result) {
	echo "<script>alert('File Berhasil Terkirim')</script>";
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=filespj_tampil'>";
};
}
?>