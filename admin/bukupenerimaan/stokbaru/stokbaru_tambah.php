<?php
//kode
$nol='0';
$carikode = mysqli_query($koneksi,"SELECT kd_brng FROM stok_barang order by kd_brng desc");
$datakode = mysqli_fetch_array($carikode);
$kode = $datakode['kd_brng'];
$urut = substr($kode, 1, 4);
$tambah = (int) $urut + 1;

if (strlen($tambah) == 1){
$format = "B"."000".$tambah;
 	}else if (strlen($tambah) == 2){
 	$format = "B"."00".$tambah;
			}elseif (strlen($tambah) == 3){
			$format = "B"."0".$tambah;
				}else (strlen($tambah) == 4){
					$format = "B".$tambah
				}
				
?>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Stok Barang</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>

				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">Kode Barang</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="kodebarang" name="kodebarang" value="<?php echo $format; ?>"
								 readonly/>
							</div>
						</div>
				
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Barang</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="namabarang" name="namabarang" placeholder="Masukkan Nama Barang" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Satuan</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="satuan" name="satuan" placeholder="Masukkan Satuan" required>
								<input type="hidden" class="form-control" id="volumemasuk" name="volumemasuk" value="0" required>
							</div>
						</div>

						<!-- /.box-body -->
						<div class="box-footer">
							<a href="?page=bukupenerimaan_tampil" class="btn btn-default">Batal</a>
							<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
						</div>
				</form>
				</div>
			</div>
		</div>
</section>

<?php

    if (isset ($_POST['Simpan'])){
    
        $sql_simpan = "INSERT INTO stok_barang (kd_brng,nma_brng,satuan,jumlah_stok) VALUES (
		  '".$_POST['kodebarang']."',
		  '".$_POST['namabarang']."',
		  '".$_POST['satuan']."',
          '".$_POST['volumemasuk']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

		if ($query_simpan) {
			echo "<script>alert('Simpan Berhasil')</script>";
			echo "<script>alert('Stok Baru Ditambahkan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=bukupenerimaan'>";
        }else{
            echo "<script>alert('Simpan Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=stokbaru_tambah'>";
        }
  }
    
