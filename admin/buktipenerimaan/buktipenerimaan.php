<?php
    function tanggal($tanggal){
        $bulan = array (
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
?>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
						<h4>Bukti Penerimaan Barang</h4>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>

				<form class="form-horizontal" action="?page=buktipenerimaan_tambah" method="post" enctype="multipart/form-data">
					<div class="box-body">

						<div class="form-group">
							<label class="col-sm-2 control-label">Tanggal</label>
							<div class="col-sm-3">
								<select name="tanggal" id="tanggal" class="form-control select2" style="width: 100%;">
									<option value="" selected="selected" required>-- Pilih Tanggal --</option>
									<?php
								// ambil data dari database
								$query = "SELECT DISTINCT tanggal FROM data_buku_penerimaan order by tanggal ASC";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
									$tanggal = date('Y-m-d', strtotime($row['tanggal']));
								?>
									<option value="<?php echo $row['tanggal'] ?>">
										<?php echo tanggal($tanggal, true); ?>
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