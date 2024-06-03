<?php

include("../service/database.php");

if( isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];

    // buat query hapus
    $sql = "DELETE FROM `peminjaman_kelas` WHERE `peminjaman_kelas`.`id` = '".$id."'";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        echo '<script>alert("Data telah berhasil dihapus")</script>';
        header('Location: Peminjaman.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>