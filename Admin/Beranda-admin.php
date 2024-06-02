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
    <link rel="stylesheet" href="style_admin.css">

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
        <div class="daftar">
            <h1><span class="ruangan"></span>Daftar Ruangan</h1>
            <button type="submit"><a href="tambah-ruangan.php" style="color: white;">Tambah Ruangan</a></button>
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Cari...">
            </div>
            <script>
                document.getElementById('searchInput').addEventListener('keydown', function(event) {
                    if (event.key === 'Enter') {
                        document.getElementById('searchInput').submit();
                    }
                });
            </script>
            <div class="row">
                <div class="column">
                    <div class="table-container">
                    <table class="table1">
                        <tr>
                            <th>Kode Ruangan</th>
                            <th>Nama Ruangan</th>
                            <th>Jenis Ruangan</th>
                            <th>Lokasi Gedung</th>
                            <th>Status</th>
                            <th>Alat</th>
                        </tr>
                        <?php
                            // <---------------------------- Output Kelas ---------------------------->
                            $sql1 = "SELECT * FROM ruangan_kelas";
                            $result = mysqli_query($db, $sql1);
                            
                            while ($kelas = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>".$kelas['kode']."</td>";
                                echo "<td>".$kelas['nama']."</td>";
                                echo "<td>Kelas</td>";
                                echo "<td>".$kelas['lokasi']."</td>";
                            
                                // Properly quote 'kode_ruangan' if it is a string
                                $kode_ruangan = mysqli_real_escape_string($db, (int)$kelas['kode']);
                                $sql2 = "SELECT count(*) as ada FROM peminjaman_ruangan WHERE kode_ruangan = '$kode_ruangan'";
                                $hasil = mysqli_query($db, $sql2);
                            
                                // Check if the query execution was successful
                                if ($hasil) {
                                    $row = mysqli_fetch_assoc($hasil); // Fetch the result correctly
                                    if ($row['ada'] == 0) {
                                        echo "<td>Tersedia</td>";
                                    } else {
                                        echo "<td>Tidak Tersedia</td>";
                                    }
                                } else {
                                    // Handle query failure
                                    echo "<td>Error in query</td>";
                                }
                            
                                echo "<td><e type='edt'>Edit</e><b type='dlt'>Delete</b></td>";
                                echo "</tr>";
                            }
                            

                            // <---------------------------- Output Lab ---------------------------->
                            // $sql1 = "SELECT * FROM ruangan_kelas";
                            // $result = mysqli_query($db, $sql1);
                            
                            // while ($kelas = mysqli_fetch_assoc($result)) {
                            //     echo "<tr>";
                            //     echo "<td>".$kelas['kode']."</td>";
                            //     echo "<td>".$kelas['nama']."</td>";
                            //     echo "<td>Laboratorium</td>";
                            //     echo "<td>".$kelas['lokasi']."</td>";
                            
                            //     // Properly quote 'kode_ruangan' if it is a string
                            //     $kode_ruangan = mysqli_real_escape_string($db, $kelas['kode']);
                            //     $sql2 = "SELECT count(*) as ada FROM peminjaman_ruangan WHERE kode_ruangan = '$kode_ruangan'";
                            //     $hasil = mysqli_query($db, $sql2);
                            
                            //     // Check if the query execution was successful
                            //     if ($hasil) {
                            //         $row = mysqli_fetch_assoc($hasil); // Fetch the result correctly
                            //         if ($row['ada'] == 0) {
                            //             echo "<td>Tersedia</td>";
                            //         } else {
                            //             echo "<td>Tidak Tersedia</td>";
                            //         }
                            //     } else {
                            //         // Handle query failure
                            //         echo "<td>Error in query</td>";
                            //     }
                            
                            //     echo "<td><e type='edt'>Edit</e><b type='dlt'>Delete</b></td>";
                            //     echo "</tr>";
                            // }
                        ?>
                        <tr>
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
                        </tr>
                        <tr>
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
                        </tr>
                        <tr>
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
                        </tr>
                        <tr>
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
                        </tr>
                        <tr>
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
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        
                </table>
                <table class="table2">
                    <tr>
                        <th>Search by:</th>
                    </tr>
                    <form action="Beranda-user.php" method="post">
                    <tr>
                        <td>Lokasi Ruangan:
                            <select id="lokasiRuangan" name="lokasi">
                                <option value="">Pilih</option>
                                <?php
                                    $sql1 = "SELECT lokasi FROM ruangan_lab";
                                    $result = mysqli_query($db, $sql1);
                                    while($hasil_lab = mysqli_fetch_assoc($result)){
                                        echo "<option value=".$hasil_lab['lokasi'].">".$hasil_lab['lokasi']."</option>";
                                    }

                                    $sql2 = "SELECT lokasi FROM ruangan_kelas";
                                    $result = mysqli_query($db, $sql2);
                                    while($hasil_kelas = mysqli_fetch_assoc($result)){
                                        echo "<option value=".$hasil_lab['lokasi'].">".$hasil_lab['lokasi']."</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Ruangan:
                            <select id="jenisRuangan" name="jenis">
                                <option value="">Pilih</option>
                                <option value="kelas">Kelas</option>
                                <option value="laboratorium">Laboratorium</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="button" name="kirim" value="cari">
                        </td>
                    </tr>
                    </form>
                </table>
                    </div>
                </div>
            </div>
        </div>
</div>
</body>
</html>
