<?php
	$sql = $koneksi->query("SELECT count(bukuterima.bulan) as laporan
	FROM ((stok_barang stok INNER JOIN data_buku_penerimaan bukuterima ON stok.kd_brng=bukuterima.kd_brng)
	INNER JOIN data_buku_pengeluaran bukukeluar ON stok.kd_brng=bukukeluar.kd_brng)");
	while ($data= $sql->fetch_assoc()) {
	
		$laporan=$data['laporan'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(NIP) as pengguna from users where unit_kerja='".$data_unit."'");
	while ($data= $sql->fetch_assoc()) {
	
		$pengguna=$data['pengguna'];
	}
?>


<section class="content-header">
	<h1>
		Beranda |
		<small>Camat</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">

		<div class="col-lg-4 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-primary">
				<div class="inner">
					<h2>
						<b>
							<?= $laporan; ?>
						</b>
					</h2>

					<p>Laporan Penerimaan dan Pengeluaran</p>
				</div>
				<div class="icon">
					<i class="ion-document"></i>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h2>
						<b>
							<?= $pengguna; ?>
						</b>
					</h2>

					<p>Users Camat</p>
				</div>
				<div class="icon">
					<i class="ion-person-stalker"></i>
				</div>
			</div>
		</div>

		