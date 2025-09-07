
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Pengguna Camat</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>

				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">NIP</label>
							<div class="col-sm-3">
								<input type="number" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Nama</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required/>
							</div>
						</div>
				
						<div class="form-group">
							<label class="col-sm-2 control-label">Username</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Password</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Unit Kerja</label>
							<div class="col-sm-2">
							<input type="text" class="form-control" id="unitkerja" name="unitkerja" value="Camat Undaan" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Bagian</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="bagian" name="bagian" value="Camat" readonly>
							</div>
						</div>

						<!-- /.box-body -->
						<div class="box-footer">
							<a href="?page=pengguna_tampil" class="btn btn-default">Batal</a>
							<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
						</div>
				</form>
				</div>
			</div>
		</div>
</section>

<?php

    if (isset ($_POST['Simpan'])){
	$nama = $_POST["nama"];
	$nip = $_POST["nip"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$unitkerja = $_POST["unitkerja"];
	$bagian = $_POST["bagian"];
		
		$cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM users WHERE unit_kerja='$unitkerja'"));
	

		if ($cek > 0) {
			echo "<script>alert('User unit kerja sudah ada ')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=pengguna_tambah'>";
		}else{
			mysqli_query($koneksi, "INSERT INTO users (nama,NIP,username,password,unit_kerja,bagian) 
			VALUES('$nama','$nip','$username','$password','$unitkerja','$bagian')");
            echo "<script>alert('Simpan Berhasil')</script>";
			echo "<script>alert('User Berhasil Ditambahkan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=pengguna_tampil'>";
        }
  }
    
