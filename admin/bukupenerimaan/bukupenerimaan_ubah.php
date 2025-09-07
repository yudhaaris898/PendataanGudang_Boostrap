<?php
    if(isset($_GET['id_msuk'])){
        $sql_cek = "SELECT * FROM data_buku_penerimaan WHERE id_msuk='".$_GET['id_msuk']."'";
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
					<h3 class="box-title">Ubah Data Buku Penerimaan</h3>
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
							<label class="col-sm-2 control-label">ID Masuk</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="idmasuk" name="idmasuk" value="<?php echo $data_cek['id_msuk']; ?>"
								 readonly/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Tanggal</label>
							<div class="col-sm-3">
								<input type="date" class="form-control" id="tanggal" name="tanggal" max="<?php echo date("Y-m-d"); ?>" required>
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
								$query = "SELECT * FROM data_buku_penerimaan WHERE id_msuk='".$_GET['id_msuk']."'";
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
								$query = "SELECT * FROM data_buku_penerimaan WHERE id_msuk='".$_GET['id_msuk']."'";
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
								$query = "SELECT * FROM data_buku_penerimaan WHERE id_msuk='".$_GET['id_msuk']."'";
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
							<label class="col-sm-2 control-label">Volume Masuk Baru</label>
							<div class="col-sm-2">
								<input type="number" name="volumemasuk" id="volumemasuk" class="form-control"
									<?php
								// ambil data dari database
								$query = "SELECT stok.kd_brng,stok.nma_brng,bukumasuk.id_msuk,stok.jumlah_stok FROM stok_barang stok INNER JOIN data_buku_penerimaan bukumasuk ON stok.kd_brng=bukumasuk.kd_brng WHERE bukumasuk.id_msuk='".$_GET['id_msuk']."'";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
									min="0" value="<?php echo $data_cek['vlm_masuk']; ?>" >
									<?php
								}
								?>
								</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Volume Masuk Lama</label>
							<div class="col-sm-2">
								<input type="text" name="volumemasuklama" id="volumemasuklama" class="form-control" readonly
									<?php
								// ambil data dari database
								$query = "SELECT * FROM data_buku_penerimaan WHERE id_msuk='".$_GET['id_msuk']."'";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
									value="<?php echo $row['vlm_masuk'] ?>" >
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
								$query = "SELECT stok.kd_brng,stok.nma_brng,bukumasuk.id_msuk,stok.jumlah_stok FROM stok_barang stok INNER JOIN data_buku_penerimaan bukumasuk ON stok.kd_brng=bukumasuk.kd_brng WHERE bukumasuk.id_msuk='".$_GET['id_msuk']."'";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
									value="<?php echo $row['jumlah_stok'] ?>" >
									<?php
								}
								?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Harga Satuan</label>
							<div class="col-sm-3">
								<input type="number" class="form-control" id="hargasatuan" name="hargasatuan" placeholder="Masukkan Harga Satuan" value="<?php echo $data_cek['hrg_satuan']; ?>" min="0" required>
								<input type="hidden" class="form-control" id="jumlahharga" name="jumlahharga" required>
							</div>
						</div>

						<!-- /.box-body -->
						<div class="box-footer">
							<a href="?page=bukupenerimaan_tampil" class="btn btn-default">Batal</a>
							<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
						</div>
				</form>
				</div>
				<!-- /.box -->
</section>

<?php

if (isset ($_POST['Ubah'])){
	$kodebarang = $_POST['kodebarang'];
	$barangmasuklama = $_POST['volumemasuklama'];
	$barangmasuk = $_POST['volumemasuk'];
    $stokbarang = $_POST['stok'];
	$a1 = ($stokbarang-$barangmasuklama)+$barangmasuk;
	$hargasatuan = $_POST['hargasatuan'];
	$jumlahharga = ($barangmasuk*$hargasatuan);
	
    //mulai Mahasiswaoses ubah
    $sql_ubah = "UPDATE data_buku_penerimaan SET
		tanggal='".$_POST['tanggal']."',
		bulan='".$_POST['bulan']."',
		kd_brng='".$_POST['kodebarang']."',
		nma_brng='".$_POST['namabarang']."',
		satuan='".$_POST['satuan']."',
		vlm_masuk='".$_POST['volumemasuk']."',
		hrg_satuan='".$_POST['hargasatuan']."',
		jml_harga='".$jumlahharga."'
		WHERE id_msuk='".$_POST['idmasuk']."';";
		$sql_ubah .= "UPDATE stok_barang SET jumlah_stok='$a1' WHERE kd_brng='".$kodebarang."'";
	$query_ubah = mysqli_multi_query($koneksi, $sql_ubah);
	mysqli_close($koneksi);

    if ($query_ubah) {
		echo "<script>alert('Ubah Berhasil')</script>";
		echo "<script>alert('Stok Barang Diperbarui')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php?page=bukupenerimaan_tampil'>";
	}else{
		echo "<script>alert('Ubah Gagal')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php?page=bukupenerimaan_ubah'>";
	}
}


