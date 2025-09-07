<?php
	$sql = $koneksi->query("SELECT sum(jml_harga) as jumlah from data_buku_penerimaan");
	while ($data= $sql->fetch_assoc()) {
	
		$jumlah=$data['jumlah'];
	}
?>

<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<a href="?page=laporan_filter" title="Cetak Data" class="btn btn-info">
				<i class="glyphicon glyphicon-print"></i> &nbsp;Cetak Laporan Bulanan</a>
			<a href="?page=laporan_filter2" title="Cetak Data" class="btn btn-info">
				<i class="glyphicon glyphicon-print"></i> &nbsp;Cetak Laporan Tahunan</a>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse">
					<i class="fa fa-minus"></i>
				</button>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
						<th>No</th>
						<th>Kode Barang</th>
						<th>Nama Barang</th>
						<th>Masuk</th>
						<th>Keluar</th>
						<th>Sisa</th>
						<th>Harga Satuan</th>
						<th>Harga Beli Terakhir</th>
						</tr>
					</thead>
					<tbody>

				  <?php
                  $no = 1;
				  $sql = $koneksi->query("SELECT stok.kd_brng,stok.nma_brng,bukuterima.vlm_masuk,bukukeluar.vlm_keluar,stok.jumlah_stok,bukuterima.hrg_satuan,bukuterima.jml_harga
				  FROM ((stok_barang stok INNER JOIN data_buku_penerimaan bukuterima ON stok.kd_brng=bukuterima.kd_brng)
				  INNER JOIN data_buku_pengeluaran bukukeluar ON stok.kd_brng=bukukeluar.kd_brng)");
                  while ($data= $sql->fetch_assoc()) {
                  ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['kd_brng']; ?>
							</td>
							<td>
								<?php echo $data['nma_brng']; ?>
							</td>
							<td>
								<?php echo $data['vlm_masuk']; ?>
							</td>
							<td>
								<?php echo $data['vlm_keluar']; ?>
							</td>
							<td>
								<?php echo $data['jumlah_stok']; ?>
							</td>
							<td>
								<?php echo $data['hrg_satuan']; ?>
							</td>
							<td>
								<?php echo $data['jml_harga']; ?>
							</td>
						</tr>
						<?php
                  }
                ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</section>