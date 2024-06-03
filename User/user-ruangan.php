<?php 
    session_start();
    include "../service/database.php";

    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0"); // Proxies.

    if ((!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) && ($_SESSION['role'] == "guru")) {
        header('Location: login.php'); // Redirect ke halaman login jika tidak ada session login
        exit;
    }

    $filter="";

    $filter=$_GET['filter'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lilita+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="user-ruangan.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>SiKelas: Website Pinjam Ruangan</title>
</head>
<body>
    <div class="overlay"></div>
    <div class="navbar">
        <div class="judul josefin-sans-text"><a href="beranda-user.php">SiKelas</a></div>

        <ul class="josefin-sans-text">
            <li class="buttons"><a href="user-ruangan.php?filter=">Ruangan</a></li>
            <li class="buttons"><a href="pinjam-user.php">Pinjam</a></li>
            <li class="buttons"><a href="tentang-user.php">Tentang</a></li>
            <li class="buttons logout"><a href="#"><?php echo $_SESSION['username']?></a><span class="solar--user-circle-bold"></span></li>
        </ul>
    </div>
    <div class="container">    
        <div class="daftar">
            <h1><span class="ruangan"></span>Daftar Ruangan</h1>
            <div class="search-container">
                <input type="text" id="searchInput" value="<?php echo $filter?>" placeholder="Cari...">
            </div>
            <div class="row">
                <div class="column">
                    <div class="table-container">
                    <table class="table1" id="ruanganTable">
                        <tr>
                            <th>Kode Ruangan</th>
                            <th>Nama Ruangan</th>
                            <th>Jenis Ruangan</th>
                            <th>Lokasi Gedung</th>
                            <th>Status</th>
                        </tr>
                        <?php
                            // Output Kelas
                            $sql1 = "SELECT * FROM ruangan_kelas";
                            $result = mysqli_query($db, $sql1);
                            
                            while ($kelas = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>".$kelas['kode']."</td>";
                                echo "<td>".$kelas['nama']."</td>";
                                echo "<td>Kelas</td>";
                                echo "<td>".$kelas['lokasi']."</td>";
                            
                                $kode_ruangan = mysqli_real_escape_string($db, (int)$kelas['kode']);
                                $sql2 = "SELECT count(*) as ada FROM peminjaman_kelas WHERE kode_ruangan = '".$kelas['kode']."'";
                                $hasil = mysqli_query($db, $sql2);
                            
                                if ($hasil) {
                                    $row = mysqli_fetch_assoc($hasil);
                                    if ($row['ada'] == 0) {
                                        echo "<td>Tersedia</td>";
                                    } else {
                                        echo "<td>Tidak Tersedia</td>";
                                    }
                                } else {
                                    echo "<td>Error in query</td>";
                                }
                                echo "</tr>";
                            }

                            // Output Lab
                            $sql3 = "SELECT * FROM ruangan_lab";
                            $result = mysqli_query($db, $sql3);
                            
                            while($lab = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td>".$lab['kode']."</td>";
                                echo "<td>".$lab['nama']."</td>";
                                echo "<td>Laboratorium</td>";
                                echo "<td>".$lab['lokasi']."</td>";

                                $sql4 = "SELECT count(*) as 'ada' FROM peminjaman_kelas WHERE kode_ruangan = ".$lab['kode'];
                                $hasil = mysqli_query($db, $sql4);
                                $isExist = mysqli_fetch_assoc($hasil);

                                if($isExist['ada'] == 0){
                                    echo "<td>Tersedia</td>";
                                }else{
                                    echo "<td>Tidak Tersedia</td>";
                                }
                                echo "</tr>";
                            }
                        ?>
                    </table>
                    <table class="table2">
                        <tr>
                            <th>Search by:</th>
                        </tr>
                        <tr>
                            <td>Lokasi Ruangan:
                                <select id="lokasiRuangan">
                                    <option value=""></option>
                                    <option value="Gedung Biru">Gedung Biru</option>
                                    <option value="Gedung I">Gedung I</option>
                                    <option value="Gedung Baru">Gedung Baru</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Ruangan:
                                <select id="jenisRuangan">
                                    <option value=""></option>
                                    <option value="Kelas">Kelas</option>
                                    <option value="Laboratorium">Laboratorium</option>
                                    <option value="Aula">Aula</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#searchInput, #lokasiRuangan, #jenisRuangan').on('input change', function() {
                filterTable();
            });

            filterTable();

            function filterTable() {
                var searchText = $('#searchInput').val().toLowerCase();
                var lokasiFilter = $('#lokasiRuangan').val().toLowerCase();
                var jenisFilter = $('#jenisRuangan').val().toLowerCase();

                $('#ruanganTable tr').each(function() {
                    var row = $(this);
                    var kode = row.find('td:eq(0)').text().toLowerCase();
                    var nama = row.find('td:eq(1)').text().toLowerCase();
                    var jenis = row.find('td:eq(2)').text().toLowerCase();
                    var lokasi = row.find('td:eq(3)').text().toLowerCase();

                    var matchesSearch = (searchText === "" || kode.includes(searchText) || nama.includes(searchText));
                    var matchesLokasi = (lokasiFilter === "" || lokasi === lokasiFilter);
                    var matchesJenis = (jenisFilter === "" || jenis === jenisFilter);

                    if (matchesSearch && matchesLokasi && matchesJenis) {
                        row.show();
                    } else {
                        row.hide();
                    }
                });
            }
        });
    </script>
</body>
</html>
