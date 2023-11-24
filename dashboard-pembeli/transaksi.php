<?php
include("../config.php");

if (isset($_POST['beli'])) {

    $id_pembeli = $_POST['id_pembeli'];
    $id_buku = $_GET['page'];
    $tgl_transaksi = $_POST['judul_buku'];
    $jumlah_produk = $_POST['jumlah_produk'];
    $harga_buku = $_POST['harga_buku'];
    $total_transaksi = $harga_buku * $jumlah_produk;

}
?>