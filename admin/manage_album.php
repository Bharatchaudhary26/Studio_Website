<?php
require 'includes/sidebar.php';
require 'includes/config.php';
?>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h2 class=""> Manage Album </h2>
    <!-- <a href="add_album.php" class="btn btn-success"> Add Client Album </a> -->
</div>

<?php
$sql = "SELECT client_login.client_id, client_login.name, client_login.username, client_login.password, COUNT(client_album.client_id) AS images FROM client_login LEFT JOIN client_album ON client_login.client_id = client_album.client_id GROUP BY client_login.client_id, client_login.name, client_login.username, client_login.password";
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
                            <th>Client Name</th>
                            <th>Client Username</th>
                            <th>Client Password</th>
                            <th>Total Images</th>
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
                                    <td><?= $result['name'] ?></td>
                                    <td><?= $result['username'] ?></td>
                                    <td><?= $result['password'] ?></td>
                                    <td><?= $result['images'] ?></td>
                                    <td class="d-flex">
                                        <a href="add_album.php?c_id=<?= $result['client_id'] ?>" class="mr-2">
                                            <button type="button" name="Add_photo" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Add Photos">
                                                <i class="bi bi-folder-plus"></i>
                                            </button>
                                        </a>
                                        <form method="POST" onsubmit="return confirm ('Are You Sure You Went To Delete?')">
                                            <input type="hidden" name="clientID" value="<?= $result['client_id'] ?>">
                                            <!-- <input type="hidden" name="image" value="<?= $result['images'] ?>"> -->
                                            <button type="submit" name="Delete_photo" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete client">
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
                                <td colspan="6"> No Record Found </td>
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
    $clientID = $_POST['clientID'];

    // Specify the directory path based on the client_id
    $imageDir = "upload/";

    // Check if the directory exists
    if (is_dir($imageDir)) {
        // Open the directory
        if ($dh = opendir($imageDir)) {
            // Iterate through the files in the directory
            while (($file = readdir($dh)) !== false) {
                // Check if it's a file and not a directory or special file
                if (is_file($imageDir . '/' . $file) && $file != '.' && $file != '..') {
                    // Delete the file
                    unlink($imageDir . '/' . $file);
                }
            }
            // Close the directory
            closedir($dh);

            // After deleting images, you can delete the records from the database
            $deleteImages = "DELETE FROM client_album WHERE client_id = '$clientID'";
            $runDelete = mysqli_query($conn, $deleteImages);

            if ($runDelete) {
                // Successfully deleted images and database records
                $_SESSION['success'] = "Client Photos Deleted Successfully";
                echo "<script> window.location.href='manage_album.php' </script>";
                die();
            } else {
                $_SESSION['error'] = "Failed to delete images. Please try again.";
                echo "<script> window.location.href='manage_album.php' </script>";
                die();
            }
        }
    } else {
        // The directory doesn't exist
        $_SESSION['error'] = "Image directory not found: $imageDir";
        echo "<script> window.location.href='manage_album.php' </script>";
        die();
    }
}

?>


<?php
require 'includes/footer.php';
?>