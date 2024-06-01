<?php 
    session_start();
    include "../service/database.php";

    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0"); // Proxies.

    if ((!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) && ($_SESSION['role'] == "guru")) {
        header('Location: ../login.php'); // Redirect ke halaman login jika tidak ada session login
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
    <link rel="stylesheet" href="tentang-user.css">
    <title>SiKelas: Website Pinjam Ruangan</title>
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
    <div class="box">
        <a>TENTANG SIKELAS</a>
        <p>Aplikasi Sistem Kepeminjaman Kelas (SiKelas) merupakan aplikasi berbasis website yang ditujukan pada mahasiswa dan dosen. Aplikasi ini dapat menampilkan informasi mengenai ketersediaan ruangan kelas baik yang sedang atau tidak digunakan di UPI Kampus Cibiru.</p>
    </div>
    <div class="latar-box">
        <span class="latar-text">LATAR BELAKANG</span>
        <p>Sarana dan prasarana yang penting dalam keberlangsungan perkuliahan di lingkungan kampus adalah ruangan kelas. Akan tetapi, terkadang ketersediaan ruangan kelas untuk peminjaman belum efektif. Untuk itu dirancang aplikasi website untuk mengefektifkan peminjaman ruangan kelas untuk pelaksanaan perkuliahan.</p>
    </div>
    
    <div class="tujuan-box">
        <span class="tujuan-text">TUJUAN</span>
        <p>Aplikasi Sistem Kepeminjaman Kelas (SiKelas) bertujuan untuk mengetahui ruangan kelas mana saja yang sedang dan tidak digunakan pada hari tersebut. Dengan ini, dapat membantu mahasiswa atau dosen yang ingin meminjam ruangan kelas untuk dilaksanakan perkuliahan. Tentu hal tersebut dapat memaksimalkan efisiensi waktu dengan tidak perlu mengecek satu per satu ruangan kelas secara langsung di lingkungan kampus.</p>
    </div>
</body>
</html>
