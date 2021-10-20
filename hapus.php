<?php
    include 'Koneksi.php';
    $id = (int) $_GET['id'];

    if($id){
        $sql = "DELETE FROM buku WHERE id_produk='{$id}'";
        $query = mysqli_query($Koneksi, $sql);

        $sql = "DELETE FROM produk WHERE id_produk='{$id}'";

        $query = mysqli_query($Koneksi, $sql);
    }
header('Location: index.php');
exit;
?>