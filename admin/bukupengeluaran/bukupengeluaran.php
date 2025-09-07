<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
						<h4>Buku Pengeluaran Barang</h4>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>

				<form class="form-horizontal" action="?page=bukupengeluaran_tambah" method="post" enctype="multipart/form-data">
					<div class="box-body">

						<div class="form-group">
							<label class="col-sm-2 control-label">Bulan</label>
							<div class="col-sm-2">
								<select name="bulan" id="bulan" class="form-control select2" style="width: 100%;" required>
									<option value="">--Pilih Bulan--</option>
									<option>Januari</option>
									<option>Februari</option>
									<option>Maret</option>
									<option>April</option>
									<option>Mei</option>
									<option>Juni</option>
									<option>Juli</option>
									<option>Agustus</option>
									<option>September</option>
									<option>Oktober</option>
									<option>November</option>
									<option>Desember</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Barang</label>
							<div class="col-sm-4">
								<select name="namabarang" id="namabarang" class="form-control select2" style="width: 100%;" required>
									<option value="" selected="selected">--Pilih Nama barang-- </option>
									<?php
								// ambil data dari database
								$query = "SELECT * FROM stok_barang";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
									<option value="<?php echo $row['nma_brng'] ?>">
										<?php echo $row['nma_brng'] ?> 
									</option>
									<?php
								}
								?>
								</select>
							</div>
						</div>
							<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-2">
								<input type="submit" name="Lihat" value="Buat Data" class="btn btn-success">
						</div>
				</form>
				</div>
			</div>
		</div>
</section>