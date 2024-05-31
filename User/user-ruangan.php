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
    <link rel="stylesheet" href="user-ruangan.css">

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
            <li class = "buttons logout"><a href="#">Pengguna</a><span class="solar--user-circle-bold"></span></li>
        </ul>
    </div>
    <div class="container">    
        <div class="daftar">
            <h1><span class="ruangan"></span>Daftar Ruangan</h1>
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Cari...">
            </div>
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
                        </tr>
                        <tr>
                            <td>I3-2</td>
                            <td>Ruangan I3-2</td>
                            <td>Kelas</td>
                            <td>Gedung I</td>
                            <td>Tersedia</td>
                        </tr>
                        <tr>
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
                        </tr>
                        <tr>
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
                        </tr>
                        <tr>
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
                        </tr>
                        <tr>
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
                        </tr>
                        <tr>
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
                    <tr>
                        <td>Lokasi Ruangan:
                                <select id="lokasiRuangan">
                                    <option value=""></option>
                                    <option value="gedungC">Gedung Biru</option>
                                    <option value="gedungA">Gedung I</option>
                                    <option value="gedungB">Gedung Baru</option>
                                </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Ruangan:
                            <select id="jenisRuangan">
                                <option value=""></option>
                                <option value="kelas">Kelas</option>
                                <option value="laboratorium">Laboratorium</option>
                                <option value="aula">Aula</option>
                            </select></td>
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
