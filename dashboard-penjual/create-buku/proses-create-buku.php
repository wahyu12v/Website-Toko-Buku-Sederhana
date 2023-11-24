<?php
include("../../config.php");

if (isset($_POST['create_buku'])) {

    $id_penjual = $_POST['id_penjual'];
    $jbuku = $_POST['judul_buku'];
    $dbuku = $_POST['deskripsi_buku'];
    $hbuku = $_POST['harga_buku'];
    $kbuku = $_POST['kategori_buku'];
    $sbuku = $_POST['stok_buku'];

    $uploadDir = "../../uploads/";
    $cbuku = '';

    if ($_FILES['cover_buku']['name']) {
        $fileExtension = pathinfo($_FILES['cover_buku']['name'], PATHINFO_EXTENSION);
        $cbuku = "uploads/" . uniqid() . '.' . $fileExtension;
        move_uploaded_file($_FILES['cover_buku']['tmp_name'], "../../" . $cbuku);
    }

    // buat query
    $sql = "INSERT INTO buku (judul_buku, deskripsi_buku, harga_buku, kategori_buku, cover_buku, stok_buku) VALUES ('$jbuku', '$dbuku', '$hbuku', '$kbuku', '$cbuku', '$sbuku')";
    $query = mysqli_query($db, $sql);

    if ($query) {
        $id_buku_baru = mysqli_insert_id($db); // Mendapatkan ID buku yang baru di-insert

        $tanggal_input = date('Y-m-d'); // Mendapatkan tanggal saat ini
        $sql_menginput = "INSERT INTO menginput (tanggal_input, id_penjual, id_buku) VALUES ('$tanggal_input', '$id_penjual', '$id_buku_baru')";
        $query_menginput = mysqli_query($db, $sql_menginput);

        header('Location: ../create-buku/index.php?status=berhasil');
    } else {
        header('Location: ../create-buku/index.php?status=gagal');
    }
} else {
    die("Akses dilarang...");
}
?>
