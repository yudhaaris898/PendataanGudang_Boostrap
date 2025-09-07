<?php
    if(isset($_GET['NIP'])){
        $sql_cek = "SELECT * FROM users WHERE NIP='".$_GET['NIP']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Ubah Data Pengguna</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<!-- /.box-header -->
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
					<div class="form-group">
							<label class="col-sm-2 control-label">NIP</label>
							<div class="col-sm-3">
								<input type="number" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" value="<?php echo $data_cek['NIP']; ?>" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Nama</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?php echo $data_cek['nama']; ?>" required/>
							</div>
						</div>
				
						<div class="form-group">
							<label class="col-sm-2 control-label">Username</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" value="<?php echo $data_cek['username']; ?>" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Password</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="password" name="password" placeholder="Masukkan Password" value="<?php echo $data_cek['password']; ?>" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Unit Kerja</label>
							<div class="col-sm-4">
							<input type="text" class="form-control" id="unitkerja" name="unitkerja" value="<?php echo $data_cek['unit_kerja']; ?>" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Bagian</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="bagian" name="bagian" value="<?php echo $data_cek['bagian']; ?>" readonly>
							</div>
						</div>
						<!-- /.box-body -->
						<div class="box-footer">
							<a href="?page=pengguna_tampil" class="btn btn-default">Batal</a>
							<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
						</div>
				</form>
				</div>
				<!-- /.box -->
</section>

<?php

if (isset ($_POST['Ubah'])){
    //mulai Mahasiswaoses ubah
    $sql_ubah = "UPDATE users SET
		nama='".$_POST['nama']."',
		username='".$_POST['username']."',
		password='".$_POST['password']."',
		unit_kerja='".$_POST['unitkerja']."',
		bagian='".$_POST['bagian']."'
        WHERE NIP='".$_POST['nip']."'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
	mysqli_close($koneksi);

    if ($query_ubah) {
		echo "<script>alert('Ubah Berhasil')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php?page=pengguna_tampil'>";
	}else{
		echo "<script>alert('Ubah Gagal')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php?page=pengguna_ubah'>";
	}
}


