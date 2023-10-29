<?php
require 'navbar.php';
require 'config.php';
?>

<main class="main_section">
    <div class="row g-0" id="Home">
        <div class="col-md-7 left_section">
            <h1>We capture your <samp>Memories</samp> anywhere</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta, rem officiis voluptatum consequuntur, iste praesentium voluptatem, pariatur officia blanditiis reiciendis rerum quidem! Dolore esse similique rem ducimus necessitatibus reprehenderit officia. Enim, saepe. Neque, voluptas recusandae?</p>
            <div class="button d-flex">
                <a href="#Talk_sec">Let's Talk <i class="bi bi-arrow-right ml-2"></i></a>
                <a href="demo_album.php"> Preview Album </a>
            </div>
        </div>
        <div class="col-md-5 right_section">
            <img src="images/home.png" alt="photographer">
            <hr>
        </div>
    </div>
</main>

<main class="service_section">
    <div class="searvice" id="Services">
        <div class="row g-0 service_content">
            <div class="col-md-5 ser_img">
                <img src="images/photoshoot.svg" alt="photographer">
            </div>
            <div class="col-md-7">
                <div class="searvice_title">
                    <h2> OUR SERVICES </h2>
                    <span class="shape"></span>
                </div>
                <div class="row g-0">
                    <div class="col-md-6 service_text">
                        <p>✓ Photography</p>
                        <p>✓ Candid Photography</p>
                        <p>✓ Pre Wedding Shoot</p>
                        <p>✓ Wedding Shoot</p>
                        <p>✓ Child Photo Shoot</p>
                        <p>✓ Advertising Photography</p>
                        <p>✓ Documentary Photography</p>
                        <p>✓ Portfolio-Shoot</p>
                    </div>
                    <div class="col-md-6 service_text">
                        <p>✓ Catalog Shoot</p>
                        <p>✓ Cinematography</p>
                        <p>✓ VFX Process</p>
                        <p>✓ Video Editing</p>
                        <p>✓ Post Production Studio</p>
                        <p>✓ Portrait Photography</p>
                        <p>✓ Event Photography</p>
                        <p>✓ Product Photography</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="grid">
                <div class="box">
                    <div class="box_icon">
                        <i class="bi bi-camera-fill"></i>
                    </div>
                    <div class="box_text">
                        <h4>Photography</h4>
                        <p>Photography is the art, application and practice of creating durable images...</p>
                    </div>
                </div>
                <div class="box">
                    <div class="box_icon">
                        <i class="bi bi-image-fill"></i>
                    </div>
                    <div class="box_text">
                        <h4>Pre Wedding Shoot</h4>
                        <p>A pre-wedding shoot is a perfect way to capture your love for each other...</p>
                    </div>
                </div>
                <div class="box">
                    <div class="box_icon">
                        <i class="bi bi-play-btn-fill"></i>
                    </div>
                    <div class="box_text">
                        <h4>Wedding Shoot</h4>
                        <p>A wedding shoot is a perfect way to capture your love for each other...</p>
                    </div>
                </div>
                <div class="box">
                    <div class="box_icon">
                        <i class="bi bi-person-heart"></i>
                    </div>
                    <div class="box_text">
                        <h4>Child Photo Shoot</h4>
                        <p>Child photography is the perfect way to capture major moments at early...</p>
                    </div>
                </div>
                <div class="box">
                    <div class="box_icon">
                        <i class="bi bi-camera-fill"></i>
                    </div>
                    <div class="box_text">
                        <h4>Cinematography</h4>
                        <p>Cinematography is the science or art of motion-picture photography and...</p>
                    </div>
                </div>
                <div class="box">
                    <div class="box_icon">
                        <i class="bi bi-person-bounding-box"></i>
                    </div>
                    <div class="box_text">
                        <h4>Portrait Photography</h4>
                        <p>Showcasing individuals, emphasizing expressions, and personal character in...</p>
                    </div>
                </div>
                <div class="box">
                    <div class="box_icon">
                        <i class="bi bi-suitcase-lg-fill"></i>
                    </div>
                    <div class="box_text">
                        <h4>Event Photography</h4>
                        <p>Capturing significant occasions, memories in event photography...</p>
                    </div>
                </div>
                <div class="box">
                    <div class="box_icon">
                        <i class="bi bi-megaphone-fill"></i>
                    </div>
                    <div class="box_text">
                        <h4>Product Photography</h4>
                        <p>Marketing and advertising, visually appealing product images.</p>
                    </div>
                </div>
                <div class="box">
                    <div class="box_icon">
                        <i class="bi bi-person-standing"></i>
                    </div>
                    <div class="box_text">
                        <h4>Portfolio-Shoot</h4>
                        <p>Portfolio means model photography. Portfolio is an edited collection...</p>
                    </div>
                </div>
            </div> -->
    </div>

    <?php
    if (isset($_POST['send_message'])) {
        echo $Name = $_POST['name'];
        echo $Number = $_POST['number'];
        echo $Message = $_POST['message'];

        $talk = "INSERT INTO  talk_message (`name`, `number`, `message`) VALUES ('$Name','$Number','$Message')";
        $talk_query = mysqli_query($conn, $talk);

        if ($talk_query) {
            $_SESSION['success'] = "Message Send Successfully";
            echo "<script> window.location.href='index.php' </script>";
            die();
        } else {
            $_SESSION['error'] = "Failed, Please try again";
            echo "<script> window.location.href='index.php' </script>";
            die();
        }
    }
    ?>

    <div class="talk_section" id="Talk_sec">
        <div class="talk_box">
            <div class="talk_content">
                <div class="talk_title">
                    <h2> Let's Talk </h2>
                    <span class="talk_shape"></span>
                </div>
                <form action="" method="POST">
                    <div class="row talK_form">
                        <div class="col-md-6 mt-2">
                            <label for="fullname" class="form-label"> Your Name </label>
                            <input type="text" name="name" id="fullname" class="form-control" placeholder="Enter Your Name" required>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="number" class="form-label"> Phone Number </label>
                            <input type="number" name="number" id="number" class="form-control" placeholder="Enter Number" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="message" class="form-label">Your Message</label>
                            <textarea class="form-control" name="message" id="message" rows="3" placeholder="Enter Your Message"></textarea>
                        </div>

                        <div class="col-md-12 d-flex justify-content-center mt-4">
                            <button type="submit" name="send_message" class="btn btn-warning"> Send Message </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="testimonial_section">
        <div class="testimonials-clean">
            <div class="container">
                <div class="intro">
                    <h2 class="text-center">Testimonials </h2>
                    <span class="testimonial_shape"></span>
                    <p class="text-center">Our customers love us! Read what they have to say below. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae.</p>
                </div>
                <div class="row people">
                    <div class="col-md-6 col-lg-4 item">
                        <div class="box">
                            <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est.</p>
                        </div>
                        <div class="author"><img class="rounded-circle" src="images/photographer.jpg">
                            <h5 class="name">Ben Johnson</h5>
                            <p class="title">CEO of Company Inc.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 item">
                        <div class="box">
                            <p class="description">Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, et interdum justo suscipit id. Praesent aliquam in.</p>
                        </div>
                        <div class="author"><img class="rounded-circle" src="images/photographer.jpg">
                            <h5 class="name">Carl Kent</h5>
                            <p class="title">Founder of Style Co.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 item">
                        <div class="box">
                            <p class="description">Aliquam varius finibus est, et interdum justo suscipit. Vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in.</p>
                        </div>
                        <div class="author"><img class="rounded-circle" src="images/man-photographing.jpg">
                            <h5 class="name">Emily Clark</h5>
                            <p class="title">Owner of Creative Ltd.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php
