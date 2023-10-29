</div>
<!---Container Fluid-->
</div>
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container d-flex justify-content-between my-auto">
        <div class="copyright text-center my-auto">
            <span>copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> <span> Saraswati School Of Nursing. All rights reserved. </span>
            </span>
        </div>
        <div class="copyright text-center my-auto">
            developed by :
            <b><a href="" target="_blank"> Bharat Chaudhary </a></b>
            </span>
        </div>
    </div>

    <!-- <div class="container my-auto py-2">
        <div class="copyright text-center my-auto">
            <span>copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> - distributed by
                <b><a href="https://themewagon.com/" target="_blank">themewagon</a></b>
            </span>
        </div>
    </div> -->
</footer>
<!-- Footer -->
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- bootstrap Js  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- alert message JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable(); // ID From dataTable 
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
</script>

<?php
// this is a success message 
if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
?>
    <script>
        alertify.set('notifier', 'position', 'top-right');
        alertify.success('<?= $_SESSION['success'] ?>');
    </script>
<?php
    unset($_SESSION['success']);
}

// this is a error message 
if (isset($_SESSION['error']) && $_SESSION['error'] != '') {
?>
    <script>
        alertify.set('notifier', 'position', 'top-right');
        alertify.error('<?= $_SESSION['error'] ?>');
    </script>
<?php
    unset($_SESSION['error']);
}
?>

<script>
    // Initialize Bootstrap tooltips
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<script src="js/ruang-admin.min.js"></script>
<!-- <script src="vendor/chart.js/Chart.min.js"></script>
<script src="js/demo/chart-area-demo.js"></script> -->
</body>

</html>