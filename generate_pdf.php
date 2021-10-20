<?php
include 'Koneksi.php';
$sql = query("SELECT * FROM produk INNER JOIN buku ON produk.id_produk=buku.id_produk");
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$HTML ='<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Nama Produk</th>
            <th>Jenis Produk</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Harga</th>
        </tr>';
    foreach ($sql as $row) {
        $HTML .=' <tr>
        <td>'. $row['nama_produk'] .'</td>
        <td>'. $row['jenis_produk'] .'</td>
        <td>'. $row['nama_buku'] .'</td>
        <td>'. $row['penulis'] .'</td>
        <td>'. $row['penerbit'] .'</td>
        <td>'. $row['harga'] .'</td>
        </tr>';
    }
$HTML .='</table>
</body>
</html>';
$mpdf->WriteHTML($HTML);
$mpdf->Output();
