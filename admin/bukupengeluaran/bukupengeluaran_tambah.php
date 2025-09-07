<?php
//kode
$nol='0';
$carikode = mysqli_query($koneksi,"SELECT id_keluar FROM data_buku_pengeluaran order by id_keluar desc");
$datakode = mysqli_fetch_array($carikode);
$kode = $datakode['id_keluar'];
$urut = substr($kode, 1, 4);
$tambah = (int) $urut + 1;
$bulan = $_POST["bulan"];
$namabarang = $_POST["namabarang"];

if (strlen($tambah) == 1){
$format = "K"."000".$tambah;
 	}else if (strlen($tambah) == 2){
 	$format = "K"."00".$tambah;
			}elseif (strlen($tambah) == 3){
			$format = "K"."0".$tambah;
				}else (strlen($tambah) == 4){
					$format = "K".$tambah
				}
				
?>

<section class="content">
<div class="alert alert-warning alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><label class="icon fa fa-info"> Data Buku Pengeluaran Barang</h4></label>
		<h4>Bulan :
			<?php echo $bulan; ?>
		</h4>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Data Buku Pengeluaran</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>

				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">ID Keluar</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="id_keluar" name="id_keluar" value="<?php echo $format; ?>"
								 readonly/>
							</div>
						</div>
				
						<div class="form-group" action="" method="post" enctype="multipart/form-data">
							<label class="col-sm-2 control-label">Tanggal</label>
							<div class="col-sm-3">
								<input type="date" class="form-control" name="tanggal" max="<?php echo date("Y-m-d"); ?>" required>
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
							<label class="col-sm-2 control-label">Volume Keluar</label>
							<div class="col-sm-3">
								<input type="number" name="volumekeluar" id="volumekeluar" class="form-control"
									<?php
								// ambil data dari database
								$query = "SELECT * FROM stok_barang WHERE nma_brng='$namabarang'";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
									placeholder="Masukkan Volume" min="0" max="<?php echo $row['jumlah_stok'] ?>">
									<?php
								}
								?>
							</div>
						</div>

						<!-- /.box-body -->
						<div class="box-footer">
							<a href="?page=bukupengeluaran" class="btn btn-default">Batal</a>
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
        $b = $_POST['volumekeluar'];
		$c = $a-$b;
		
        $sql_simpan = "INSERT INTO data_buku_pengeluaran (id_keluar,tanggal,bulan,kd_brng,nma_brng,satuan,vlm_keluar) VALUES (
          '".$_POST['id_keluar']."',
		  '".$_POST['tanggal']."',
		  '".$_POST['bulan']."',
		  '".$_POST['kodebarang']."',
		  '".$_POST['namabarang']."',
		  '".$_POST['satuan']."',
		  '".$_POST['volumekeluar']."');";
		$sql_simpan .= "UPDATE stok_barang SET jumlah_stok='$c' WHERE nma_brng='".$namabarang."'";
        $query_simpan = mysqli_multi_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

		if ($query_simpan) {
			echo "<script>alert('Simpan Berhasil')</script>";
			echo "<script>alert('Stok Barang Diperbarui')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=bukupengeluaran_tampil'>";
        }else{
            echo "<script>alert('Simpan Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=bukupengeluaran_tambah'>";
        }
  }
    
?>