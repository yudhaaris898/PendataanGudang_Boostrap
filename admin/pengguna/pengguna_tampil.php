<?php
if(isset($_GET['NIP'])){
            $sql_hapus = "DELETE FROM users WHERE NIP='".$_GET['NIP']."'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);
			
            if ($query_hapus) {
				echo "<script>alert('User berhasil dihapus')</script>";
			}else{
				echo "<script>alert('Hapus user gagal')</script>";
			}
        }
?>

<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<a href="?page=pengguna_tambahstaff" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Tambah Pengguna Staff</a>&nbsp;
			<a href="?page=pengguna_tambahcamat" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Tambah Pengguna Camat</a>&nbsp;
			<a href="?page=pengguna_tambahgudang" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Tambah Pengguna Gudang</a>&nbsp;
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse">
					<i class="fa fa-minus"></i>
				</button>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
						<th>No</th>
						<th>NIP</th>
						<th>Nama</th>
						<th>Username</th>
						<th>Password</th>
						<th>Unit Kerja</th>
						<th>Bagian</th>
						<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

				  <?php
                  $no = 1;
				  $sql = $koneksi->query("SELECT * FROM users order by nama asc");
                  while ($data= $sql->fetch_assoc()) {
                  ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['NIP']; ?>
							</td>
							<td>
								<?php echo $data['nama']; ?>
							</td>
							<td>
								<?php echo $data['username']; ?>
							</td>
							<td>
								<?php echo $data['password']; ?>
							</td>
							<td>
								<?php echo $data['unit_kerja']; ?>
							</td>
							<td>
								<?php echo $data['bagian']; ?>
							</td>
							<td>
								<a href="?page=pengguna_ubah&NIP=<?php echo $data['NIP']; ?>" title="Ubah"
								 class="btn btn-success">
									<i class="glyphicon glyphicon-edit"></i>
								</a>
								<a href="?page=pengguna_tampil&NIP=<?php echo $data['NIP']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')"
								 title="Hapus" class="btn btn-danger">
									<i class="glyphicon glyphicon-trash"></i>
							</td>
						</tr>
						<?php
                  }
                ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</section>