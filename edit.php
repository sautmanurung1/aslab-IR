<?php
        include 'Koneksi.php';
        $id = (int) $_GET['id'];
        $sql = "SELECT * FROM produk INNER JOIN buku ON produk.id_produk=buku.id_produk WHERE produk.id_produk='$id'";
        $query = mysqli_query($Koneksi, $sql);
        $data = mysqli_fetch_array($query);
?>
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
            <h3>Edit Data Buku</h3>
            <form method="post">
                <p><input type="hidden" name="id" value="<?= $data['id_produk']?>"></p>
                <p>Nama Produk</p>
                <p><input type="text" name="nama_produk" value="<?= $data['nama_produk']?>"></p>
                <p>Jenis Produk</p>
                <p><input type="text" name="jenis_produk" value="<?= $data['jenis_produk']?>"></p>
                <p>Judul Buku</p>
                <p><input type="text" name="judul_buku" value="<?= $data['nama_buku']?>"></p>
                <p>Penulis</p>
                <p><input type="text" name="penulis" value="<?= $data['penulis']?>"></p>
                <p>Penerbit</p>
                <p><input type="text" name="penerbit" value="<?= $data['penerbit']?>"></p>
                <p>Harga</p>
                <p><input type="text" name="harga" value="<?= $data['harga']?>"></p>
                <p><input type="submit" class="btn btn-submit" value="Simpan"></p>
            </form>
            <?php
if($_POST){
    $sql="UPDATE produk SET nama_produk='{$_POST['nama_produk']}',
                            jenis_produk='{$_POST['jenis_produk']}',
                            harga='{$_POST['harga']}'
                            WHERE id_produk = '{$_POST['id']}'";
    $query=mysqli_query($Koneksi, $sql);

    $sql="UPDATE buku SET nama_buku='{$_POST['judul_buku']}',
                            penulis='{$_POST['penulis']}', 
                            penerbit='{$_POST['penerbit']}' 
                            WHERE id_produk='{$_POST['id']}'";
    $query=mysqli_query($Koneksi, $sql);
    if($query){
            echo "Data Berhasil Di ubah";
            header('Location: index.php');
    } else{
            echo "Data Gagal Diubah".mysqli_error();
    }
} 
?>
        </div>
    </div>
</body>
</html>