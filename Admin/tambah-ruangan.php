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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!isset($_POST['kode'], $_POST['nama'], $_POST['status'], $_POST['lokasi'])) {
            echo "<script>alert('data tidak lengkap');</script>";
            die();
        }

        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $jenisRuangan = $_POST['status'];
        $lokasi = $_POST['lokasi'];

        if ($jenisRuangan === 'kelas') {
            $table = 'ruangan_kelas';
        } else if ($jenisRuangan === 'laboratorium') {
            $table = 'ruangan_lab';
        } else {
            echo "<script>alert('data tidak lengkap');</script>";
            die();
        }

        // Prepared statement to prevent SQL injection
        $stmt = $db->prepare("INSERT INTO $table (kode, nama, lokasi) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $kode, $nama, $lokasi);

        if ($stmt->execute()) {
            echo "<script>alert('data sudah ditambahkan');</script>".$table;
        } else {
            echo 'error: '.mysqli_error($db);
        }

        $stmt->close();
    }

    $db->close();
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
            <li class="buttons"><a href="Beranda-admin.php?filter=">Ruangan</a></li>
            <li class="buttons"><a href="Peminjaman.php">Pinjam</a></li>
            <li class="buttons logout"><a href="#"><?php echo $_SESSION['username'] ?></a><span class="solar--user-circle-bold"></span></li>
        </ul>
    </div>
    <div class="container">
        <div class="content">
            <form action="tambah-ruangan.php" method="post">
            <div class="formedit-text">
            <p>Form Tambah Ruangan <a href="Beranda-admin.php"><span class="close" id="closeButton">&times;</span></a></p>
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
                <option value="select">pilih</option>
                <option value="laboratorium">Laboratorium</option>
                <option value="kelas">Kelas</option>
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
</body>
</html>
