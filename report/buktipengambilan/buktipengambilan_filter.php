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
						<h4>Cetak Bukti Pengambilan Barang</h4>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>

				<form class="form-horizontal" target="_blank" action="report/buktipengambilan/buktipengambilan_cetak.php" method="post" enctype="multipart/form-data">
					<div class="box-body">
					<div class="form-group">
							<label class="col-sm-2 control-label">Unit Kerja</label>
							<div class="col-sm-4">
								<select name="unit_kerja" id="unit_kerja" class="form-control select2" style="width: 100%;" onchange='changeValue(this.value)' required>
								<option value="" selected="selected" required>--Pilih Unit Kerja--</option>
									<?php
								$hasil = mysqli_query($koneksi, "SELECT * FROM users Where bagian='staff' order by unit_kerja asc");
								$a = "var nama = new Array();\n;";
								$b = "var NIP = new Array();\n;";
								while ($row = mysqli_fetch_array($hasil)) {
									echo '<option name="unit_kerja" value="'.$row['unit_kerja'] . '">' . $row['unit_kerja'] . '</option>';
									$a .= "nama['" . $row['unit_kerja'] . "'] = {nama:'" . addslashes($row['nama'])."'}\n";
									$b .= "NIP['" . $row['unit_kerja'] . "'] = {NIP:'" . addslashes($row['NIP'])."'}\n";
								}
								?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Tanggal</label>
							<div class="col-sm-3">
								<select name="tanggal" id="tanggal" class="form-control select2" style="width: 100%;" required>
									<option value="" selected="selected" required>-- Pilih Tanggal --</option>
									<?php
								// ambil data dari database
								$query = "SELECT DISTINCT tanggal FROM data_bukti_pengambilan order by tanggal ASC";
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
							<label class="col-sm-2 control-label">Yang Menerima</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="nama" name="nama" required readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">NIP</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="NIP" name="NIP" required readonly>
							</div>
						</div>
						
						<script type="text/javascript">
						<?php
							echo $a;  
							echo $b; ?>
							function changeValue(id){
								document.getElementById('nama').value = nama[id].nama;
								document.getElementById('NIP').value = NIP[id].NIP;
						};
						</script>

						</div>
							<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-2">
								<input type="submit" name="Lihat" value="Cetak Bukti" class="btn btn-success">
						</div>
				</form>
				</div>
			</div>
		</div>
</section>