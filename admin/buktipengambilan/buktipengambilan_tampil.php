<?php
if(isset($_GET['id_brg_keluar'])){
            $sql_hapus = "DELETE FROM data_bukti_pengambilan WHERE id_brg_keluar='".$_GET['id_brg_keluar']."'";
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
			<a href="?page=buktipengambilan" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Buat Data</a>&nbsp;
			<a href="?page=buktipengambilan_filter" title="Cetak Data" class="btn btn-info">
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
						<th>ID Barang Keluar</th>
						<th>Tanggal</th>
						<th>Nama Barang</th>
						<th>Satuan</th>
						<th>Volume</th>
						<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

				  <?php
                  $no = 1;
				  $sql = $koneksi->query("SELECT bukti.id_brg_keluar,bukti.tanggal,buku.nma_brng,buku.satuan,buku.vlm_keluar
				  FROM data_bukti_pengambilan bukti INNER JOIN data_buku_pengeluaran buku ON bukti.id_keluar=buku.id_keluar");
                  while ($data= $sql->fetch_assoc()) {
                  ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['id_brg_keluar']; ?>
							</td>
							<td>
								<?php echo $data['tanggal']; ?>
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
								<a href="?page=buktipengambilan_ubah&id_brg_keluar=<?php echo $data['id_brg_keluar']; ?>" title="Ubah"
								 class="btn btn-success">
									<i class="glyphicon glyphicon-edit"></i>
								</a>
								<a href="?page=buktipengambilan_tampil&id_brg_keluar=<?php echo $data['id_brg_keluar']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')"
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