
<?php
    session_start(); // Memulai session di awal script
    include "service/database.php";

    $loginfailed = "";
    if(isset($_POST['login'])) {
        $username = $_POST['uname'];
        $password = $_POST['psw'];
        $role = $_POST['role'];
        // Menggunakan prepared statements untuk mencegah SQL Injection
        $stmt = $db->prepare("SELECT * FROM ".$role." WHERE nomin=? AND password=?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $hasil = $result->fetch_assoc();

        if($result->num_rows > 0){
            $_SESSION['loggedin'] = true; // Menyimpan status login di session
            $_SESSION['username'] = $hasil['username']; // Menyimpan username di session jika diperlukan
            $_SESSION['nomin'] = $hasil['nomin'];

            if($role == "murid"){
            header("location: User/beranda-user.php");
            }elseif($role == "guru"){
            header("location: Admin/Beranda-admin.php");
            }

            exit();
        } else {
          echo "<script>alert('User tidak Ditemukan');</script>";
        }
        $stmt->close();
        $db->close();
    }
    ?>
        
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="login_style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="right">
      <img src="Asset/koridor.jpg" alt="">
      <div class="title">SiKelas</div>
      <div class="subtitle">Sistem<br>Kepeminjaman<br> Kelas</div>
      <div class="login">
      </div>
    </div>
        <form action="login.php" method="POST">
          <h1></h1>
          <label for="uname"></label>
          <input type="text" placeholder="Username" name="uname" required>
          <label for="psw"></label>
          <input type="password" placeholder="Password" name="psw" required>
          <label for="role"></label>
          <select name="role" required>
            <option value="">Select</option>
            <option value="murid">Anggota</option>
            <option value="guru">Admin</option>
          </select>
          <button type="submit" name="login">Login</button>
        </form>
      </div>
    </div>
  </body>
  </html>
