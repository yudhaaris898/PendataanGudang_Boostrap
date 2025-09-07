<?php
    //Mulai Sesion
    session_start();
    if (isset($_SESSION["ses_username"])==""){
		header("location: login.php");
    
    }else{
      $data_nama = $_SESSION["ses_nama"];
      $data_id = $_SESSION["ses_id"];
	  $data_user = $_SESSION["ses_username"];
	  $data_password = $_SESSION["ses_password"];
	  $data_unit = $_SESSION["ses_unit"];
      $data_level = $_SESSION["ses_level"];
    }

	include "inc/koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SI Pengelolaan Barang Masuk dan Keluar</title>
	<link rel="icon" href="dist/img/baca.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/select2.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body class="hold-transition skin-green sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="index.php?page=admin" class="logo">
				<span class="logo-lg">
					<marquee>
						<b>Selamat Datang <?php echo $data_nama; ?></b>
					</marquee>
				</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- Messages: style can be found in dropdown.less-->
						<li class="dropdown messages-menu">
							<a class="dropdown-toggle">
								<span>
									<b>
									 SISTEM INFORMASI PENGELOLAAN BARANG MASUK DAN KELUAR
									</b>
								</span>
							</a>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<!-- =============================================== -->

		<!-- Left side column. contains the sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				</<b>
				<div class="user-panel">
					<div class="pull-left image">
						<img src="dist/img/users.png" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p>
							<?php echo $data_nama; ?>
						</p>
						<span class="label label-info">
							<?php echo $data_unit; ?>
						</span>
					</div>
				</div>
				</br>
				<!-- /.search form -->
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu">
					<li class="header">MAIN NAVIGATION</li>

					<!-- Level  -->
					<?php
          if ($data_level=="Gudang"){
        ?>
					<li class="treeview">
						<a href="?page=admin">
							<i class="fa fa-home"></i>
							<span>Beranda</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="treeview">
						<a href="?page=stokbarang_tampil">
							<i class="fa fa-truck"></i>
							<span>Stok Barang</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="treeview">
						<a href="?page=bukupenerimaan_tampil">
							<i class="fa fa-file-text"></i>
							<span>Buku Penerimaan Barang</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="treeview">
						<a href="?page=bukupengeluaran_tampil">
							<i class="fa fa-file-text"></i>
							<span>Buku Pengeluaran Barang</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="treeview">
						<a href="?page=buktipenerimaan_tampil">
							<i class="fa fa-file-text"></i>
							<span>Bukti Penerimaan Barang</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="treeview">
						<a href="?page=buktipengambilan_tampil">
							<i class="fa fa-file-text"></i>
							<span>Bukti Pengambilan Barang</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="header">LAPORAN</li>
					<li class="treeview">
						<a href="?page=laporan_tampil">
							<i class="fa fa-copy"></i>
							<span>Penerimaan dan Pengeluaran</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li>
						<a href="logout.php" onclick="return confirm('Anda yakin keluar dari aplikasi ?')">
							<i class="fa fa-sign-out"></i>
							<span>Logout</span>
							<span class="pull-right-container"></span>
						</a>
					</li>
					<?php
					}elseif ($data_level=="Admin"){
					?>
					<li class="treeview">
						<a href="?page=admin2">
							<i class="fa fa-home"></i>
							<span>Beranda</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="treeview">
						<a href="?page=stokbarang_tampil">
							<i class="fa fa-truck"></i>
							<span>Stok Barang</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="treeview">
						<a href="?page=bukupenerimaan_tampil2">
							<i class="fa fa-file-text"></i>
							<span>Buku Penerimaan Barang</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="treeview">
						<a href="?page=bukupengeluaran_tampil2">
							<i class="fa fa-file-text"></i>
							<span>Buku Pengeluaran Barang</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="header">LAPORAN</li>
					<li class="treeview">
						<a href="?page=laporan_tampil">
							<i class="fa fa-copy"></i>
							<span>Penerimaan dan Pengeluaran</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="header">OTHER</li>
					<li class="treeview">
						<a href="?page=pengguna_tampil">
							<i class="fa fa-user"></i>
							<span>Pengguna Sistem</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li>
						<a href="logout.php" onclick="return confirm('Anda yakin keluar dari aplikasi ?')">
							<i class="fa fa-sign-out"></i>
							<span>Logout</span>
							<span class="pull-right-container"></span>
						</a>
					</li>
					<?php
					}elseif ($data_level=="Camat"){
					?>
					<li class="treeview">
						<a href="?page=camat">
							<i class="fa fa-home"></i>
							<span>Beranda</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="header">LAPORAN</li>
					<li class="treeview">
						<a href="?page=laporancamat_tampil">
							<i class="fa fa-copy"></i>
							<span>Penerimaan dan Pengeluaran</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="header">OTHER</li>
					<li>
						<a href="logout.php" onclick="return confirm('Anda yakin keluar dari aplikasi ?')">
							<i class="fa fa-sign-out"></i>
							<span>Logout</span>
							<span class="pull-right-container"></span>
						</a>
					</li>
					
					<?php
                        }elseif ($data_level=="Staff"){
                    ?>
					<li class="treeview">
						<a href="?page=staff">
							<i class="fa fa-home"></i>
							<span>Beranda</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="treeview">
						<a href="?page=filespj_tampil">
							<i class="fa fa-file-text"></i>
							<span>File Dokumen SPJ</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="header">OTHER</li>

					<li>
						<a href="logout.php" onclick="return confirm('Anda yakin keluar dari aplikasi ?')">
							<i class="fa fa-sign-out"></i>
							<span>Logout</span>
							<span class="pull-right-container"></span>
						</a>
					</li>

					<?php
                        }
                    ?>
				</section>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<!-- Main content -->
			<section class="content">
				<?php 
      if(isset($_GET['page'])){
          $hal = $_GET['page'];
  
          switch ($hal) {
			  //Klik Halaman Home Pengguna
              	case 'admin':
                  include "home/admin.php";
				  break;
				case 'admin2':
                  include "home/admin2.php";
				  break;
				case 'staff':
                  include "home/staff.php";
				  break;
				case 'camat':
                  include "home/camat.php";
				  break;
				case 'download':
                  include "inc/download.php";
				  break;

			  //File SPJ
			  case 'filespj_tampil':
				include "admin/filedokumenspj/filespj_tampil.php";
				break;

			 //Laporan
				case 'laporan_tampil':
					include "laporan/gudang/laporan_tampil.php";
					break;
				case 'laporan_cetak':
					include "laporan/gudang/laporan_cetak.php";
					break;
				case 'laporan_filter':
					include "laporan/gudang/laporan_filter.php";
					break;
				case 'laporan_filter2':
					include "laporan/gudang/laporan_filter2.php";
					break;
				
				//Laporan
				case 'laporancamat_tampil':
					include "laporan/camat/laporan_tampil.php";
					break;
				case 'laporancamat_cetak':
					include "laporan/camat/laporan_cetak.php";
					break;
				case 'laporancamat_filter':
					include "laporan/camat/laporan_filter.php";
					break;
				case 'laporancamat_filter2':
					include "laporan/camat/laporan_filter2.php";
					break;

			  //Pengguna
			  
				case 'pengguna_tampil':
					include "admin/pengguna/pengguna_tampil.php";
					break;
				case 'pengguna_ubah':
					include "admin/pengguna/pengguna_ubah.php";
					break;
				case 'pengguna_tambah':
					include "admin/pengguna/pengguna_tambah.php";
					break;
				case 'pengguna_tambahstaff':
					include "admin/pengguna/pengguna_tambahstaff.php";
					break;
				case 'pengguna_tambahgudang':
					include "admin/pengguna/pengguna_tambahgudang.php";
					break;
				case 'pengguna_tambahcamat':
					include "admin/pengguna/pengguna_tambahcamat.php";
					break;

			  //Stok Barang
			  	case 'stokbarang_tampil':
					include "admin/stokbarang/stokbarang_tampil.php";
					break;
				case 'stokbarang_ubah':
					include "admin/stokbarang/stokbarang_ubah.php";
					break;

			  //Buku Penerimaan
				case 'stokbaru_tambah':
					include "admin/bukupenerimaan/stokbaru/stokbaru_tambah.php";
					break;
				case 'bukupenerimaan_tampil':
					include "admin/bukupenerimaan/bukupenerimaan_tampil.php";
					break;
				case 'bukupenerimaan_tampil2':
					include "admin/bukupenerimaan/bukupenerimaan_tampil2.php";
					break;
				case 'bukupenerimaan':
					include "admin/bukupenerimaan/bukupenerimaan.php";
					break;
				case 'bukupenerimaan_tambah':
					include "admin/bukupenerimaan/bukupenerimaan_tambah.php";
					break;
				case 'bukupenerimaan_tambahstokbaru':
					include "admin/bukupenerimaan/bukupenerimaan_tambahstokbaru.php";
					break;
				case 'bukupenerimaan_tambahstokbaru_filter':
					include "admin/bukupenerimaan/bukupenerimaan_tambahstokbaru_filter.php";
					break;
				case 'bukupenerimaan_ubah':
					include "admin/bukupenerimaan/bukupenerimaan_ubah.php";
					break;
				case 'bukupenerimaan_hapus':
					include "admin/bukupenerimaan/bukupenerimaan_hapus.php";
					break;

			//Buku Pengeluaran
				case 'bukupengeluaran_tampil':
				  	include "admin/bukupengeluaran/bukupengeluaran_tampil.php";
					break;
				case 'bukupengeluaran_tampil2':
					include "admin/bukupengeluaran/bukupengeluaran_tampil2.php";
				    break;
				case 'bukupengeluaran':
					include "admin/bukupengeluaran/bukupengeluaran.php";
					break;
				case 'bukupengeluaran_tambah':
					include "admin/bukupengeluaran/bukupengeluaran_tambah.php";
					break;
				case 'bukupengeluaran_ubah':
					include "admin/bukupengeluaran/bukupengeluaran_ubah.php";
					break;
				case 'bukupengeluaran_hapus':
					include "admin/bukupengeluaran/bukupengeluaran_hapus.php";
					break;

			//Bukti Penerimaan
				case 'buktipenerimaan_tambah':
						include "admin/buktipenerimaan/buktipenerimaan_tambah.php";
						break;
				case 'buktipenerimaan':
						include "admin/buktipenerimaan/buktipenerimaan.php";
						break;
				case 'buktipenerimaan_tampil':
						include "admin/buktipenerimaan/buktipenerimaan_tampil.php";
						break;
				case 'buktipenerimaan_ubah':
						include "admin/buktipenerimaan/buktipenerimaan_ubah.php";
						break;

			//Bukti Pengambilan
				case 'buktipengambilan_tambah':
					include "admin/buktipengambilan/buktipengambilan_tambah.php";
					break;
				case 'buktipengambilan':
					include "admin/buktipengambilan/buktipengambilan.php";
					break;
				case 'buktipengambilan_tampil':
					include "admin/buktipengambilan/buktipengambilan_tampil.php";
					break;
				case 'buktipengambilan_ubah':
					include "admin/buktipengambilan/buktipengambilan_ubah.php";
					break;

			//Buku dan Bukti Filter
				case 'bukupengeluaran_filter':
					include "report/bukupengeluaran/bukupengeluaran_filter.php";
					break;
				case 'bukupenerimaan_filter':
					include "report/bukupenerimaan/bukupenerimaan_filter.php";
					break;
				case 'buktipenerimaan_filter':
					include "report/buktipenerimaan/buktipenerimaan_filter.php";
					break;
				case 'buktipengambilan_filter':
					include "report/buktipengambilan/buktipengambilan_filter.php";
					break;			

              //default
              default:
				  echo "<center><br><br><br><br><br><br><br><br><br>
				  <h1> Halaman tidak ditemukan !</h1></center>";
                  break;    
          }
      }else{
        // Auto Halaman Home Pengguna
          if($data_level=="Staff"){
              include "home/staff.php";
              }else if($data_level=="Gudang"){
				include "home/admin.php";
				}else if($data_level=="Admin"){
					include "home/admin2.php";
					}else if($data_level=="Camat"){
						include "home/camat.php";
						}
            }
    		?>

			</section>
			<!-- /.content -->
		</div>

		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
			</div>
			<center>
				<strong>Copyright &copy;
					<a href="https://www.youtube.com/channel/UCDxjOzW7F0JOkltlXT6g7AQ">Elseif Software House</a>.</strong> All rights reserved.
			</center>
		</footer>
		<div class="control-sidebar-bg"></div>

		<!-- ./wrapper -->

		<!-- jQuery 2.2.3 -->
		<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
		<!-- Bootstrap 3.3.6 -->
		<script src="bootstrap/js/bootstrap.min.js"></script>

		<script src="plugins/select2/select2.full.min.js"></script>
		<!-- DataTables -->
		<script src="plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

		<!-- AdminLTE App -->
		<script src="dist/js/app.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="dist/js/demo.js"></script>
		
		<!-- page script -->


		<script>
			$(function() {
				$("#example1").DataTable();
				$('#example2').DataTable({
					"paging": true,
					"lengthChange": false,
					"searching": false,
					"ordering": true,
					"info": true,
					"autoWidth": false
				});
			});
		</script>

		<script>
			$(function() {
				//Initialize Select2 Elements
				$(".select2").select2();
			});
		</script>
		
</body>

</html>