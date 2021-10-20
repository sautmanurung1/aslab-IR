<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Kategori</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container clearfix">
        <h1>Aplikasi Jual Buku</h1>

        <div class="sidebar">
            <ul>
                <li><a href="#">Dashboard</a></li>
            </ul>
        </div>

        <div class="content">
            <h3>Tambah Data Buku</h3>
            <form method="post">
                <p>Nama Produk</p>
                <p><input type="text" name="nama_produk"></p>
                <p>Jenis Produk</p>
                <p><input type="text" name="jenis_produk"></p>
                <p>Judul Buku</p>
                <p><input type="text" name="judul_buku"></p>
                <p>Penulis</p>
                <p><input type="text" name="penulis"></p>
                <p>Penerbit</p>
                <p><input type="text" name="penerbit"></p>
                <p>Harga</p>
                <p><input type="text" name="harga"></p>
                <p><input type="submit" class="btn btn-submit" value="Simpan"></p>
            </form>
            <?php
            include 'Koneksi.php';
            if($_POST){
            $sql = "INSERT INTO produk (nama_produk,jenis_produk,harga) VALUES ('{$_POST['nama_produk']}', '{$_POST['jenis_produk']}', '{$_POST['harga']}')";
            $query = mysqli_query($Koneksi, $sql);

            $sql = "SELECT max(id_produk) AS last_id FROM produk LIMIT 1";
            $query = mysqli_query($Koneksi, $sql);
            $data = mysqli_fetch_array($query);
            $last_id = $data['last_id'];

            $sql = "INSERT INTO buku(id_produk, nama_buku, penulis, penerbit) VALUES ('$last_id', '{$_POST['nama_barang']}', '{$_POST['penulis']}', '{$_POST['penerbit']}')";
            $query = mysqli_query($Koneksi, $sql);

            if($query){
            echo "Data Berhasil Disimpan";
            header('Location: index.php');
            } else {
                echo "Data Gagal Disimpan".mysqli_error();
            }
        } 
    ?>
        </div>
    </div>
</body>
</html>