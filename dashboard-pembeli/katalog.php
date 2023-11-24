<?php
include("../config.php");

$sql = "SELECT * FROM buku ORDER BY id_buku DESC";
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
                <div class="row row-cols-1 row-cols-md-3 g-4">
                        <?php foreach ($query as $buku) : ?>
                            <div class="col">
                                <a class="text-dark text-decoration-none" href="buku.php?page=<?php echo $buku['id_buku']; ?>">
                                    <div class="card" style="height: 500px;">
                                        <div class="img-container" style="height: 380px;">
                                            <img src="../<?php echo $buku['cover_buku']; ?>" class="card-img-top cover" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo substr($buku['judul_buku'], 0, 50); ?></h5>
                                            <h5 class="card-text fw-bold">Rp. <?php echo number_format($buku['harga_buku'], 0, ',', '.'); ?></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        
                        <?php endforeach; ?>
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