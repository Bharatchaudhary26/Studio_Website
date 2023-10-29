<footer>
    <div class="footer-basic">
        <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
        <!-- <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Home</a></li>
                <li class="list-inline-item"><a href="#">Services</a></li>
                <li class="list-inline-item"><a href="#">About</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
            </ul> -->
        <p class="copyright">Copyright © 2023-2024 Arkane studio. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- alert message JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>



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

</body>

</html>