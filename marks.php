 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>OM SAI PRATISHTHAN COLLEGE OF PHARMACY</title>
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
</head>

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
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary" style="font-size: 16PX;"><i class="fa fa-book me-3"></i>OM SAI PRATISHTHAN COLLEGE OF PHARMACY </h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.html" class="nav-item nav-link">Home</a>
                <a href="about.html" class="nav-item nav-link">About</a>
                <a href="courses.html" class="nav-item nav-link">Courses</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Download</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="syllabus.pdf" class="dropdown-item">Syllabus</a>
                        <a href="study.html" class="dropdown-item">Study Material</a>
                       
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link active">Contact</a>
            </div>
            <a href="" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Login<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Marks Evaluation</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Marks Evaluation</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- marks Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Marks Evaluation</h6>
                <h1 class="mb-5">Enter marks below:</h1> 
    <style>
        .body1 {
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
            line-height: 1.8;
            min-height: 100vh;
            background: #fff;
           color: #06BBCC;
            flex-direction: column;
        }

        /* Main container styling */
        .main1 {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 20px;
            transition: transform 0.2s;
            width: 600px;
        }

    </style>
    <center>
    <div class="main1">
        <div class="body1">
        <form method="post">
            <p>
                <label style="font-size: 19px;"> Enter Name :<br>
                    <input type="text" name="name" required></label>
            </p>
            <p>
                <label style="font-size: 19px;">Enter Roll-No :<br>
                    <input type="number" name="roll" required  /></label>
            </p>
             <p>
                <label style="font-size: 19px;">Select Year :<br>
                    <select name="year" onchange="fun(this.value)">
                         <option >Select Year of D.pharmacy</option>
                        <option value="1">1st Year</option>
                         <option value="2">2nd Year</option>
                    </select></label>
            </p>
            <p>
                <label style="font-size: 19px;">Select Subject :<br>
                      <select name="subject">
                    </select></label>
            </p>
            <p>
                <label style="font-size: 19px;">Marks of Unit Test1(Out of 20) :<br>
                    <input type="number" name="ut1" required/></label>
            </p>
              <p>
                <label style="font-size: 19px;">Marks of Unit Test2(Out of 20):<br>
                    <input type="number" name="ut2" required /></label>
            </p>
              <p>
                <label style="font-size: 19px;">Marks of Assignment(Out of 5):<br>
                    <input type="number" name="ass" required /></label>
            </p>
             <p>
                <label style="font-size: 19px;">Marks of Field Visit Report(Out of 5):<br>
                    <input type="number" name="report" required /></label>
            </p>
              <p>
                <label style="font-size: 19px;">Average Marks of Practicals(Out of 50):<br>
                    <input type="text" name="pr" required/></label>
            </p>
              <p>
                <label style="font-size: 19px;">Percentage of Attendence :<br>
                    <input type="text" name="per" readonly /></label>
            </p>
              <p>
                <label style="font-size: 19px;">Internal Marks(Out of 20) :<br>
                    <input type="text" name="pa"  /></label>
            </p><br>

            <p>
                <input type="submit" value="Finish" name="su" / style="background-color: #06BBCC;color: floralwhite;border: 0px; width: 150px;height: 50px;">
            </p>

        </form>
    </div>
</div>
    </div>
    
</center>
</div>
</div>
</div>
</div>



    <!-- marks End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="about.html">About Us</a>
                    <a class="btn btn-link" href="contact.html">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">FAQs & Help</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Shirke Wasti,Ralegan Therpal-Pimpalner Road,A/P- Pimpalner, Tal– Parner,Dist.– Ahmednagar Pin code- 414302</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91 9404696600</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@omsaipratishthan.com admin@omsaipratishthan.com</p>
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
                            <img class="img-fluid bg-light p-1" src="college2.jpg" alt="">
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
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your Comment">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2"onclick="alert('Thank you for feedback')">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Copyright 2024 |</a> All Right Reserved.

                    </a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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




    <!--made by kesar-->
     <!--javascript used in above code-->
    <script>
  
    function fun(val) {
        var y1 = ["Pharmaceutics", "Pharmaceutical Chemistry", "Pharmacognosy", "Human Anatomy & Physiology", "Social Pharmacy"];
        var y2 = ["Pharmacology", "Community Pharmacy & Management", "Biochemistry & Clinical Pathology", 
            "Pharmacotherapeutics", "Hospital & Clinical Pharmacy", "Pharmacy Law & Ethics"];
        var s2 = document.getElementsByName("subject")[0];

        // Clear existing options
        s2.innerHTML = '';

        var subjects;

        if (val == "1") {
            subjects = y1;
        } else if (val == "2") {
            subjects = y2;
        }

        for (var i = 0; i < subjects.length; i++) {
            var option = document.createElement("option");
            option.value = subjects[i];
            option.text = subjects[i];
            s2.add(option);
        }
    }
</script>
    <script>
            function fetchData() {
            var rollNo = document.getElementsByName("roll")[0].value;

            // AJAX request to fetch dateTimeTaken
            $.ajax({
                url: 'marks.php',  // Replace with your PHP script to fetch dateTimeTaken
                type: 'POST',
                data: { roll: rollNo },
                success: function (response) {
                    // Assuming response contains dateTimeTaken
                    var dateTimeTaken = response.trim();

                    // Calculate avgper
                    var count = dateTimeTaken ? 1 : 0;
                    var avgper = count / 60;

                    // Set avgper to the Average Percentage textbox
                    document.getElementsByName("per")[0].value = avgper.toFixed(2);
                }
            });

        }
           document.getElementsByName("roll")[0].addEventListener("blur", fetchData);
    </script>
  <script type="text/javascript">
    function fetch() {
        var ut1 = parseFloat(document.getElementsByName("ut1")[0].value) || 0;
        var ut2 = parseFloat(document.getElementsByName("ut2")[0].value) || 0;
        var ass = parseFloat(document.getElementsByName("ass")[0].value) || 0;
        var report = parseFloat(document.getElementsByName("report")[0].value) || 0;

        var mrk = (ut1 + ut2) / 2;
        var finalmrk = mrk + ass + report;

        document.getElementsByName("pa")[0].value = finalmrk.toFixed(2);
    }

    document.getElementsByName("report")[0].addEventListener("blur", fetch);
</script>

<?php
if (isset($_POST['su'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "digicampus";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $roll = mysqli_real_escape_string($conn, $_POST['roll']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $sub = mysqli_real_escape_string($conn, $_POST['subject']);
    $ut1 = mysqli_real_escape_string($conn, $_POST['ut1']);
    $ut2 = mysqli_real_escape_string($conn, $_POST['ut2']);
    $ass = mysqli_real_escape_string($conn, $_POST['ass']);
    $report = mysqli_real_escape_string($conn, $_POST['report']);
    $pr = mysqli_real_escape_string($conn, $_POST['pr']);
    $per = mysqli_real_escape_string($conn, $_POST['per']);
    $pa = mysqli_real_escape_string($conn, $_POST['pa']);

    $sql = "INSERT INTO marks (name, roll, year, subject, ut1, ut2, assignment,report,practicals, attendence,internalmarks) 
            VALUES ('$name', '$roll', '$year', '$sub', '$ut1', '$ut2', '$ass', '$report','$pr','$per','$pa')";

    if ($conn->query($sql) === TRUE) {
        echo "Inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!--end of javascript and php used for above code-->

</body>

</html>