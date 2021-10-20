<?php
    include 'Koneksi.php';
    $sql = query("SELECT * FROM produk INNER JOIN buku ON produk.id_produk=buku.id_produk"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Peminjaman</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container clearfix">
        <h1>Aplikasi Jual Buku</h1>

        <div class="sidebar">
            <ul>
                <li><a class="active" href="index.php">Dasboard</a></li>
            </ul>
        </div>
        <div class="content">
            <h1>Daftar Buku</h1>
            <div class="btn-tambah-div">
                <a href="tambah.php"><button class="btn btn-tambah">Tambah Data</button></a>
            </div>
            <div class="btn-edit-div">
                <a href="generate_pdf.php"><button class="btn btn-edit">Generate PDF</button></a>
            </div>
            <table class="data">
                <tr>
                    <th>Nama Produk</th>
                    <th>Jenis Produk</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Harga</th>
                    <th width="20%">Pilihan</th>
                </tr>
                <?php foreach ($sql as $row) : ?>
                <tr>
                    <td><?= $row['nama_produk']; ?></td>
                    <td><?= $row['jenis_produk']; ?></td>
                    <td><?= $row['nama_buku']; ?></td>
                    <td><?= $row['penulis']; ?></td>
                    <td><?= $row['penerbit']; ?></td>
                    <td><?= $row['harga']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id_produk']; ?>" class="btn btn-edit">Edit</a>
                        <a href="hapus.php?id=<?= $row['id_produk']?>"  onclick="return confirm('anda yakin akan menghapus data?')" class="btn btn-hapus">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>

    </div>
</body>
</html>