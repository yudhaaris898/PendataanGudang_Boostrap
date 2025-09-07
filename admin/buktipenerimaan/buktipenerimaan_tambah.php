<?php
//kode
$nol='0';
$carikode = mysqli_query($koneksi,"SELECT id_msuk FROM data_bukti_penerimaan order by id_msuk desc");
$datakode = mysqli_fetch_array($carikode);
$kode = $datakode['id_msuk'];
$urut = substr($kode, 1, 4);
$tambah = (int) $urut + 1;
$tanggal = $_POST["tanggal"];

if (strlen($tambah) == 1){
$format = "BM"."000".$tambah;
 	}else if (strlen($tambah) == 2){
 	$format = "BM"."00".$tambah;
			}elseif (strlen($tambah) == 3){
			$format = "BM"."0".$tambah;
				}else (strlen($tambah) == 4){
					$format = "BM".$tambah
				}
				
?>

<section class="content">
<div class="alert alert-warning alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><label class="icon fa fa-info"> Data Bukti Penerimaan Barang</h4></label>
		<h4>Tanggal :
			<?php echo $tanggal; ?>
		</h4>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Data Bukti Penerimaan</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>

				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Barang</label>
							<div class="col-sm-4">
								<select name="idmasuk" id="idmasuk" class="form-control select2" style="width: 100%;" required>
									<option selected="selected">-- Pilih Nama Barang --</option>
									<?php
								// ambil data dari database
								$query = "SELECT * FROM data_buku_penerimaan WHERE tanggal='".$tanggal."'";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
									<option value="<?php echo $row['id_msuk'] ?>">
										<?php echo $row['nma_brng'] ?>
										(<?php echo $row['id_msuk'] ?>)
									</option>
									<?php
								}
								?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">ID Barang Masuk</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="idbarangmasuk" name="idbarangmasuk" value="<?php echo $format; ?>"
								 readonly/>
								 <input type="hidden" class="form-control" id="tanggal" name="tanggal" value="<?php echo $tanggal; ?>" required>
							</div>
						</div>

						<!-- /.box-body -->
						<div class="box-footer">
							<a href="?page=buktipenerimaan" class="btn btn-default">Batal</a>
							<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
						</div>
				</form>
				</div>
			</div>
		</div>
</section>

<?php

    if (isset ($_POST['Simpan'])){
    
        $sql_simpan = "INSERT INTO data_bukti_penerimaan (tanggal,id_msuk,id_brg_masuk) VALUES (
		  '".$_POST['tanggal']."',
		  '".$_POST['idmasuk']."',
          '".$_POST['idbarangmasuk']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

		if ($query_simpan) {
            echo "<script>alert('Simpan Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=buktipenerimaan_tampil'>";
        }else{
            echo "<script>alert('Simpan Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=buktipenerimaan_tambah'>";
        }
  }
    
