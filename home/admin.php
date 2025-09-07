<?php
if(isset($_GET['id'])){
            $sql_hapus = "DELETE FROM kirim_spj WHERE id='".$_GET['id']."'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);
			
            if ($query_hapus) {
				echo "<script>alert('File berhasil dihapus')</script>";
				echo "<meta http-equiv='refresh' content='0; url=index.php?page=admin'>";
			}else{
				echo "<script>alert('Hapus file gagal')</script>";
				echo "<meta http-equiv='refresh' content='0; url=index.php?page=admin'>";
			}
        }
?>

<?php
	$sql = $koneksi->query("SELECT count(kd_brng) as barang from stok_barang");
	while ($data= $sql->fetch_assoc()) {
	
		$barang=$data['barang'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(NIP) as pengguna from users");
	while ($data= $sql->fetch_assoc()) {
	
		$pengguna=$data['pengguna'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id_msuk) as terima from data_buku_penerimaan");
	while ($data= $sql->fetch_assoc()) {
	
		$terima=$data['terima'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id_keluar) as keluar from data_buku_pengeluaran");
	while ($data= $sql->fetch_assoc()) {
	
		$keluar=$data['keluar'];
	}
?>




<section class="content-header">
	<h1>
		Beranda |
		<small>Gudang</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-primary">
				<div class="inner">
					<h2>
						<b>
							<?= $barang; ?>
						</b>
					</h2>

					<p>Data Stok Barang</p>
				</div>
				<div class="icon">
					<i class="ion-cube"></i>
				</div>
				<a href="?page=stokbarang_tampil" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h2>
						<b>
							<?= $pengguna; ?>
						</b>
					</h2>

					<p>Akun Pengguna</p>
				</div>
				<div class="icon">
					<i class="ion-person-stalker"></i>
				</div>
				<a href="?page=pengguna_tampil" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h2>
						<b>
							<?= $terima; ?>
						</b>
					</h2>

					<p>Data Barang Penerimaan</p>
				</div>
				<div class="icon">
					<i class="ion-document"></i>
				</div>
				<a href="?page=bukupenerimaan_tampil" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h2>
						<b>
							<?= $keluar; ?>
						</b>
					</h2>

					<p>Data Barang Pengeluaran</p>
				</div>
				<div class="icon">
					<i class="ion-document"></i>
				</div>
				<a href="?page=bukupengeluaran_tampil" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		</div>
		<div class="box box-primary">
		<div class="box-header with-border">
		<h4>File Dokumen SPJ</h4>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse">
					<i class="fa fa-minus"></i>
				</button>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
			<?php include ("inc/config.php"); $data = mysqli_query($koneksi_mysql,"select * from kirim_spj order by id asc"); ?>
				<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
					<th>No</th>
					<th>ID</th>
					<th>Tanggal Kirim</th>
					<th>Nama file</th>
					<th>Unit Kerja</th>
					<th>Deskripsi</th>
					<th>Aksi</th>
					</tr>
					</thead>
					<?php 
					$no = 1;
					while ($row =mysqli_fetch_assoc($data)) { 
			 		?>
					<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $row['id'] ?></td>
					<td><?php echo $row['tanggal'] ?></td>
					<td><?php echo $row['filename'] ?></td>
					<td><?php echo $row['unit_kerja'] ?></td>
					<td><?php echo $row['deskripsi'] ?></td>
					<td><a href="inc/download.php?id=<?php echo $row['id'] ?>" title="Download" class="btn btn-success"><i class="glyphicon glyphicon-download"></i></a>
					 <a href="?page=admin&id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')" title="Hapus" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></td>
					</tr>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</section>