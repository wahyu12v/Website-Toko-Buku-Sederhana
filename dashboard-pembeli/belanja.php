<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Pengguna belum login, arahkan kembali ke halaman login
    header('Location: ../index.php');
    exit();
}

$username = $_SESSION['username'];
$id_pembeli = $_SESSION['id_pembeli']; // Assuming you have set the id_pembeli in the session after login

include("../config.php");

// $sql = "SELECT * FROM transaksi WHERE id_pembeli = '$id_pembeli'";   
$sql = "SELECT * FROM transaksi INNER JOIN buku ON transaksi.id_buku = buku.id_buku WHERE transaksi.id_pembeli = '$id_pembeli'";
$query = mysqli_query($db, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Buku | Erlangga</title>
    <link rel="icon" href="../assets/img/logo.png" type="image/png">
    <link rel="stylesheet" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <style>
        .navbar {
            transition: box-shadow 0.3s;
        }

        .navbar-scrolled {
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .list-group.no-border {
            border: none;

        }

        .list-group-item.no-border {
            border: none;
        }

        .list-group-item:hover {
            background-color: rgb(240, 240, 240);
        }

        .text-ubah {
            color: rgb(90, 90, 90);
            font-size: 18px;
        }

        .text-ubah:hover {
            color: black;
        }

        .img-container {
            height: 170px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .img-container img {
            object-fit: cover;
            height: 100%;
            width: 100%;
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
                <h2 class="my-4" style="font-weight: 600;">Pesan Yang Berhasi Dibeli</h2>
                <div class="card" style="width: 1000px;">
                    <div class="card-header">Pesanan Saya</div>
                    <div class="card-body">
                    <table class="table table-striped table-hover table-light">
                        <tr>
                            <th>Nama Buku</th>
                            <th>Tanggal Pembelian</th>
                            <th>Jumlah Dibeli</th>
                            <th>Total Pembelian</th>
                            <th>Status</th>
                        </tr>                          
                        <?php while ($data = mysqli_fetch_array($query)): ?>
                            <tr>
                            <td><?php echo $data['judul_buku']; ?></td>
                            <td><?php echo date('Y-m-d', strtotime($data['tanggal_transaksi'])); ?></td>
                            <td><?php echo $data['jumlah_produk']; ?></td>
                            <td>Rp. <?php echo number_format($data['total_transaksi'], 0, ',', '.'); ?></td>
                            <td class="text-primary fw-bold">Sedang Dikemas</td>
                            </tr>
                        <?php endwhile; ?>


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

    <script src="assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.addEventListener("scroll", function() {
                const navbar = document.querySelector(".navbar");
                if (window.scrollY > 0) {
                    navbar.classList.add("navbar-scrolled");
                } else {
                    navbar.classList.remove("navbar-scrolled");
                }
            });
        });
    </script>
</body>

</html>