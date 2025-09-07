<?php
//kode
$nol='0';
$carikode = mysqli_query($koneksi,"SELECT id_msuk FROM data_buku_penerimaan order by id_msuk desc");
$datakode = mysqli_fetch_array($carikode);
$kode = $datakode['id_msuk'];
$urut = substr($kode, 1, 4);
$tambah = (int) $urut + 1;
$bulan = $_POST["bulan"];
$namabarang = $_POST["namabarang"];

if (strlen($tambah) == 1){
$format = "M"."000".$tambah;
 	}else if (strlen($tambah) == 2){
 	$format = "M"."00".$tambah;
			}elseif (strlen($tambah) == 3){
			$format = "M"."0".$tambah;
				}else (strlen($tambah) == 4){
					$format = "M".$tambah
				}
				
?>

<section class="content">
<div class="alert alert-warning alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><label class="icon fa fa-info"> Data Buku Penerimaan Barang</h4></label>
		<h4>Bulan :
			<?php echo $bulan; ?>
		</h4>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Data Buku Penerimaan</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>

				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">ID Masuk</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="id_masuk" name="id_masuk" value="<?php echo $format; ?>"
								 readonly/>
							</div>
						</div>
				
						<div class="form-group" action="" method="post" enctype="multipart/form-data">
							<label class="col-sm-2 control-label">Tanggal</label>
							<div class="col-sm-3">
								<input type="date" class="form-control" name="tanggal" placeholder="Tanggal" max="<?php echo date("Y-m-d"); ?>" required>
								<input type="hidden" class="form-control" id="bulan" name="bulan" value="<?php echo $bulan; ?>" >
							</div>
						</div>					

						<div class="form-group">
							<label class="col-sm-2 control-label">Kode Barang</label>
							<div class="col-sm-2">
								<input type="text" name="kodebarang" id="kodebarang" class="form-control"
									<?php
								// ambil data dari database
								$query = "SELECT * FROM stok_barang WHERE nma_brng='$namabarang'";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
									value="<?php echo $row['kd_brng'] ?>" readonly>
									<?php
								}
								?>
								</select>
							</div>
						</div>						

						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Barang</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="namabarang" name="namabarang" value="<?php echo $namabarang; ?>"
								 readonly/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Satuan</label>
							<div class="col-sm-2">
								<input type="text" name="satuan" id="satuan" class="form-control"
									<?php
								// ambil data dari database
								$query = "SELECT * FROM stok_barang WHERE nma_brng='$namabarang'";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
									value="<?php echo $row['satuan'] ?>" readonly>
									<?php
								}
								?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Jumlah Stok</label>
							<div class="col-sm-2">
							<input type="text" name="stok" id="stok" class="form-control" readonly
									<?php
								// ambil data dari database
								$query = "SELECT * FROM stok_barang WHERE nma_brng='$namabarang'";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
									value="<?php echo $row['jumlah_stok'] ?>">
									<?php
								}
								?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Volume Masuk</label>
							<div class="col-sm-3">
								<input type="number" name="volumemasuk" id="volumemasuk" class="form-control"
									<?php
								// ambil data dari database
								$query = "SELECT * FROM stok_barang WHERE nma_brng='$namabarang'";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
									placeholder="Masukkan Volume" min="0">
									<?php
								}
								?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Harga Satuan</label>
							<div class="col-sm-3">
								<input type="number" class="form-control" id="hargasatuan" name="hargasatuan" placeholder="Masukkan Harga Satuan" min="0" required>
								<input type="hidden" class="form-control" id="jumlahharga" name="jumlahharga">
							</div>
						</div>

						<!-- /.box-body -->
						<div class="box-footer">
							<a href="?page=bukupenerimaan" class="btn btn-default">Batal</a>
							<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
						</div>
				</form>
				</div>
			</div>
		</div>
</section>

<?php

    if (isset ($_POST['Simpan'])){
		$a = $_POST['stok'];
		$b = $_POST['volumemasuk'];
		$c = ($a+$b);
		$hargasatuan = $_POST['hargasatuan'];
		$stokmasuk = $_POST['volumemasuk'];
		$jumlahharga = ($stokmasuk*$hargasatuan);
		
    
        $sql_simpan = "INSERT INTO data_buku_penerimaan (id_msuk,tanggal,bulan,kd_brng,nma_brng,satuan,vlm_masuk,hrg_satuan,jml_harga) VALUES (
          '".$_POST['id_masuk']."',
		  '".$_POST['tanggal']."',
		  '".$_POST['bulan']."',
		  '".$_POST['kodebarang']."',
		  '".$_POST['namabarang']."',
		  '".$_POST['satuan']."',
		  '".$_POST['volumemasuk']."',
		  '".$_POST['hargasatuan']."',
		  '".$jumlahharga."');";
		$sql_simpan .= "UPDATE stok_barang SET jumlah_stok='$c' WHERE nma_brng='".$namabarang."'";
        $query_simpan = mysqli_multi_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

		if ($query_simpan) {
			echo "<script>alert('Simpan Berhasil')</script>";
			echo "<script>alert('Stok Barang Diperbarui')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=bukupenerimaan_tampil'>";
        }else{
            echo "<script>alert('Simpan Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=bukupenerimaan_tambah'>";
        }
  }
    
