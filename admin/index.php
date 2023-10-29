<?php
include 'includes/sidebar.php';
include 'includes/config.php';
?>

<!-- fetch total student -->
<?php
$client = "SELECT * FROM client_login";
$client_query = mysqli_query($conn, $client);
$client_row = mysqli_num_rows($client_query);
?>

<!-- fetch total professor -->
<?php
$talk_message = "SELECT * FROM talk_message";
$talk_message_query = mysqli_query($conn, $talk_message);
$talk_message_row = mysqli_num_rows($talk_message_query);
?>

<!-- fetch total Courses -->
<?php
$booking = "SELECT * FROM booking";
$booking_query = mysqli_query($conn, $booking);
$booking_row = mysqli_num_rows($booking_query);
?>

<div class="row mb-3">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Total Create User</div>
                        <div class="h5 mb-0 mt-2 font-weight-bold text-gray-800"><?= $client_row ?> </div>
                        <!-- <div class="mt-2 mb-0 text-muted text-xs">
                            <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                            <span>Since last years</span>
                        </div> -->
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-person-fill-check fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Total Talk Message</div>
                        <div class="h5 mb-0 mr-3 mt-2 font-weight-bold text-gray-800"> <?= $talk_message_row ?> </div>
                        <!-- <div class="mt-2 mb-0 text-muted text-xs">
                            <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                            <span>Since last month</span>
                        </div> -->
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-envelope-plus-fill fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Booking Order</div>
                        <div class="h5 mb-0 mr-3 mt-2 font-weight-bold text-gray-800"> <?= $booking_row ?> </div>
                        <!-- <div class="mt-2 mb-0 text-muted text-xs">
                            <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                            <span>Since yesterday</span>
                        </div> -->
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-check-circle fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Show enquiry data  -->
<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">New Booking Order</h6>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Name</th>
                            <th>Number</th>
                            <th>City</th>
                            <th>Budget</th>
                            <th>Event Type</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // <!-- display all student data  -->
                        $book = "SELECT * FROM booking WHERE status = 'Pendding'";
                        $book_query = mysqli_query($conn, $book);
                        $book_row = mysqli_num_rows($book_query);
                        $count = 1;

                        if ($book_row) {
                            while ($book_result = mysqli_fetch_assoc($book_query)) {
                        ?>
                                <tr>
                                    <td> <?= $count++ ?> </td>
                                    <td><?= $book_result['name'] ?></td>
                                    <td> <?= $book_result['number'] ?> </td>
                                    <td> <?= $book_result['vanue_city'] ?> </td>
                                    <td> <?= $book_result['budget'] ?> </td>
                                    <td> <?= $book_result['event_type'] ?> </td>
                                    <td> <?= $book_result['message'] ?> </td>
                                    <td class="align-center">
                                        <form method="POST">
                                            <!-- <input type="submit" value="Success" name="Enquiry_status" class="btn btn-sm btn-success"> -->
                                            <button type="submit" class="btn btn-success mr-1" name="Booking_status"> ✓ </button>
                                            <input type="hidden" value="Success" name="status">
                                            <button type="submit" class="btn btn-warning" name="Booking_status_not"> ╳ </button>
                                            <input type="hidden" value="Not_Connect" name="status1">
                                            <input type="hidden" value="<?= $book_result['book_id'] ?>" name="book_id">
                                        </form>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr class="text-center">
                                <td colspan="8">No Record Found</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- <div class="card-footer"></div> -->
        </div>
    </div>
</div>
<!--Row-->

<!--Enquiry message update Query  -->
<?php
if (isset($_POST['Booking_status'])) {
    $status = $_POST['status'];
    $booking_id = $_POST['book_id'];

    $book_update = "UPDATE booking SET status = '$status' WHERE book_id = '$booking_id'";
    $book_update_query = mysqli_query($conn, $book_update);

    if ($book_update_query) {
        $_SESSION['success'] = "Success";
        echo "<script> window.location.href='index.php' </script>";
        die();
    } else {
        $_SESSION['error'] = "Failed, Please try again";
        echo "<script> window.location.href='index.php' </script>";
        die();
    }
}
?>

<?php
if (isset($_POST['Booking_status_not'])) {
    $status = $_POST['status1'];
    $booking_id = $_POST['book_id'];

    $book_update = "UPDATE booking SET status = '$status' WHERE book_id = '$booking_id'";
    $book_update_query = mysqli_query($conn, $book_update);

    if ($book_update_query) {
        $_SESSION['success'] = "Not Connect, Please Call Tomorrow";
        echo "<script> window.location.href='index.php' </script>";
        die();
    } else {
        $_SESSION['error'] = "Failed, Please try again";
        echo "<script> window.location.href='index.php' </script>";
        die();
    }
}
?>

<!-- Show admission data  -->
<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">New Let's Talk Message</h6>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Name</th>
                            <th>Number</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // <!-- display all student data  -->
                        $talk = "SELECT * FROM talk_message WHERE status = 'Pendding'";
                        $talk_query = mysqli_query($conn, $talk);
                        $talk_row = mysqli_num_rows($talk_query);
                        $count = 1;

                        if ($talk_row) {
                            while ($talk_result = mysqli_fetch_assoc($talk_query)) {
                        ?>
                                <tr>
                                    <td> <?= $count++ ?> </td>
                                    <td> <?= $talk_result['name'] ?> </td>
                                    <td> <?= $talk_result['number'] ?> </td>
                                    <td> <?= $talk_result['message'] ?> </td>
                                    <td class="align-center">
                                        <form method="POST" class="d-flex">
                                            <!-- <input type="submit" value="Success" name="admission_status" class="btn btn-sm btn-success mr-1"> -->
                                            <button type="submit" class="btn btn-success mr-1" name="talk_status"> ✓ </button>
                                            <input type="hidden" value="Success" name="status">
                                            <button type="submit" class="btn btn-warning" name="talk_status1"> ╳ </button>
                                            <input type="hidden" value="Not_Connect" name="status1">
                                            <input type="hidden" value="<?= $talk_result['talk_id'] ?>" name="talk_id">
                                        </form>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr class="text-center">
                                <td colspan="7">No Record Found</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- <div class="card-footer"></div> -->
        </div>
    </div>
</div>
<!--Row-->

<!-- Admission update Query  -->
<?php
if (isset($_POST['talk_status'])) {
    $status = $_POST['status'];
    $talk_id = $_POST['talk_id'];

    $talk_update = "UPDATE talk_message SET status = '$status' WHERE talk_id = '$talk_id'";
    $talk_update_query = mysqli_query($conn, $talk_update);

    if ($talk_update_query) {
        $_SESSION['success'] = "Success";
        echo "<script> window.location.href='index.php' </script>";
        die();
        // header("location:index.php");
    } else {
        $_SESSION['error'] = "Failed, Please try again";
        echo "<script> window.location.href='index.php' </script>";
        die();
        // header("location:index.php");
    }
}
?>

<?php
if (isset($_POST['talk_status1'])) {
    $status = $_POST['status1'];
    $talk_id = $_POST['talk_id'];

    $talk_update = "UPDATE talk_message SET status = '$status' WHERE talk_id = '$talk_id'";
    $talk_update_query = mysqli_query($conn, $talk_update);

    if ($talk_update_query) {
        $_SESSION['success'] = "Not Connect, Please Call Tomorrow";
        echo "<script> window.location.href='index.php' </script>";
        die();
        // header("location:index.php");
    } else {
        $_SESSION['error'] = "Failed, Please try again";
        echo "<script> window.location.href='index.php' </script>";
        die();
        // header("location:index.php");
    }
}
?>

<!-- Not connected data -->
<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"> Not connected Users </h6>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Number</th>
                            <th>City</th>
                            <th>Budget</th>
                            <th>Event</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch data from talk message table
                        $talk = "SELECT * FROM talk_message WHERE status = 'Not_Connect'";
                        $talk_query = mysqli_query($conn, $talk);

                        // Fetch data from booking table
                        $book = "SELECT * FROM booking WHERE status = 'Not_Connect'";
                        $book_query = mysqli_query($conn, $book);

                        $data = array();

                        while ($talk_result = mysqli_fetch_assoc($talk_query)) {
                            $data[] = array(
                                'Database' => 'talk_message',
                                'type' => 'Lets Talk',
                                'name' => $talk_result['name'],
                                'number' => $talk_result['number'],
                                'message' => $talk_result['message'],
                                'id' => $talk_result['talk_id'],
                            );
                        }

                        while ($book_result = mysqli_fetch_assoc($book_query)) {
                            $data[] = array(
                                'Database' => 'booking',
                                'type' => 'Booking',
                                'name' => $book_result['name'],
                                'number' => $book_result['number'],
                                'vanue_city' => $book_result['vanue_city'],
                                'budget' => $book_result['budget'],
                                'event' => $book_result['event_type'],
                                'message' => $book_result['message'],
                                'id' => $book_result['book_id'],
                            );
                        }

                        $count = 1;

                        foreach ($data as $item) {
                        ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $item['type']; ?></td>
                                <td><?php echo $item['name']; ?></td>
                                <td><?php echo $item['number']; ?></td>
                                <td><?php echo isset($item['vanue_city']) ? $item['vanue_city'] : ''; ?></td>
                                <td><?php echo isset($item['budget']) ? $item['budget'] : ''; ?></td>
                                <td><?php echo isset($item['event']) ? $item['event'] : ''; ?></td>
                                <td><?php echo isset($item['message']) ? $item['message'] : ''; ?></td>
                                <td class="align-center">
                                    <form method="POST" class="d-flex">
                                        <button type="submit" class="btn btn-success mr-1" name="status">✓</button>
                                        <input type="hidden" value="Success" name="status">
                                        <input type="hidden" value="<?php echo $item['id']; ?>" name="id">
                                        <input type="hidden" value="<?php echo $item['Database']; ?>" name="table">
                                    </form>
                                </td>
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
if (isset($_POST['status'])) {
    $status = $_POST['status'];
    $id = $_POST['id'];
    $table = $_POST['table'];

    // Define an associative array that maps 'Database' values to their respective id columns
    $idColumns = [
        'talk_message' => 'talk_id', // Replace with the actual id column name for 'talk_message'
        'booking' => 'book_id' // Replace with the actual id column name for 'booking'
    ];

    // Check if the 'Database' value exists in the array to get the corresponding id column
    if (array_key_exists($table, $idColumns)) {
        $idColumn = $idColumns[$table];

        // Use prepared statements to prevent SQL injection
        $stmt = mysqli_prepare($conn, "UPDATE $table SET status = ? WHERE $idColumn = ?");
        mysqli_stmt_bind_param($stmt, "si", $status, $id);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['success'] = "Success";
            echo "<script> window.location.href='index.php' </script>";
            die();
        } else {
            $_SESSION['error'] = "Failed, Please try again";
            echo "<script> window.location.href='index.php' </script>";
            die();
        }
    } else {
        // Handle the case where 'Database' value doesn't match any known table
        $_SESSION['error'] = "Invalid table specified";
        header("Location: index.php");
        exit();
    }
}
?>



<?php include 'includes/footer.php'; ?>