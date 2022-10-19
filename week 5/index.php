<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8"/>
        <title>Login</title>
        <link rel="stylesheet" href="css/allstyle.css"/>
</head>
</head>
<body>

<!-- header -->
<header>
    <a href="index.php" class="logo"></i>BIMBEL</a>

    <nav class="navbar">
        <ul>
            <li><a class="active" href="#">LOGIN</a></li>
            <li><a href="register.php">REGISTER</a></li>
        </ul>
    </nav>


</header>
        <?php
            require('db.php');
            session_start();

            if(isset($_POST['submit-murid'])) {
                $idMurid = mysqli_real_escape_string($con, $_REQUEST['id']);
                $password = mysqli_real_escape_string($con, $_REQUEST['password']);
                $nama = mysqli_query($con,"select nama from murid where idMurid = '$idMurid'");
                $nama = mysqli_fetch_assoc($nama);
                $_SESSION['nama'] = $nama['nama'];
                $query = "SELECT * FROM `murid` WHERE idMurid='$idMurid'
                AND password='$password'";
                $result = mysqli_query($con,$query);
                $rows = mysqli_num_rows($result);
                if($rows == 1) {
                    $_SESSION['id'] = $idMurid;
                    header("location: dashboard_murid.php");
                } else {
                    $message = "ID/Password salah, silahkan Login kembali.";
                    echo "<script type='text/javascript'>alert('$message');</script>";;
                }
            }

            if(isset($_POST['submit-admin'])) {
                $idAdmin = mysqli_real_escape_string($con, $_REQUEST['id']);
                $password = mysqli_real_escape_string($con, $_REQUEST['password']);
                $namaAdmin = mysqli_query($con,"select namaAdmin from admin where idAdmin = '$idAdmin'");
                $namaAdmin = mysqli_fetch_assoc($namaAdmin);
                $_SESSION['namaAdmin'] = $namaAdmin['namaAdmin'];
                $query = "SELECT * FROM `admin` WHERE idAdmin='$idAdmin'
                AND password='$password'";
                $result = mysqli_query($con,$query);
                $rows = mysqli_num_rows($result);
                if($rows == 1) {
                    $_SESSION['id'] = $idAdmin;
                    header("location: dashboard_admin.php");
                } else {
                    $message = "ID/Password salah, silahkan Login kembali.";
                    echo "<script type='text/javascript'>alert('$message');</script>";;
                }
            }
        ?>
        <section class="login">
            <div class="login-container">
            <div class="login-box">
            <form class="login-form" action="" method="post">
                <input type="text" class="login-input" name="id" placeholder=" ID" autofocus="true" required/>
                <input type="password" class="login-input" name="password" placeholder=" Password" required/>
                <input type="submit" class="button-login" name="submit-murid" value="Login Murid"/>
                <input type="submit" class="button-login" name="submit-admin" value="Login Admin"/>
            </form>
        </section>
</body>
</html>