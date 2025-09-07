<?php
if(isset($_GET['kd_brng'])){
            $sql_hapus = "DELETE FROM stok_barang WHERE kd_brng='".$_GET['kd_brng']."'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);
			
            if ($query_hapus) {
				echo "<script>alert('Data berhasil dihapus')</script>";
			}else{
				echo "<script>alert('Hapus data gagal')</script>";
			}
        }
?>

<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
		<b>DATA STOK BARANG</b>
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
							<th>Satuan</th>
							<th>Jumlah Stok</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

				  <?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT * FROM stok_barang");
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
								<?php echo $data['satuan']; ?>
							</td>
							<td>
								<?php echo $data['jumlah_stok']; ?>
							</td>
							<td>
								<a href="?page=stokbarang_ubah&kd_brng=<?php echo $data['kd_brng']; ?>" title="Ubah"
								 class="btn btn-success">
									<i class="glyphicon glyphicon-edit"></i>
								</a>
								<a href="?page=stokbarang_tampil&kd_brng=<?php echo $data['kd_brng']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')"
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