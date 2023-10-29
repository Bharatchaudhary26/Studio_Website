<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logo.png" rel="icon">
    <title>ADMIN - LOGIN</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>

<style>
    #error-message {
        color: red;
    }
</style>

<script>
    // user can not back 
    function preventBack() {
        window.history.forward()
    };
    setTimeout("preventBack()", 0);
    window.onload = function() {
        null;
    }
</script>

<?php include 'includes/config.php'; ?>

<?php
// Start the PHP session
session_start();

// Check if the form has been submitted
if (isset($_POST['login-btn'])) {
    // Get the input from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to check if the username and password match
    $sql = "SELECT * FROM admin_profile WHERE binary username = '$username' AND binary password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login successful
        $row = $result->fetch_assoc();

        // Store the user's ID or username in a session variable
        $_SESSION['admin_ID'] = $row['admin_ID']; // Change this to 'username' if you want to store the username
        $_SESSION['username'] = $row['username']; // Change this to 'username' if you want to store the username
        $_SESSION['name'] = $row['name']; // Change this to 'username' if you want to store the username

        // Redirect to a protected page or wherever you want to go after login
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid username OR password";
    }
}
?>


<body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="username" placeholder="Enter Your Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" placeholder="Enter Your Password" required>
                                        </div>
                                        <div class="form-group">
                                            <div id="error-message">
                                                <?php
                                                if (isset($error)) {
                                                    echo $error;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Login" name="login-btn" class="btn btn-primary btn-block">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>
</body>

</html>