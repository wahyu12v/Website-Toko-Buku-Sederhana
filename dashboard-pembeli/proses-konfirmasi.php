<?php
session_start();

include("../config.php");

if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}

if (isset($_POST['konfirmasi'])) {
    $username = $_SESSION['id_pembeli'];
    $id_buku = $_POST['id_buku'];
    $jumlah_buku = $_POST['jumlah_buku'];
    $total_transaksi = $_POST['total_transaksi'];
    $tanggal_transaksi = date('Y-m-d');
    $stok_buku = $_POST['stok_buku'];
    $sisa_stok = $stok_buku - $jumlah_buku;

    if ($jumlah_buku > $stok_buku) {
        $_SESSION['stok_terbatas'] = true;
        header('Location: checkout.php?page=' . $id_buku);
        exit();
    } else {
        $query = "INSERT INTO transaksi (tanggal_transaksi, id_pembeli, id_buku, jumlah_produk, total_transaksi) VALUES ('$tanggal_transaksi', '$username', '$id_buku', '$jumlah_buku', '$total_transaksi')";
        
        if (mysqli_query($db, $query)) {
            $update_query = "UPDATE buku SET stok_buku = '$sisa_stok' WHERE id_buku = '$id_buku'";
            mysqli_query($db, $update_query);

            header('Location: belanja.php');
            exit();
        } 
    }
}
?>
