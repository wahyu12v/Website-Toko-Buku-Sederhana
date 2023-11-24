<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Pengguna belum login, arahkan kembali ke halaman login
    header('Location: ../index.php');
    exit();
}


$id_pembeli = $_SESSION['id_pembeli']; // Assuming you have set the id_pembeli in the session after login
include("../config.php");
$sql = "SELECT * FROM pembeli WHERE id_pembeli = '$id_pembeli'"; // Modify the query to use id_pembeli
$query = mysqli_query($db, $sql);
$pembeli = mysqli_fetch_assoc($query);

$id_buku = $_GET['page'];
$query = "SELECT * FROM buku WHERE id_buku = $id_buku";
$result = mysqli_query($db, $query);
$buku = mysqli_fetch_assoc($result);

if (isset($_POST['beli'])) {
    $jumlah_buku = $_POST['jumlah_produk'];
    $total_transaksi = $buku['harga_buku'] * $jumlah_buku;
}
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

    <main>
        <div class="py-5">
            <div class="container" style="max-width: 1000px;">
                <div class="card mt-4">
                    <div class="row">
                        <div class="col-6"  style="width: 260px;">
                            <img src="../<?php echo $buku['cover_buku']?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-6">
                                <div class="card-body">
                                    <h2 class="card-title"><?php echo $buku['judul_buku']?></h2>
                                    <span class="badge bg-secondary p-1"><small><?php echo $buku['kategori_buku']?></small></span>
                                    <p class="card-text mt-1">Stok Buku: <b><?php echo $buku['stok_buku']?></b></p>
                                    <p class="card-text mt-4"><?php echo $buku['deskripsi_buku']?></p>
                                    <label for="exampleFormControlInput1" class="form-label">Jumlah Buku Dibeli:</label>
                                    <h4 class="card-text"><?php echo $jumlah_buku; ?></h4>

                                    <label for="exampleFormControlInput1" class="form-label">Total harga pembelian Buku:</label>
                                    <h4 class="card-text">Rp. <?php echo number_format($total_transaksi, 0, ',', '.'); ?></h4>
                                </div>
                                <div class="btn btn-lg">
                                    <!-- form tersembunyi-->
                                    <form method="POST" action="proses-konfirmasi.php">
                                        <fieldset style="display: none;">
                                        <input type="hidden" name="stok_buku" value="<?php echo $buku['stok_buku']?>">
                                        <input type="number" name="username" value="<?php echo $username;?>" >
                                        <input type="number" name="id_buku" value="<?php echo $id_buku;?>" >
                                        <input type="number" name="jumlah_buku" value="<?php echo $jumlah_buku;?>" >
                                        <input type="number" name="total_transaksi" value="<?php echo $total_transaksi;?>" >
                                        </fieldset>
                                        <input type="submit" value="konfirmasi" name="konfirmasi" class="btn btn-primary px-5">
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        



    </main>

    <footer class="text-center text-white">
        <div class="text-center p-3" style="background-color: #5A96E3;">
            © Copyright 2023 -
            <a class="text-white text-decoration-none" href="https://rayhanx.com/">Erlangga</a>
        </div>
    </footer>
    </div>



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


