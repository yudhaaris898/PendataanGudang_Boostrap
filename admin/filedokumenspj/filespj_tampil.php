<?php
if(isset($_GET['id'])){
            $sql_hapus = "DELETE FROM kirim_spj WHERE id='".$_GET['id']."'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);
			
            if ($query_hapus) {
				echo "<script>alert('File berhasil dihapus')</script>";
				echo "<meta http-equiv='refresh' content='0; url=index.php?page=filespj_tampil'>";
			}else{
				echo "<script>alert('Hapus file gagal')</script>";
				echo "<meta http-equiv='refresh' content='0; url=index.php?page=filespj_tampil'>";
			}
        }
?>

<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
		<a href="index.php?page=staff" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-upload"></i> Kirim File SPJ</a>&nbsp;
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse">
					<i class="fa fa-minus"></i>
				</button>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
			<?php include ("inc/config.php"); $data = mysqli_query($koneksi_mysql,"SELECT * FROM kirim_spj where unit_kerja='".$data_unit."' order by id asc"); ?>
				<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
					<th>No</th>
					<th>ID</th>
					<th>Tanggal Kirim</th>
					<th>Nama file</th>
					<th>Unit Kerja</th>
					<th>Deskripsi</th>
					<th>Aksi</th>
					</tr>
					</thead>
					<?php 
					$no = 1;
					while ($row =mysqli_fetch_assoc($data)) { 
			 		?>
					<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $row['id'] ?></td>
					<td><?php echo $row['tanggal'] ?></td>
					<td><?php echo $row['filename'] ?></td>
					<td><?php echo $row['unit_kerja'] ?></td>
					<td><?php echo $row['deskripsi'] ?></td>
					<td><a href="inc/download.php?id=<?php echo $row['id'] ?>" title="Download" class="btn btn-success"><i class="glyphicon glyphicon-download"></i></a>
					 <a href="?page=filespj_tampil&id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')" title="Hapus" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</section>