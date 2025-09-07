<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
						<h4>Cetak Buku Pengeluaran Barang</h4>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove">
							<i class="fa fa-remove"></i>
						</button>
					</div>
				</div>

				<form class="form-horizontal" target="_blank" action="report/bukupengeluaran/bukupengeluaran_cetak.php" method="post" enctype="multipart/form-data">
					<div class="box-body">

						<div class="form-group">
							<label class="col-sm-2 control-label">Bulan</label>
							<div class="col-sm-2">
								<select name="bulan" id="bulan" class="form-control select2" style="width: 100%;" required>
									<option value="">--Pilih Bulan--</option>
									<option>JANUARI</option>
									<option>FEBRUARI</option>
									<option>MARET</option>
									<option>APRIL</option>
									<option>MEI</option>
									<option>JUNI</option>
									<option>JULI</option>
									<option>AGUSTUS</option>
									<option>SEPTEMBER</option>
									<option>OKTOBER</option>
									<option>NOVEMBER</option>
									<option>DESEMBER</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Tahun</label>
							<div class="col-sm-2">
								<select name="tahun" id="tahun" class="form-control select2" style="width: 100%;" required>
									<option value="">--Pilih Tahun--</option>
									<option>2020</option>
									<option>2021</option>
									<option>2022</option>
									<option>2023</option>
									<option>2024</option>
									<option>2025</option>
								</select>
							</div>
						</div>
							<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-2">
								<input type="submit" name="Lihat" value="Cetak Buku" class="btn btn-success">
						</div>
				</form>
				</div>
			</div>
		</div>
</section>