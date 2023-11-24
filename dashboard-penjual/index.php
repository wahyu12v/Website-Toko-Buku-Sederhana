<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Pengguna belum login, arahkan kembali ke halaman login
    header('Location: ../index.php');
    exit();
}

$username = $_SESSION['username'];

include("../config.php");

$sql = "SELECT * FROM penjual WHERE username_penjual = '$username'";
$query = mysqli_query($db, $sql);
?>




<!doctype html>
<html lang="en">
<head>
	<title>Dashboard</title>
	<link rel="icon" href="../assets/img/logo.png" type="image/png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/style.css">
	<style>
		#sidebar {
			background-color: #5A96E3;
		}
		#sidebar ul li a {
			border-bottom: 2px solid rgba(255, 255, 255, 0.285);
		}

		button#sidebarCollapse.btn {
			background-color: #2f6dbd;
			border: 0px solid white;
		}
		button#sidebarCollapse.btn:hover {
			background-color: #1c4070;
			border: 0px solid white;
		}

		i.fa.fa-bars {
			color: white;
		}

		button.btn.btn-save {
            background-color: #F1C376; 
            border: 0px;
        }
        button.btn.btn-save:hover {
            background-color: #b77834; 
        }

		.table th{
			border: #DDDDDD 2px solid;
		}
		.table td{
			border: #DDDDDD 2px solid;
		}
	</style>
</head>

<body>

	<div class="wrapper d-flex align-items-stretch">
		<nav id="sidebar">
			<div class="custom-menu">
				<button type="button" id="sidebarCollapse" class="btn">
					<i class="fa fa-bars"></i>
					<span class="sr-only">Toggle Menu</span>
				</button>
			</div>
			<div class="p-4 pt-5">
				<h1 style="color: white;">Penjual</h1>
				
				<ul class="list-unstyled components mb-5">
					<li>
						<a class="text-decoration-none active" href="#">Dashboard</a>
					</li>
					<li>
						<a class="text-decoration-none" href="create-buku/">Buat Produk</a>
					</li>
					<li>
						<a class="text-decoration-none" href="edit-buku/">Edit Produk</a>
					</li>
					<li>
						<a class="text-decoration-none" href="transaksi/">Transaksi</a>
					</li>
					<li>
						<a class="text-decoration-none" href="../logout.php">Logout</a>
					</li>
				</ul>	

			</div>
		</nav>


		<div id="content" class="m-4 m-md-5 mt-5">
			<h2 class="mb-4" style="font-weight: 600;">Dashboard</h2>
			<div class="card">
				<div class="card-header">Info Akun</div>
				<div class="card-body">
				<table class="table">
					<tbody">
 
                    <?php while ($data = mysqli_fetch_array($query)): ?>
                        <tr>
                            <td class="table-light">Username</td>
                            <td><?= $data['username_penjual'] ?></td>
                        </tr>
                        <tr>
                            <td class="table-light">Nama</td>
                            <td><?= $data['nama_penjual'] ?></td>
                        </tr>
                        <tr>
                            <td class="table-light">Alamat</td>
                            <td><?= $data['alamat_penjual'] ?></td>
                        </tr>
                        <tr>
                            <td class="table-light">Nomor Telepon</td>
                            <td><?= $data['telepon_penjual'] ?></td>
                        </tr>
                    <?php endwhile; ?>


					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>



    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/popper.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/main.js"></script>
</body>

</html>