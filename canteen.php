<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DR.D.Y PATIL INSTITUTE OF TECHNOLOGY</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">


<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="home.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary" style="font-size:16px"><i class="fa fa-book me-3"></i>DR.D.Y PATIL INSTITUTE OF TECHNOLOGY</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="home.php" class="nav-item nav-link">Home</a>
                <a href="about.php" class="nav-item nav-link ">About</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">E-content</a>
                    <div class="dropdown-menu fade-down m-0">

                        <a href="CE.php" class="dropdown-item">Civil Engineering</a>
                        <a href="CO.php" class="dropdown-item">Computer Engineering</a>
                        <a href="IT.php" class="dropdown-item">Information Technology</a>
                        <a href="AIDS.php" class="dropdown-item">Artificial Intelligence and Data Science</a>
                        <a href="AIR.php" class="dropdown-item">Artificial Intelligence And Robotics</a>
                        <a href="EE.php" class="dropdown-item">Electrical Engineering</a>
                        <a href="ETC.php" class="dropdown-item">Electronics and Telecommunication</a>
                        <a href="ME.php" class="dropdown-item">Mechanical Engineering</a>
                        <a href="IS.php" class="dropdown-item">Instrumentation Engineering</a>
                    </div>
                </div>
                <a href="canteen.php" class="nav-item nav-link active">Canteen</a>
                <a href="contact.php" class="nav-item nav-link">Contact</a>

            </div>
            <a href="Attendance/index.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Login<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Header Start -->
    
<div class="container-fluid bg-primary py-5 mb-5 page-header" style="background-image: url('img/canteen.jpg'); background-size: cover; background-position: center;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Canteen</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="home.php">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Canteen</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

    <!-- Header End -->


  <!-- Service Start -->
<form action="menu.php" method="post" class="mt-5" id="orderForm">
    <div class="row g-3 justify-content-center text-center">
        <div class="col-md-4">
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" required>
        </div>
        <div class="col-md-4">
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number" required>
        </div>
        <div class="col-md-8">
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Food Description" required></textarea>
        </div>
        <div class="col-12">
            <!-- Align the button with the form -->
            <button type="submit" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft" id="submitButton" disabled>Order Food</button>
        </div>
    </div>
</form>

<script>
    // JavaScript to enable button after form is filled
    document.addEventListener('input', function () {
        var name = document.getElementById('name').value.trim();
        var phone = document.getElementById('phone').value.trim();
        var description = document.getElementById('description').value.trim();
        
        // Check if all fields are filled
        if (name !== "" && phone !== "" && description !== "") {
            document.getElementById('submitButton').disabled = false; // Enable button
        } else {
            document.getElementById('submitButton').disabled = true; // Disable button
        }
    });
</script>


<!-- Service End -->

    

    <!-- Footer Start -->
    <form method="post">
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3">Quick Link</h4>
                        <a class="btn btn-link" href="about.php">About Us</a>
                        <a class="btn btn-link" href="contact.php">Contact Us</a>
                        <a class="btn btn-link" href="study.php">E-content</a>
                        <a class="btn btn-link" href="about.php">FAQs & Help</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3">Contact</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Main Campus, Sant Tukaram Nagar, Pimpri, Pune</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91 7767015942</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@dypatil.edu admissions@dypatil.edu</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3">Our College</h4>
                        <div class="row g-2 pt-2">
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="college1.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="college4.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="college3.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="college7.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="college5.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="college6.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3">Share Your feedback</h4>
                        <p>We appreciate your valuable time.</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your feedback">
                            <button type="submit" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid copyright py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="home.php">DR.D.Y PATIL INSTITUTE OF TECHNOLOGY</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">DR.D.Y PATIL Students</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
