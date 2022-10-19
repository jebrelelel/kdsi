<?php
    require('db.php');
    include("auth_session.php");
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8"/>
        <title>Laman Murid</title>
        <link rel="stylesheet" href="css/allstyle.css"/>
</head>
</head>
<body>

<!-- header -->

<header>

    <a href="#" class="logo"></i>BIMBEL</a>

    <nav class="navbar">
        <ul>
            <li><a class="active" href="#">HOME</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
        </ul>
    </nav>

</header>

<!-- header ends -->

<!-- home  -->

<section class="home" id="home">
    <h1>Halo <?php echo $_SESSION['nama']."!" ?></h1>
    <h3>Sayang sekali sedang ada maintenance :(
        Tunggu info selanjutnya ya!</h3>
</section>

<!-- home  ends -->

</body>
</html>