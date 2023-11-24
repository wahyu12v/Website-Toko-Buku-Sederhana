<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['username'])) {
    // Pengguna belum login, arahkan kembali ke halaman login
    header('Location: ../../index.php');
    exit();
}



$username = $_SESSION['username'];

include("../../config.php");

$sql = "SELECT * FROM penjual WHERE username_penjual = '$username'";
$query = mysqli_query($db, $sql);
$data = mysqli_fetch_array($query);
?>

<?php
include("../../config.php");
$id_buku = $_GET['id'];
$sql = "SELECT * FROM buku WHERE id_buku = $id_buku;";

$query = mysqli_query($db, $sql);
$buku = mysqli_fetch_array($query);
?>




<!doctype html>
<html lang="en">
<head>
	<title>Edit Buku</title>
	<link rel="icon" href="../../assets/img/logo.png" type="image/png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/css/style.css">
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
            background-color: #5A96E3; 
            border: 0px;
        }
        button.btn.btn-save:hover {
            background-color: #2f6dbd; 
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
						<a class="text-decoration-none" href="../">Dashboard</a>
					</li>
					
					<li>
						<a class="text-decoration-none" href="../create-buku/">Buat Produk</a>
					</li>
					<li>
						<a class="text-decoration-none" href="../edit-buku/">Edit Produk</a>
					</li>
					<li>
						<a class="text-decoration-none" href="../transaksi/">Transaksi</a>
					</li>
					<li>
						<a class="text-decoration-none" href="../../logout.php">Logout</a>
					</li>
				</ul>	

			</div>
		</nav>


		<div id="content" class="m-4 m-md-5 mt-5">
			<h2 class="mb-4" style="font-weight: 600;">Edit Produk Buku</h2>
			<form action="proses-edit.php" method="POST" enctype="multipart/form-data">
				<div class="mb-3">
					<input type="hidden" name="id_penjual" value="<?= $data['id_penjual'] ?>">
					<input type="hidden" name="id_buku" value="<?= $data['id_buku'] ?>">
				</div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Judul Buku :</label>
                    <input name="judul_buku" type="text" class="form-control border" id="exampleFormControlInput1" maxlength="50" value="<?= $buku['judul_buku'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Buku :</label>
					<textarea name="deskripsi_buku" class="form-control border" id="exampleFormControlTextarea1" style="min-height: 300px;" required><?= $buku['deskripsi_buku'] ?></textarea>
                </div>
				<div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Stok Buku :</label>
                    <input name="stok_buku" type="number" class="form-control border" id="exampleFormControlInput1" value="<?= $buku['stok_buku'] ?>" maxlength="50" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Kategori Buku:</label>
                    <select class="form-select" name="kategori_buku" aria-label="Default select example">
						<option value="">Pilih Kategori</option>
						<option value="Anak-anak">Dongeng Anak</option>
						<option value="Novel">Novel</option>
						<option value="Pendidikan">Pendidikan</option>
						<option value="Komik">Komik</option>
						<option value="Bisnis">Bisnis</option>
						<option value="Sains">Sains</option>
						<option value="Kesehatan">Kesehatan</option>
					</select>
                </div>
				<div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Harga Buku :</label>
                    <input name="harga_buku" type="number" class="form-control border" id="exampleFormControlInput1"  value="<?= $buku['harga_buku'] ?>" maxlength="50" required>
                </div>
				<div class="mb-3">
					<label for="formFile" class="form-label">Unggah Gambar Cover Buku:</label>
                    <br>
                    <img style="width: 100px;" src="../../<?= $buku['cover_buku'] ?>" alt="">
					<input name="cover_buku" class="form-control" type="file" id="formFile" accept=".jpg, .png" required>
				</div>

                <div class="d-grid gap-2">
                    <button name="create_buku" class="btn btn-save mt-5 text-white" type="submit"><i class="fa fa-cloud-upload" aria-hidden="true"></i> <label>Publikasikan</label></button>
				</div>
            </form>
		</div>
	</div>

    <script src="../../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
	<script src="../../assets/js/jquery.min.js"></script>
	<script src="../../assets/js/popper.js"></script>
	<script src="../../assets/js/bootstrap.min.js"></script>
	<script src="../../assets/js/main.js"></script>
</body>

</html>