if (isset($_POST['send_now'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $vanue_city = $_POST['vanue_city'];
    $budget = $_POST['budget'];
    $event_type = $_POST['event_type'];
    $all_event = implode(", ", $event_type);
    // echo $all_event;
    $message = $_POST['message'];


    $book = "INSERT INTO `booking`(`name`, `number`, `vanue_city`, `budget`, `event_type`, `message`) VALUES ('$name','$number','$vanue_city','$budget','$all_event','$message')";
    $book_query = mysqli_query($conn, $book);

    if ($book_query) {
        $_SESSION['success'] = "Thank you for booking and we will contact you soon";
        echo "<script> window.location.href='index.php' </script>";
        die();
    } else {
        $_SESSION['error'] = "Failed, Please try again";
        echo "<script> window.location.href='index.php' </script>";
        die();
    }
}
?>

<main class="book_section">
    <div class="book">
        <div class="book_title">
            <h2>Book Us Know</h2>
            <span class="testimonial_shape"></span>
        </div>
        <div class="sub_title">
            <h3>Tell Us About Your Plan</h3>
        </div>
        <form action="" method="POST">
            <div class="row">
                <div class="col-md-3 mt-2">
                    <label for="fullname" class="form-label"> Your Name </label>
                    <input type="text" name="name" id="fullname" class="form-control" placeholder="Enter Your Name" required>
                </div>
                <div class="col-md-3 mt-2">
                    <label for="number" class="form-label"> Phone Number </label>
                    <input type="number" name="number" id="number" class="form-control" placeholder="Enter Your Number" required>
                </div>
                <div class="col-md-3 mt-2">
                    <label for="vanue" class="form-label"> City Of Vanue </label>
                    <input type="text" name="vanue_city" id="vanue" class="form-control" placeholder="Enter City Of Vanue" required>
                </div>
                <div class="col-md-3 mt-2">
                    <label for="budget" class="form-label"> Tentative Budget </label>
                    <input type="number" name="budget" id="budget" class="form-control" placeholder="Enter Tentative Budget" required>
                </div>
                <div class="col-md-3 mt-2">
                    <label for="budget" style="font-weight: bold;"> Event Type </label>
                    <div>
                        <div><input type="checkbox" name="event_type[]" value="Photography"> Photography </div>
                        <div><input type="checkbox" name="event_type[]" value="Wedding Shoot"> Wedding Shoot </div>
                        <div><input type="checkbox" name="event_type[]" value="Pre Wedding Shoot"> Pre Wedding Shoot </div>
                        <div><input type="checkbox" name="event_type[]" value="Advertising Photography"> Advertising Photography </div>
                        <div><input type="checkbox" name="event_type[]" value="Event Photography"> Event Photography </div>
                    </div>
                </div>

                <div class="col-md-9 mt-2">
                    <label for="message" class="form-label"> Any other information that you wish to share </label>
                    <textarea class="form-control" name="message" id="message" rows="5" placeholder="Enter Your Message"></textarea>
                </div>

                <div class="col-md-12 d-flex justify-content-center mt-4 mb-4">
                    <button type="submit" name="send_now" class="btn btn-success"> Send Now </button>
                </div>
            </div>
        </form>
    </div>
</main>

<?php require 'footer.php' ?>