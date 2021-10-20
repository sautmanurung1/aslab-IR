<?php
   $Koneksi = mysqli_connect("localhost", "root", "", "aslab");

    function query($query){
        global $Koneksi;
        $result = mysqli_query($Koneksi, $query);
        $rows = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
?>