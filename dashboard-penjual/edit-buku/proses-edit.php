<?php
include("../../config.php");

if (isset($_POST['edit_buku'])) {

    $id_buku = $_POST['id_buku'];
    $jbuku = $_POST['judul_buku'];
    $dbuku = $_POST['deskripsi_buku'];
    $kbuku = $_POST['kategori_buku'];
    $sbuku = $_POST['stok_buku'];
    $hbuku = $_POST['harga_buku'];

    $uploadDir = "../../uploads/";
    $cbuku = '';

    if ($_FILES['cover_buku']['name']) {
        $fileExtension = pathinfo($_FILES['cover_buku']['name'], PATHINFO_EXTENSION);
        $cbuku = "uploads/" . uniqid() . '.' . $fileExtension;
        move_uploaded_file($_FILES['cover_buku']['tmp_name'], "../../" . $cbuku);
    }

    // buat query update
    $sql = "UPDATE buku SET judul_buku = '$jbuku', deskripsi_buku = '$dbuku', harga_buku = '$hbuku', kategori_buku = '$kbuku', cover_buku = '$cbuku', stok_buku = '$sbuku' WHERE id_buku = $id_buku";
    $query = mysqli_query($db, $sql);
    header('Location: index.php');

} else {
    die("Akses dilarang...");
}
?>