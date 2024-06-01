<?php 
    session_start();
    include "../service/database.php";

    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0"); // Proxies.

    if ((!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) && ($_SESSION['role'] == "murid")) {
        header('Location: ../login.php'); // Redirect ke halaman login jika tidak ada session login
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lilita+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="tambah-ruangan.css">

    <title>SiKelas: Website Pinjam Ruangan</title>
</head>
<body>
    <div class="overlay"></div>
    <div class="navbar">
        <div class="judul josefin-sans-text">SiKelas</div>

        <ul class="josefin-sans-text">
            <li class = "buttons"><a href="Beranda-admin.php">Ruangan</a></li>
            <li class = "buttons"><a href="Peminjaman.php">Pinjam</a></li>
            <li class = "buttons logout"><a href="#"><?php echo $_SESSION['username'] ?></a><span class="solar--user-circle-bold"></span></li>
        </ul>
    </div>
    <div class="container">
        <div class="content">
            <form action="#">
            <div class="formedit-text">
            <p>Form Tambah Ruangan <span class="close" id="closeButton">&times;</span></p>
            <hr>
            <tr>
                <label for="admin">Kode Ruangan</label>
                <td>
                    <input type="text" name="kode" class= "input-control" >
                </td>
            </tr>
            <tr>
                <label for="admin">Nama Ruangan</label>
                <td>
                    <input type="text" name="nama" class= "input-control" >
                </td>
            </tr>
            <tr>
            <label for="admin">Jenis Ruangan</label>
            <select name="status" id="jenisruangan">
                <option value="select"></option>
                <option value="gedungC">Gedung Biru</option>
                <option value="gedungA">Gedung I</option>
                <option value="gedungB">Gedung Baru</option>
            </select>
            <tr>
                <label for="admin">Lokasi Gedung</label> 
                <td>
                    <input type="text" name="lokasi" class= "input-control" >
                </td>
            </tr>
            <input type="submit" value="Simpan Perubahan">
        </form>
        </div>
        </div>
    </div>  
</body>
</html>