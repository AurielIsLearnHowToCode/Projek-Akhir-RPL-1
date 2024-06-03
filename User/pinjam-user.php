<?php 
session_start();
include "../service/database.php";

header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['nama'], $_POST['tanggal'], $_POST['waktu'], $_POST['kode'], $_POST['namaRuang'], $_POST['nomin'], $_POST['prodi'])) {
        echo 'error: Data tidak lengkap!';
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
        die();
    }

    // Buat ID unik untuk kolom `id`
    $id = uniqid(mt_rand(), true);

    // Pastikan `nim` adalah integer
    $nim = (int) $_POST['nomin'];

    // Cek apakah ruangan ada di tabel `ruangan_kelas` atau `ruangan_lab`
    $kode_ruangan = $_POST['kode'];
    $nama_ruangan = $_POST['namaRuang'];
    $query_kelas = "SELECT * FROM ruangan_kelas WHERE kode = '$kode_ruangan' AND nama = '$nama_ruangan'";
    $query_lab = "SELECT * FROM ruangan_lab WHERE kode = '$kode_ruangan' AND nama = '$nama_ruangan'";
    
    $result_kelas = mysqli_query($db, $query_kelas);
    $result_lab = mysqli_query($db, $query_lab);
    
    $_SESSION['ruangan'] = $nama_ruangan;

    if (mysqli_num_rows($result_kelas) > 0 || mysqli_num_rows($result_lab) > 0) {
        // Prepared statement to prevent SQL injection
        $stmt = $db->prepare("INSERT INTO peminjaman_kelas (id, nama, nim, tanggal, waktu, prodi, kode_ruangan, nama_ruangan, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'Sedang Diproses')");
        $stmt->bind_param("ssisssss", $id, $_POST['nama'], $nim, $_POST['tanggal'], $_POST['waktu'], $_POST['prodi'], $kode_ruangan, $nama_ruangan);
        
        if ($stmt->execute()) {
            echo "<script>alert('Peminjamanmu sudah diusulkan ke admin');</script>";
            header("Location: status-user.php");
        } else {
            echo 'error: '.mysqli_error($db);
        }

        $stmt->close();
    } else {
        echo "<script>alert('Ruangan Tidak Ditemukan');</script>";
    }
}

$db->close();
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
            <li class="buttons"><a href="user-ruangan.php">Ruangan</a></li>
            <li class="buttons"><a href="pinjam-user.php">Pinjam</a></li>
            <li class="buttons"><a href="tentang-user.php">Tentang</a></li>
            <li class="buttons logout"><a href="#"><?php echo $_SESSION['username'] ?></a><span class="solar--user-circle-bold"></span></li>
        </ul>
    </div>
    <div class="content">
        <div class="greeting lilita-one-regular">
            Pinjam Ruang Kelas<br>dengan Mudah<br>
            <button class="status"><a href="status-user.php" style="font-size: 16px; color : #ffff">Status Peminjaman</a></button>
        </div>
        <div class="form-box">
            <div class="judul-form josefin-sans-text">
                Pinjam Ruangan
            </div>
            <form action="pinjam-user.php" method="post">
                <input class="in single" id="nama" type="text" name="nama" placeholder="Nama"><br>
                <input class="in double" id="tanggal" type="date" name="tanggal" placeholder="tanggal" style="width: 198px">
                <input class="in double" id="waktu" type="time" name="waktu" placeholder="Waktu" style="width: 198px"><br>
                <input class="in double" id="kodeRuang" type="text" name="kode" placeholder="Kode Ruangan">
                <input class="in double" id="namaRuang" type="text" name="namaRuang" placeholder="Nama Ruangan"><br>
                <input class="in double" id="noInduk" type="text" name="nomin" placeholder="NIM / NIP">
                <select class="in double" id="prodi" name="prodi" size="1" style="width: 199px">
                    <option value="default">Prodi</option>
                    <option value="Teknik Komputer">Teknik Komputer</option>
                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                    <option value="Pendidikan Multimedia">Pendidikan Multimedia</option>
                    <option value="PGPAUD">PGPAUD</option>
                    <option value="PGSD">PGSD</option>
                </select><br>
                <input class="in single" id="kirim" type="submit" name="submit" value="Pinjam Ruangan Sekarang" style="width: 404px; background-color:#365486">
            </form>
        </div>
    </div>
</body>
</html>
