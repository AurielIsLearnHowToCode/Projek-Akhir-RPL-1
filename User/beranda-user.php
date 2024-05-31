<?php 
    session_start();
    include "../service/database.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lilita+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="beranda-user style.css">

    <title>SiKelas: Website Pinjam Ruangan</title>
</head>
<body>
    <div class="overlay"></div>
    <div class="navbar">
        <div class="judul josefin-sans-text">SiKelas</div>

        <ul class="josefin-sans-text">
            <li class = "buttons"><a href="user-ruangan.php">Ruangan</a></li>
            <li class = "buttons"><a href="pinjam-user.php">Pinjam</a></li>
            <li class = "buttons"><a href="tentang-user.html">Tentang</a></li>
            <li class = "buttons logout"><a href="#"><?php echo $_SESSION['username']?></a><span class="solar--user-circle-bold"></span></li>
        </ul>
    </div>
    <div class="content">
        <div class="greeting lilita-one-regular">
            Selamat datang,<br><?php echo $_SESSION['username']?>
        </div>

        <div class="highlight">
            <?php
                $sql1 = "SELECT count(*) as 'lab' FROM ruangan_lab";
                $result = mysqli_query($db, $sql1);
                $lab = mysqli_fetch_assoc($result);

                $sql2 = "SELECT count(*) as 'kelas' FROM ruangan_kelas";
                $result = mysqli_query($db, $sql2);
                $kelas = mysqli_fetch_assoc($result);
                $jumlah = $lab['lab'] + $kelas['kelas'];
            ?>
            <div class="box ruang">
                <div class="box-title josefin-sans-text">Jumlah Ruangan</div>
                <div class="number josefin-sans-text"><?php echo $jumlah ?></div>
            </div>
            <?php
                $sql = "SELECT count(*) as 'jumlah-pinjam' FROM peminjaman_kelas";
                $result = mysqli_query($db, $sql);
                $jumlah_pinjam = mysqli_fetch_assoc($result);

                $jumlah_kosong = $jumlah - $jumlah_pinjam['jumlah-pinjam'];
            ?>
            <div class="box kosong">
                <div class="box-title josefin-sans-text">Jumlah Ruangan Kosong</div>
                <div class="number josefin-sans-text"><?php echo $jumlah_kosong ?></div>
            </div>
            <div class="box pinjam">
                <div class="box-title josefin-sans-text">Jumlah Ajukan Peminjaman</div>
                <div class="number josefin-sans-text"><?php echo $jumlah_pinjam['jumlah-pinjam'] ?></div>
            </div>
        </div>
    </div>
</body>
</html>