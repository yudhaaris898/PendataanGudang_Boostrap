<?php
    if(isset($_GET['kd_brng'])){
        $sql_cek = "SELECT * FROM stok_barang WHERE kd_brng='".$_GET['kd_brng']."'";
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
					<h3 class="box-title">Ubah Data Stok Barang</h3>
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
							<label class="col-sm-2 control-label">Kode Barang</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="kodebarang" name="kodebarang" value="<?php echo $data_cek['kd_brng']; ?>"
								 readonly/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Barang</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="namabarang" name="namabarang" placeholder="Masukkan Nama Barang" value="<?php echo $data_cek['nma_brng']; ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Satuan</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="satuan" name="satuan" placeholder="Masukkan Satuan" value="<?php echo $data_cek['satuan']; ?>">
								<input type="hidden" class="form-control" id="jumlahstok" name="jumlahstok" value="<?php echo $data_cek['jumlah_stok']; ?>">
							</div>
						</div>

						<!-- /.box-body -->
						<div class="box-footer">
							<a href="?page=stokbarang_tampil" class="btn btn-default">Batal</a>
							<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
						</div>
				</form>
				</div>
				<!-- /.box -->
</section>

<?php

if (isset ($_POST['Ubah'])){
    //mulai Mahasiswaoses ubah
    $sql_ubah = "UPDATE stok_barang SET
		nma_brng='".$_POST['namabarang']."',
		satuan='".$_POST['satuan']."',
        jumlah_stok='".$_POST['jumlahstok']."'
        WHERE kd_brng='".$_POST['kodebarang']."'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
	mysqli_close($koneksi);

    if ($query_ubah) {
		echo "<script>alert('Ubah Berhasil')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php?page=stokbarang_tampil'>";
	}else{
		echo "<script>alert('Ubah Gagal')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php?page=stokbarang_ubah'>";
	}
}


