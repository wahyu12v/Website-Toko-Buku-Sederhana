<?php
session_start();

$id_buku = $_GET['page'];

include("../config.php");
$query = "SELECT * FROM buku WHERE id_buku = $id_buku";
$result = mysqli_query($db, $query);
$buku = mysqli_fetch_assoc($result);

// Check if the "Stok Terbatas" session variable is set and show the alert
if (isset($_SESSION['stok_terbatas']) && $_SESSION['stok_terbatas']) {
    echo "<script>alert('Stok Terbatas');</script>";
    unset($_SESSION['stok_terbatas']); // Clear the session variable after showing the alert
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
                <form action="konfirmasi.php?page=<?php echo $_GET['page'] ?>" method="POST">
                    <div class="card mt-4">
                    <div class="row">
                        <div class="col-6"  style="width: 260px;">
                            <img src="../<?php echo $buku['cover_buku']?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-6">
                        <div class="card-body">
                            <input type="hidden" name="id_buku" value="<?php echo $buku['harga_buku']?>">
                            <h2 class="card-title"><?php echo $buku['judul_buku']?></h2>
                            <span class="badge bg-secondary p-1"><small><?php echo $buku['kategori_buku']?></small></span>
                            <p class="card-text mt-1">Stok Buku: <b><?php echo $buku['stok_buku']?></b></p>
                            <p  class="card-text mt-4"><?php echo $buku['deskripsi_buku']?></p>
                            <h4 class="card-text" id="harga_buku">Rp. <?php echo number_format($buku['harga_buku'], 0, ',', '.'); ?></h4>

                            <label for="exampleFormControlInput1" class="form-label">Jumlah Buku Ingin Dibeli:</label>
                            <input name="jumlah_produk" type="number" class="form-control border" id="jumlah_produk" maxlength="50" required oninput="calculateTotalPrice()">
                        </div>
                        

                        <div class="btn btn-lg">
                            <input name="beli" class="btn btn-primary px-5" type="submit" value="Beli"></input>
                        </div>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>




    </main>

    <footer class="text-center text-white fixed-bottom">
        <div class="text-center p-3" style="background-color: #5A96E3;">
            © Copyright 2023 -
            <a class="text-white text-decoration-none" href="https://rayhanx.com/">Erlangga</a>
        </div>
    </footer>
    </div>

    <script>
        function calculateTotalPrice() {
            // Get the harga_buku value from the PHP variable and remove any non-numeric characters
            const hargaBuku = <?php echo $buku['harga_buku']; ?>;

            // Get the jumlah_produk value from the input element
            const jumlahProduk = parseInt(document.getElementById('jumlah_produk').value);

            // Calculate the total price
            const totalPrice = hargaBuku * jumlahProduk;

            // Display the total price in the HTML
            document.getElementById('harga_buku').innerText = 'Rp. ' + totalPrice.toLocaleString('id-ID');
        }
    </script>


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