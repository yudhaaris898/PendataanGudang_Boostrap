<?php
    if(isset($_GET['id_keluar'])){
        $sql_cek = "SELECT * FROM data_buku_pengeluaran WHERE id_keluar='".$_GET['id_keluar']."'";
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
					<h3 class="box-title">Hapus Data Buku Pengeluaran</h3>
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
							<label class="col-sm-2 control-label">ID Keluar</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="idkeluar" name="idkeluar" value="<?php echo $data_cek['id_keluar']; ?>"
								 readonly/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Tanggal</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="tanggal" name="tanggal" value="<?php echo $data_cek['tanggal']; ?>" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Bulan</label>
							<div class="col-sm-2">
							<input type="text" class="form-control" id="bulan" name="bulan" value="<?php echo $data_cek['bulan']; ?>" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Kode Barang</label>
							<div class="col-sm-2">
							<input type="text" name="kodebarang" id="kodebarang" class="form-control" readonly
									<?php
								// ambil data dari database
								$query = "SELECT * FROM data_buku_pengeluaran WHERE id_keluar='".$_GET['id_keluar']."'";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
								<option value="<?php echo $row['kd_brng'] ?>">
									<?php
								}
								?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Barang</label>
							<div class="col-sm-4">
							<input type="text" name="namabarang" id="namabarang" class="form-control" readonly
									<?php
								// ambil data dari database
								$query = "SELECT * FROM data_buku_pengeluaran WHERE id_keluar='".$_GET['id_keluar']."'";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
									value="<?php echo $row['nma_brng'] ?>" >
									<?php
								}
								?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Satuan</label>
							<div class="col-sm-2">
							<input type="text" name="satuan" id="satuan" class="form-control" readonly
									<?php
								// ambil data dari database
								$query = "SELECT * FROM data_buku_pengeluaran WHERE id_keluar='".$_GET['id_keluar']."'";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
									value="<?php echo $row['satuan'] ?>" >
									<?php
								}
								?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Volume Keluar</label>
							<div class="col-sm-2">
								<input type="number" name="volumekeluar" id="volumekeluar" class="form-control" readonly
									<?php
								// ambil data dari database
								$query = "SELECT stok.kd_brng,stok.nma_brng,bukukeluar.id_keluar,stok.jumlah_stok FROM stok_barang stok INNER JOIN data_buku_pengeluaran bukukeluar ON stok.kd_brng=bukukeluar.kd_brng WHERE bukukeluar.id_keluar='".$_GET['id_keluar']."'";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
									max="<?php echo $row['jumlah_stok'] ?>" min="0" value="<?php echo $data_cek['vlm_keluar']; ?>" >
									<?php
								}
								?>
								</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Jumlah Stok</label>
							<div class="col-sm-2">
								<input type="text" name="stok" id="stok" class="form-control" readonly
									<?php
								// ambil data dari database
								$query = "SELECT stok.kd_brng,stok.nma_brng,bukukeluar.id_keluar,stok.jumlah_stok FROM stok_barang stok INNER JOIN data_buku_pengeluaran bukukeluar ON stok.kd_brng=bukukeluar.kd_brng WHERE bukukeluar.id_keluar='".$_GET['id_keluar']."'";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
									value="<?php echo $row['jumlah_stok'] ?>" >
									<?php
								}
								?>
							</div>
						</div>

						<!-- /.box-body -->
						<div class="box-footer">
							<a href="?page=bukupengeluaran_tampil" class="btn btn-default">Batal</a>
							<input type="submit" name="Hapus" value="Hapus Data" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data Ini ?')">
						</div>
				</form>
				</div>
				<!-- /.box -->
</section>
<?php

if(isset($_POST['Hapus'])){
	$kodebarang = $_POST['kodebarang'];
	$barangkeluar = $_POST['volumekeluar'];
    $stokbarang = $_POST['stok'];
	$a1 = ($stokbarang+$barangkeluar);
			$sql_hapus = "DELETE FROM data_buku_pengeluaran WHERE id_keluar='".$_GET['id_keluar']."';";
			$sql_hapus .= "UPDATE stok_barang SET jumlah_stok='$a1' WHERE kd_brng='".$kodebarang."'";
            $query_hapus = mysqli_multi_query($koneksi, $sql_hapus);
			
            if ($query_hapus) {
				echo "<meta http-equiv='refresh' content='0; url=index.php?page=bukupengeluaran_tampil'>";
				echo "<script>alert('Data berhasil dihapus')</script>";
				echo "<script>alert('Stok Barang Diperbarui')</script>";
			}else{
				echo "<script>alert('Hapus data gagal')</script>";
			}
        }
?>

