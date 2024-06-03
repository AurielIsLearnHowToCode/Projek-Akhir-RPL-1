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
    <link rel="stylesheet" href="style-peminjaman.css">

    <title>SiKelas: Website Pinjam Ruangan</title>
</head>
<body>
    <div class="overlay"></div>
    <div class="navbar">
        <div class="judul josefin-sans-text">SiKelas</div>

        <ul class="josefin-sans-text">
            <li class = "buttons"><a href="Beranda-admin.php?filter=">Ruangan</a></li>
            <li class = "buttons"><a href="Peminjaman.php">Pinjam</a></li>
            <li class = "buttons logout"><a href="#"><?php echo $_SESSION['username'] ?></a><span class="solar--user-circle-bold"></span></li>
        </ul>
        </div>
<div class="container">    
        <div class="daftar">
            <h1><span class="Peminjaman"></span>Peminjaman</h1>
            <div class="row">
                <div class="column">
                    <div class="table-container">
                    <table>
                        <tr>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Nama Lengkap</th>
                            <th>NIP/NIM</th>
                            <th>Kode Ruangan</th>
                            <th>Nama Ruangan</th>
                            <th>Prodi</th>
                            <th>Status</th>
                            <th>Terima/Tidak</th>
                            <th>Action</th>
                        </tr>
                        <?php 
                            $sql1 = "SELECT * FROM peminjaman_kelas";
                            $result = mysqli_query($db, $sql1);
                            while($pinjam = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                    echo "<td>".$pinjam['tanggal']."</td>";
                                    echo "<td>".$pinjam['waktu']."</td>"; 
                                    echo "<td>".$pinjam['nama']."</td>";
                                    echo "<td>".$pinjam['nim']."</td>";
                                    echo "<td>".$pinjam['kode_ruangan']."</td>";
                                    echo "<td>".$pinjam['nama_ruangan']."</td>";
                                    echo "<td>".$pinjam['prodi']."</td>";
                                    echo "<td>".$pinjam['status']."</td>";
                                    echo "<td><c type='yes'><a href='yes-pinjam.php?id=".$pinjam["id"]."'>Ya</a></c><d type='no'><a href='no-pinjam.php?id=".$pinjam["id"]."'>Tidak</a></d></td>";
                                    echo "<td><e type='edt'><a href='edit-peminjaman-admin.php?id=".$pinjam["id"]."'>Edit</a></e><b type='dlt'><a href='del-pinjam.php?id=".$pinjam["id"]."'>Delete</a></b></td>";
                                    echo "</tr>";
                            }
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        
                </table>
                          </div>
                        </div>
                </div>
                </div>
              </div>
        </div>
    </div>
</body>
</html>
