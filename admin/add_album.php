<?php
require 'includes/sidebar.php';
require 'includes/config.php';
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add New Album</h1>
</div>

<?php

$C_ID = $_GET['c_id'];

$sql = "SELECT * FROM client_login WHERE client_id = '$C_ID'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);

if (isset($_POST['add_album'])) {
    $client_id = $_POST['client_id'];

    // Loop through the uploaded files
    foreach ($_FILES['images']['name'] as $key => $filename) {
        $tmp_name = $_FILES['images']['tmp_name'][$key];
        $size = $_FILES['images']['size'][$key];
        $image_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $allow_type = ['jpg', 'png', 'jpeg'];

        // Check if the file type is allowed
        if (in_array($image_ext, $allow_type)) {
            $destination = "upload/" . $filename;

            if (move_uploaded_file($tmp_name, $destination)) {
                // Insert each file into the database
                $sql = "INSERT INTO client_album (client_id, images) VALUES ('$client_id', '$filename')";
                $query = mysqli_query($conn, $sql);

                if (!$query) {
                    $_SESSION['error'] = "Failed, Please try again";
                    echo "<script> window.location.href='add_album.php' </script>";
                    die();
                }
            } else {
                $_SESSION['error'] = "Failed to move the uploaded file";
                echo "<script> window.location.href='add_album.php' </script>";
                die();
            }
        } else {
            $_SESSION['error'] = "File type is not allowed (Only jpg, png, and jpeg)";
            echo "<script> window.location.href='add_album.php' </script>";
            die();
        }
    }
    $_SESSION['success'] = "Photos Added Successfully";
    echo "<script> window.location.href='manage_album.php' </script>";
    die();
}
?>

<div class="row">
    <div class="col-lg-12">
        <!-- Form Basic -->
        <div class="card">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <label for="fullname" class="form-label"> Full Name </label>
                            <input type="text" name="name" id="fullname" value="<?= $result['name'] ?>" class="form-control" disabled>
                        </div>

                        <div class="col-md-8">
                            <label for="formFileMultiple" class="form-label">Upload Files</label>
                            <input class="form-control" type="file" name="images[]" id="formFileMultiple" multiple>
                        </div>

                        <div class="col-1 mt-4">
                            <input type="hidden" value="<?= $result['client_id'] ?>" name="client_id">
                            <input type="submit" value="Add Album" name="add_album" class="btn btn-success mb-3">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
require 'includes/footer.php';
?>