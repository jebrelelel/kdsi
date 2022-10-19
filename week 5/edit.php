<?php
    require('db.php');
    include("auth_session.php");

    $idMurid = $_GET['edit'];
    $result = mysqli_query($con,"select * from murid where idMurid = $idMurid");
    while($dataMurid = mysqli_fetch_array($result)) {
        $nama = $dataMurid['nama'];
        $noHP = $dataMurid['noHP'];
        $email = $dataMurid['email'];
        $alamat = $dataMurid['alamat'];
        $idProgram = $dataMurid['idProgram'];
    }

    if(isset($_POST['update'])) {
        $nama = mysqli_real_escape_string($con,$_POST['nama']);
        $noHP = mysqli_real_escape_string($con,$_POST['noHP']);
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $alamat = mysqli_real_escape_string($con,$_POST['alamat']);
        $idProgram = mysqli_real_escape_string($con,$_POST['drop-prog']);
        $query = "update murid set nama = '$nama', noHP = '$noHP', email = '$email', alamat = '$alamat', idProgram = '$idProgram' where idMurid = '$idMurid'";
        $masuk = mysqli_query($con,$query);
        header("location: data_murid.php");

    }
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8"/>
        <title>Edit Data Murid</title>
        <link rel="stylesheet" href="css/allstyle.css"/>
</head>
<body>

<!-- header -->

<header>

    <a href="index.php" class="logo"></i>BIMBEL</a>

    <nav class="navbar">
        <ul>
            <li><a href="#home">HOME</a></li>
            <li><a class="active" href="data_murid.php">DATA MURID</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
        </ul>
    </nav>

</header>
        <section class="body-reg">
            <form class="register" action="" method="post">
                <h2 class="body-title">Update Data Murid Bimbel Nusantara</h2>
                <p class="register-title"><strong>Nama Lengkap</strong></p>
                <input type="text" class="register-input" name="nama" value="<?php echo $nama?>" required/>
                <p class="register-title"><strong>Nomor Handphone</strong></p>
                <input type="text" class="register-input" name="noHP" value="<?php echo $noHP?>" required/>
                <p class="register-title"><strong>Email</strong></p>
                <input type="text" class="register-input" name="email" value="<?php echo $email?>" required/>
                <p class="register-title"><strong>Alamat</strong></p>
                <input type="text" class="register-input" name="alamat" value="<?php echo $alamat?>" required/>
                <p class="register-title"><strong>Program</strong></p>
                <select name="drop-prog" value=<?php echo $idProgram?> required>
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
                <input type="submit" class="button-reg" name="update" value="Update"/>
            </form>
        </section>
</body>
</html>