<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8"/>
        <title>Register</title>
        <link rel="stylesheet" href="css/allstyle.css"/>
</head>
<body>

<!-- header -->

<header>
    <a href="index.php" class="logo"></i>BIMBEL</a>
    
    <nav class="navbar">
        <ul>
            <li><a href="index.php">LOGIN</a></li>
            <li><a class="active" href="register.php">REGISTER</a></li>
        </ul>
    </nav>

</header>
        <?php
            require('db.php');
            session_start();
            if(isset($_POST['submit'])) {
                $nama = mysqli_real_escape_string($con,$_POST['nama']);
                $noHP = mysqli_real_escape_string($con,$_POST['noHP']);
                $email = mysqli_real_escape_string($con,$_POST['email']);
                $alamat = mysqli_real_escape_string($con,$_POST['alamat']);
                $idProgram = mysqli_real_escape_string($con,$_POST['drop-prog']);
                $waktuPendaftaran = date("Y-m-d H:i:s");
                $password = rand(10000000,99999999);
                $query = "INSERT into murid (nama, noHP, email, alamat, idProgram, waktuPendaftaran, password)
                VALUES ('$nama', '$noHP', '$email', '$alamat', '$idProgram', '$waktuPendaftaran', '$password')";
                $masuk = mysqli_query($con,$query);
                $_SESSION['email'] = $email;
                $idMurid = mysqli_query($con,"select idMurid from murid where email='$email'");
                $idMurid = mysqli_fetch_assoc($idMurid);
                $idMurid = $idMurid['idMurid'];
                $idPembayaran = 91220020 + $idMurid;
                mysqli_query($con,"UPDATE `murid` SET `idPembayaran` = '$idPembayaran' WHERE `murid`.`idMurid` = '$idMurid'");
                if ($masuk) {
                    header("location: index.php");
                } else {
                    header("location: register.php");
                }
            }
        ?>
        <section class="body-reg">
            <form class="register" action="" method="post">
                <h2 class="body-title">Pendaftaran Bimbel Nusantara TP 2024/2025</h2>
                <p class="register-title"><strong>Nama Lengkap</strong></p>
                <input type="text" class="register-input" name="nama" required/>
                <p class="register-title"><strong>Nomor Handphone</strong></p>
                <input type="text" class="register-input" name="noHP" required/>
                <p class="register-title"><strong>Email</strong></p>
                <input type="text" class="register-input" name="email" required/>
                <p class="register-title"><strong>Alamat</strong></p>
                <input type="text" class="register-input" name="alamat" required/>
                <p class="register-title"><strong>Program</strong></p>
                <select name="drop-prog" required>
                    <option value="">--Silahkan pilih program--</option>
                    <?php
                        $list=mysqli_query($con,"select * from program order by idProgram asc");
                        while($row_list=mysqli_fetch_assoc($list)) {
                        ?> 
                    <option value="<?php echo $row_list['idProgram']; ?>">  
                        <?php echo $row_list['namaProgram'];?>
                    </option>
                    <?php
                    }
                    ?>
                </select>
                <input type="submit" class="button-reg" name="submit" value="Register"/>
            </form>
        </section>

</body>
</html>