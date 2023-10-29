<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio - Manage</title>

    <!-- External CSS  -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap CSS  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- Bootsrap Icon  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Google Fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500;600;700&family=Edu+NSW+ACT+Foundation:wght@600;700&family=Edu+SA+Beginner:wght@500;600;700&family=Merienda:wght@500;600;700;800;900&family=Poppins:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">
    <!--Alert Message CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
</head>

<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<body>
    <div class="background">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>

    <header class="nav_section">
        <nav class="navigation">
            <div class="logo">
                <img src="images/logo2.png" alt="">
            </div>
            <div class="menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php#Services">Services</a></li>
                    <?php
                    if (!isset($_SESSION['client_id'])) {
                        echo "";
                    } else {
                    ?> <li><a href="album.php"> Your Album </a></li> <?php
                                                                        }
                                                                            ?>
                    <?php
                    if (!isset($_SESSION['client_id'])) {
                    ?> <li><a href="login.php"> Login </a></li> <?php
                                                                } else {
                                                                    ?> <li><a href="logout.php"> Logout </a></li> <?php
                                                                    }
                                                                        ?>
                    <!-- <li><a href="">Contact</a></li> -->
                </ul>
            </div>
        </nav>
    </header>