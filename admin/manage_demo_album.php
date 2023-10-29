<?php
require 'includes/sidebar.php';
require 'includes/config.php';
?>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h2 class=""> Manage Demo Album </h2>
    <a href="add_demo_album.php" class="btn btn-success"> Add Demo Album </a>
</div>

<?php
$sql = "SELECT * FROM demo_album";
$query = mysqli_query($conn, $sql);
$row = mysqli_num_rows($query);
$count = 1;
?>


<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light text-center">
                        <tr>
                            <th>SR.No.</th>
                            <th>Image Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        if ($row) {
                            while ($result = mysqli_fetch_assoc($query)) {
                        ?>
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= $result['images'] ?></td>
                                    <td>
                                        <form method="POST" onsubmit="return confirm ('Are You Sure You Went To Delete?')">
                                            <input type="hidden" name="imgID" value="<?= $result['album_id'] ?>">
                                            <input type="hidden" name="img" value="<?= $result['images'] ?>">
                                            <button type="submit" name="Delete_photo" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Photo">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="3"> No Record Found </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php
if (isset($_POST['Delete_photo'])) {
    $imgtID = $_POST['imgID'];
    // Specify the directory path based on the client_id
    $img = "upload/demo_photo/" . $_POST['img'];

    // After deleting images, you can delete the records from the database
    $deleteImages = "DELETE FROM demo_album WHERE album_id = '$imgtID'";
    $runDelete = mysqli_query($conn, $deleteImages);

    if ($runDelete) {
        unlink($img);
        // Successfully deleted images and database records
        $_SESSION['success'] = "Demo Photo Delete Successfully";
        echo "<script> window.location.href='manage_demo_album.php' </script>";
        die();
    } else {
        $_SESSION['error'] = "Failed to delete images. Please try again.";
        echo "<script> window.location.href='manage_demo_album.php' </script>";
        die();
    }
}

?>


<?php
require 'includes/footer.php';
?>