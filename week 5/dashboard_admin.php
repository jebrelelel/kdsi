<?php
    require('db.php');
    include("auth_session.php");
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8"/>
        <title>Laman Admin</title>
        <link rel="stylesheet" href="css/allstyle.css"/>
</head>
</head>
<body>

<!-- header -->

<header>

    <a href="#" class="logo"></i>BIMBEL</a>

    <nav class="navbar">
        <ul>
            <li><a class="active" href="#home">HOME</a></li>
            <li><a href="data_murid.php">DATA MURID</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
        </ul>
    </nav>

</header>

<!-- header ends -->

<!-- home  -->

<section class="home" id="home">
    
    <h1>Halo Admin <?php echo $_SESSION['namaAdmin']."!" ?></h1>

    <div class="shape"></div>

</section>

<!-- home  ends -->
</body>
</html>