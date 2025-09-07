<?php
    if(isset($_GET['id_brg_keluar'])){
        $sql_cek = "SELECT * FROM data_bukti_pengambilan bukti INNER JOIN data_buku_pengeluaran buku ON bukti.id_keluar=buku.id_keluar WHERE id_brg_keluar='".$_GET['id_brg_keluar']."'";
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
					<h3 class="box-title">Ubah Data Bukti Pengambilan</h3>
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
							<label class="col-sm-2 control-label">Nama Barang</label>
							<div class="col-sm-4">
								<select name="idkeluar" id="idkeluar" class="form-control select2" style="width: 100%;" required>
									<option selected="selected">-- Pilih Kode barang --</option>
									<?php
								// ambil data dari database
								$query = "SELECT * FROM data_buku_pengeluaran WHERE tanggal='".$data_cek['tanggal']."'";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
								<option value="<?php echo $row['id_keluar'] ?>" <?=$data_cek[
									 'nma_brng']==$row[ 'nma_brng'] ? "selected" : null ?>>
										<?php echo $row['nma_brng'] ?>
										(<?php echo $row['id_keluar'] ?>)
									</option>
									<?php
								}
								?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">ID Barang Keluar</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="idbarangkeluar" name="idbarangkeluar" value="<?php echo $data_cek['id_brg_keluar']; ?>" readonly>
							</div>
						</div>

						<!-- /.box-body -->
						<div class="box-footer">
							<a href="?page=buktipengambilan_tampil" class="btn btn-default">Batal</a>
							<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
						</div>
				</form>
				</div>
				<!-- /.box -->
</section>

<?php

if (isset ($_POST['Ubah'])){
    //mulai Mahasiswaoses ubah
    $sql_ubah = "UPDATE data_bukti_pengambilan SET
		id_keluar='".$_POST['idkeluar']."'
        WHERE id_brg_keluar='".$_POST['idbarangkeluar']."'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
	mysqli_close($koneksi);

    if ($query_ubah) {
		echo "<script>alert('Ubah Berhasil')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php?page=buktipengambilan_tampil'>";
	}else{
		echo "<script>alert('Ubah Gagal')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php?page=buktipengambilan_ubah'>";
	}
}


