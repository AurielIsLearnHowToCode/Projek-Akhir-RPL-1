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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lilita+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="pinjam-user.css">

    <title>SiKelas: Website Pinjam Ruangan</title>
</head>
<body>
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
    <div class="content">
        <div class="greeting lilita-one-regular">
            Pinjam Ruang Kelas<br>dengan Mudah<br>
            <button class="status">Status Peminjaman</button>
        </div>
        <div class="form-box">
            <div class="judul-form josefin-sans-text">
                Pinjam Ruangan
            </div>
            <form action="process-pinjam-user.php" method="post">
                <input class="in single" id="nama" type="text" name="nama" placeholder="nama" value="<?php echo $_SESSION['username'] ?>"><br>
                <input class="in double" id="tanggal" type="date" name="date" placeholder="tanggal" style="width: 198px">
                <input class="in double" id="waktu" type="time" name="time" placeholder="waktu" style="width: 198px"><br>
                <input class="in double" id="kodeRuang" type="text" name="kode" placeholder="kode ruangan">
                <input class="in double" id="namaRuang" type="text" name="namaRuang" placeholder="nama ruangan"><br>
                <input class="in double" id="noInduk" type="text" name="nomin" placeholder="NIM / NIP" value="<?php echo $_SESSION['nomin'] ?>">
                <select class="in double" id="prodi" name="prodi" size="1" style="width: 199px">
                    <option value="default">Prodi</option>
                    <option value="Teknik Komputer">Teknik Komputer</option>
                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                    <option value="Pendidikan Multimedia">Pendidikan Multimedia</option>
                    <option value="PGPAUD">PGPAUD</option>
                    <option value="PGSD">PGSD</option>
                </select><br>
                <input class="in single" id="kirim" type="submit" name="submit" value="Pinjam Ruangan Sekarang" style="width: 404px, background-color=#83aab7">
            </form>
        </div>
    </div>
</body>
</html>