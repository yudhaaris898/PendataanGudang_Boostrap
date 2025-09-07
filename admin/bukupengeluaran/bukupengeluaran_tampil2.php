<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
				<a href="?page=bukupengeluaran_filter" title="Cetak Data" class="btn btn-info">
				<i class="glyphicon glyphicon-print"></i> &nbsp;Cetak Data</a>
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
							<th>Id Keluar</th>
							<th>Tanggal</th>
							<th>Bulan</th>
							<th>Kode Barang</th>
							<th>Nama Barang</th>
							<th>Satuan</th>
							<th>Volume Keluar</th>
							<th>Stok Barang</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

				  <?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT bukukeluar.id_keluar,bukukeluar.tanggal,bukukeluar.bulan,bukukeluar.kd_brng,bukukeluar.nma_brng,bukukeluar.satuan,bukukeluar.vlm_keluar,stok.jumlah_stok FROM stok_barang stok INNER JOIN data_buku_pengeluaran bukukeluar ON stok.kd_brng=bukukeluar.kd_brng");
                  while ($data= $sql->fetch_assoc()) {
                  ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['id_keluar']; ?>
							</td>
							<td>
								<?php echo $data['tanggal']; ?>
							</td>
							<td>
								<?php echo $data['bulan']; ?>
							</td>
							<td>
								<?php echo $data['kd_brng']; ?>
							</td>
							<td>
								<?php echo $data['nma_brng']; ?>
							</td>
							<td>
								<?php echo $data['satuan']; ?>
							</td>
							<td>
								<?php echo $data['vlm_keluar']; ?>
							</td>
							<td>
								<?php echo $data['jumlah_stok']; ?>
							</td>
							<td>
								<a href="?page=bukupengeluaran_ubah&id_keluar=<?php echo $data['id_keluar']; ?>" title="Ubah"
								 class="btn btn-success">
									<i class="glyphicon glyphicon-edit"></i>
								</a>
								<a href="?page=bukupengeluaran_hapus&id_keluar=<?php echo $data['id_keluar']; ?>"
								 title="Hapus" class="btn btn-danger">
									<i class="glyphicon glyphicon-trash"></i></a>
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