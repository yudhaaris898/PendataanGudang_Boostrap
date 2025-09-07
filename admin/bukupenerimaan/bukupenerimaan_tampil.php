<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<a href="?page=stokbaru_tambah" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Buat Data Dengan Barang Baru</a>&nbsp;
			<a href="?page=bukupenerimaan" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Buat Data Dengan Barang Yang Sudah Ada</a>&nbsp;
			<a href="?page=bukupenerimaan_filter" title="Cetak Data" class="btn btn-info">
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
						<th>Id Masuk</th>
						<th>Tanggal</th>
						<th>Bulan</th>
						<th>Kode Barang</th>
						<th>Nama Barang</th>
						<th>Satuan</th>
						<th>Volume Masuk</th>
						<th>Stok Barang</th>
						<th>Harga Satuan</th>
						<th>Jumlah Harga</th>
						<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

				  <?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT bukumasuk.id_msuk,bukumasuk.tanggal,bukumasuk.bulan,bukumasuk.kd_brng,bukumasuk.nma_brng,bukumasuk.satuan,bukumasuk.vlm_masuk,stok.jumlah_stok,bukumasuk.hrg_satuan,bukumasuk.jml_harga FROM stok_barang stok INNER JOIN data_buku_penerimaan bukumasuk ON stok.kd_brng=bukumasuk.kd_brng");
                  while ($data= $sql->fetch_assoc()) {
                  ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['id_msuk']; ?>
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
								<?php echo $data['vlm_masuk']; ?>
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
							<td>
								<a href="?page=bukupenerimaan_ubah&id_msuk=<?php echo $data['id_msuk']; ?>" title="Ubah"
								 class="btn btn-success">
									<i class="glyphicon glyphicon-edit"></i>
								</a>
								<a href="?page=bukupenerimaan_hapus&id_msuk=<?php echo $data['id_msuk']; ?>"
								 title="Hapus" class="btn btn-danger">
									<i class="glyphicon glyphicon-trash"></i>
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