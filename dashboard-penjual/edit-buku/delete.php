<?php
include("../../config.php");

if (isset($_GET['id'])) {

    $id_buku = $_GET['id'];

    // Hapus data dari tabel menginput
    $sql_delete_menginput = "DELETE FROM menginput WHERE id_buku=$id_buku";
    $query_delete_menginput = mysqli_query($db, $sql_delete_menginput);

    // Hapus data dari tabel buku
    $sql_delete_buku = "DELETE FROM buku WHERE id_buku=$id_buku";
    $query_delete_buku = mysqli_query($db, $sql_delete_buku);

    if ($query_delete_menginput && $query_delete_buku) {
        header('Location: index.php');
    } else {
        die("Gagal menghapus...");
    }
} else {
    die("Akses dilarang...");
}
?>
