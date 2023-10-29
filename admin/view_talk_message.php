<?php
require 'includes/sidebar.php';
require 'includes/config.php';
?>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h2 class=""> View All Talk Message </h2>
    <!-- <a href="add_album.php" class="btn btn-success"> Add Client Album </a> -->
</div>

<?php
$sql = "SELECT * FROM talk_message";
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
                            <th>Name</th>
                            <th>Number</th>
                            <th>Message</th>
                            <th>Status</th>
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
                                    <td><?= $result['number'] ?></td>
                                    <td><?= $result['message'] ?></td>
                                    <td><?= $result['status'] ?></td>
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
require 'includes/footer.php';
?>