

<!doctype html>
<html lang="en">
<head>
	<title>Dashboard</title>
	<link rel="icon" href="assets/img/logo.png" type="image/png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
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
    <nav class="navbar navbar-expand-lg navbar-light sticky-top py-3" style="background-color: #5A96E3;">
        <div class="container" style="max-width: 1000px;">
            <a class="navbar-brand" href="index.php"><img src="assets/img/logo_erlangga.png" alt="" height="40"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item badge rounded-pill px-4" style="background-color: #2f6dbd">
                        <a class="nav-link" style="font-size: 16px; font-weight: 600; color: white;" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container" style="max-width: 1000px;">
		<div id="content" class="m-4 m-md-5 mt-5">
			<h2 class="mb-4" style="font-weight: 600;">Buat Akun Baru</h2>
			<form action="proses-registrasi.php" method="POST" >
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Username :</label>
                    <input name="username_pembeli" type="text" class="form-control border" id="exampleFormControlInput1" placeholder="Username" maxlength="50" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Anda :</label>
                    <input name="nama_pembeli" type="text" class="form-control border" id="exampleFormControlInput1" placeholder="Nama Anda" maxlength="50" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Alamat :</label>
                    <input name="alamat_pembeli" type="text" class="form-control border" id="exampleFormControlInput1" placeholder="Alamat Lengkap Saat Ini" maxlength="50" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nomor Telepon :</label>
                    <input name="telepon_pembeli" type="number" class="form-control border" id="exampleFormControlInput1" placeholder="Nomor Telepon Aktif" maxlength="50" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password :</label>
                    <input name="password_pembeli" type="password" class="form-control border" id="exampleFormControlInput1" placeholder="Password" maxlength="50" required>
                </div>

                <div class="d-grid gap-2">
                    <button name="create_akun" class="btn btn-save mt-5 text-white" type="submit"><i class="fa fa-cloud-upload" aria-hidden="true"></i> <label>Buat Akun</label></button>
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