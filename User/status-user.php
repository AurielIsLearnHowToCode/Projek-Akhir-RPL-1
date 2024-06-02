<?php 
    session_start();
    include "../service/database.php";

    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0"); // Proxies.

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header('Location: login.php'); // Redirect ke halaman login jika tidak ada session login
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lilita+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="status-user.css">
    <title>Tentang-User</title>
</head>
<body>
    <div class="background-box"></div>
    <div class="overlay"></div>
    <div class="navbar">
        <div class="judul josefin-sans-text"><a href="beranda-user.php">SiKelas</a></div>

        <ul class="josefin-sans-text">
            <li class = "buttons"><a href="user-ruangan.php">Ruangan</a></li>
            <li class = "buttons"><a href="pinjam-user.php">Pinjam</a></li>
            <li class = "buttons"><a href="tentang-user.php">Tentang</a></li>
            <li class = "buttons logout"><a href="#"><?php echo $_SESSION['username'] ?></a><span class="solar--user-circle-bold"></span></li>
        </ul>
    </div>
    <div class="bottom-boxes">
    </div>
    <div class="status-text">
        <p>Halo <?php echo $_SESSION['username'] ?></p>
        <p>Peminjaman <?php echo $_SESSION['ruangan'] ?></p>
        <p>Sedang Diproses</p>
    </div>
</div>
<div class="akhir-text josefin-sans-text">
    <p>Silakan segera memasuki ruangan perkuliahan</p>
    <p>Selamat melaksanakan kegiatan pembelajaran dan terus semangat guna mencapai keberhasilan</p>
 <div class="no-text">
        <p>Contact Person: +62 895-2412-1850</p>
    </div>
</body>
</html>
