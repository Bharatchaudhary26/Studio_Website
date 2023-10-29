<?php
require 'navbar.php';
require 'config.php';
?>

<style>
    .title {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 30px;
        font-family: "Merienda", cursive;
        font-weight: 800;
    }

    .title-line-shape {
        display: flex;
        margin: 20px auto 50px auto;
        border-radius: 5px;
        width: 100px;
        height: 5px;
        background-color: #7d8285;
    }

    .gallery-item img {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 10px auto;
        max-width: 98vw;
    }
</style>

<?php
$sql = "SELECT * FROM demo_album";
$query = mysqli_query($conn, $sql);
$row = mysqli_num_rows($query);
?>

<div class="title">
    <h3> Demo Photos </h3>
    <div class="title-line-shape"></div>
</div>

<div class="gallery">
    <?php
    while ($result = mysqli_fetch_assoc($query)) {
        $imagePath = "../admin/upload/demo_photo/" . $result['images'];
    ?>
        <div class="gallery-item">
            <img class="gallery-image" src="<?= $imagePath ?>" alt="img">
        </div>
    <?php
    }
    ?>
</div>

<?php require 'footer.php' ?>