<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Pengguna belum login, arahkan kembali ke halaman login
    header('Location: ../index.php');
    exit();
}

$username = $_SESSION['username'];

include("../config.php");

$sql = "SELECT * FROM pembeli WHERE username_pembeli = '$username'";
$query = mysqli_query($db, $sql);
?>




<!doctype html>
<html lang="en">
<head>
	<title>Dashboard</title>
	<link rel="icon" href="../assets/img/logo.png" type="image/png">
	<meta charset="utf-8">
    <title>Toko Buku | Erlangga</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="../assets/css/style.css"> -->
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

        html {
        position: relative;
        min-height: 100%;
        }

        body {
        margin-bottom: 60px; 
        }

        footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 60px; 
        background-color: #5A96E3;
        color: white;
        text-align: center;
        }
	</style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top py-3" style="background-color: #5A96E3;">
        <div class="container" style="max-width: 1000px;">
            <a class="navbar-brand" href="index.php"><img src="../assets/img/logo_erlangga.png" alt="" height="40"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white" style="font-size: 16px; font-weight: 600;" href="index.php">Beranda</a>
                    </li> 
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white" style="font-size: 16px; font-weight: 600;" href="katalog.php">katalog Buku</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white" style="font-size: 16px; font-weight: 600;" href="belanja.php">Pesanan</a>
                    </li>
        
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white" style="font-size: 16px; font-weight: 600;" href="info-account.php">Info Akun</a>
                    </li>
                    <li class="nav-item badge rounded-pill px-4" style="background-color: #2f6dbd">
                        <a class="nav-link text-white" style="font-size: 16px; font-weight: 600;" href="../logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="max-width: 1000px;">
        <div class="wrapper d-flex align-items-stretch">
            <div id="content">
                <h2 class="my-4" style="font-weight: 600;">Informasi Akun Pembeli</h2>
                <div class="card" style="width: 1000px;">
                    <div class="card-header">Info Akun</div>
                    <div class="card-body">
                    <table class="table">
                        <tbody">
    
                        <?php while ($data = mysqli_fetch_array($query)): ?>
                            <tr>
                                <td class="table-light">Username</td>
                                <td><?= $data['username_pembeli'] ?></td>
                            </tr>
                            <tr>
                                <td class="table-light">Nama</td>
                                <td><?= $data['nama_pembeli'] ?></td>
                            </tr>
                            <tr>
                                <td class="table-light">Alamat</td>
                                <td><?= $data['alamat_pembeli'] ?></td>
                            </tr>
                            <tr>
                                <td class="table-light">Nomor Telepon</td>
                                <td><?= $data['telepon_pembeli'] ?></td>
                            </tr>
                        <?php endwhile; ?>


                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer class="text-center text-white mt-5">
        <div class="text-center p-3" style="background-color: #5A96E3;">
            © Copyright 2023 -
            <a class="text-white text-decoration-none" href="https://rayhanx.com/">Erlangga</a>
        </div>
    </footer>

    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/popper.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/main.js"></script>
</body>

</html>