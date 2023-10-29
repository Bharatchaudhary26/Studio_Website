<?php
require 'includes/sidebar.php';
require 'includes/config.php';
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add New Client</h1>
</div>

<?php
if (isset($_POST['add_client'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `client_login`(`name`, `username`, `password`) VALUES ('$name','$username','$password')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $_SESSION['success'] = "Client Added Successfully";
        echo "<script> window.location.href='add_user.php' </script>";
        die();
    } else {
        $_SESSION['error'] = "Failed, Please try again";
        echo "<script> window.location.href='add_user.php' </script>";
        die();
    }
}
?>

<div class="row">
    <div class="col-lg-12">
        <!-- Form Basic -->
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <label for="fullname" class="form-label"> Full Name </label>
                            <input type="text" name="name" id="fullname" class="form-control" placeholder="Enter Fullname" required>
                        </div>
                        <div class="col-md-4">
                            <label for="Username" class="form-label"> Username </label>
                            <input type="text" name="username" id="Username" class="form-control" placeholder="Enter Username" required>
                        </div>
                        <div class="col-md-4">
                            <label for="password" class="form-label"> Password </label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
                        </div>

                        <div class="col-1 mt-4">
                            <input type="submit" value="Add Client" name="add_client" class="btn btn-success mb-3">
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