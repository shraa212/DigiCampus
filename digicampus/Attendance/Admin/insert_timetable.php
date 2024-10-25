
<?php 
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';
?>
<?php


if(isset($_POST['save']))
{
    
    
// Connect to the database
$servername = "localhost";
$username = "root"; // Use your MySQL username
$password = ""; // Use your MySQL password
$dbname = "timetable_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $department_name = $_POST['department_name'];
    $day_of_week = $_POST['day_of_week'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $subject_name = $_POST['subject_name'];
    $faculty_name = $_POST['faculty_name'];

    // Validate time input
    if ($start_time >= $end_time) {
        echo "<script>alert('End time must be after start time.');</script>";
    } else {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO timetable (department_name, day_of_week, start_time, end_time, subject_name, faculty_name) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $department_name, $day_of_week, $start_time, $end_time, $subject_name, $faculty_name);

        if ($stmt->execute()) {
            echo "<script>alert('Record inserted successfully!');</script>";
            echo"<script>window.location.href='index.php'</script>";
        } else {
            echo "<script>alert('Error inserting record: " . $stmt->error . "');</script>";
            echo"<script>window.location.href='index.php'</script>";
        }

        $stmt->close();
    }
}

$conn->close();



}

  


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/attnlg.jpg" rel="icon">
<?php include 'includes/title.php';?>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
      <?php include "Includes/sidebar.php";?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
       <?php include "Includes/topbar.php";?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Time Table</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Time Table</a></li>
              <li class="breadcrumb-item active" aria-current="page">Create Time Table</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Create Time Table</h6>
                    <?php echo $statusMsg; ?>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group row mb-3">
                        <div class="col-xl-6">
                           

                          <label class="form-control-label" for="department_name">Select Department:<span class="text-danger ml-2">*</span></label>
    <select name="department_name" class="form-control" id="department_name" required>
        <option value="">Select Department</option>
        <option value="E&TC">E&TC</option>
        <option value="CS">CS</option>
        <option value="IT">IT</option>
        <option value="IS">IS</option>
        <option value="CE">CE</option>
        <option value="ME">ME</option>
        <option value="EE">EE</option>
        <option value="AIDS">AIDS</option>
        <option value="A&R">A&R</option>
    </select>

    <label for="day_of_week">Day of the Week:<span class="text-danger ml-2">*</span></label>
    <select name="day_of_week" id="day_of_week" class="form-control" required>
        <option value="">Select Day</option>
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Saturday</option>
        <option value="Sunday">Sunday</option>
    </select>

    <label for="start_time">Start Time:<span class="text-danger ml-2">*</span></label>
    <select name="start_time" id="start_time" class="form-control" required>
        <option value="">Select Start Time:</option>
        <option value="09:00">09:00 AM</option>
        <option value="10:00">10:00 AM</option>
        <option value="11:00">11:00 AM</option>
        <option value="12:00">12:00 PM</option>
        <option value="13:00">01:00 PM</option>
        <option value="14:00">02:00 PM</option>
        <option value="15:00">03:00 PM</option>
       
    </select>

    <label for="end_time">End Time:<span class="text-danger ml-2">*</span></label>
    <select name="end_time" id="end_time"class="form-control" required>
         <option value="">Select End Time:</option>
        <option value="10:00">10:00 AM</option>
        <option value="11:00">11:00 AM</option>
        <option value="12:00">12:00 PM</option>
        <option value="13:00">01:00 PM</option>
        <option value="14:00">02:00 PM</option>
        <option value="15:00">03:00 PM</option>
        <option value="16:00">04:00 PM</option>
       
    </select>

    <label for="subject_name">Subject Name:<span class="text-danger ml-2">*</span></label>
    <input type="text" name="subject_name" id="subject_name" class="form-control" required>

    <label for="faculty_name">Faculty Name:<span class="text-danger ml-2">*</span></label>
    <input type="text" name="faculty_name" id="faculty_name" class="form-control" required>
    <br><br>

    <input type="submit" class="btn btn-primary" name="save" value="Insert Entry">
                        </div>
                    </div>
                   
                  </form>
                </div>
              </div>

              <!-- Input Group -->
                
          <!--Row-->

          <!-- Documentation Link -->
          <!-- <div class="row">
            <div class="col-lg-12 text-center">
              <p>For more documentations you can visit<a href="https://getbootstrap.com/docs/4.3/components/forms/"
                  target="_blank">
                  bootstrap forms documentations.</a> and <a
                  href="https://getbootstrap.com/docs/4.3/components/input-group/" target="_blank">bootstrap input
                  groups documentations</a></p>
            </div>
          </div> -->

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
       <?php include "Includes/footer.php";?>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
   <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>

</html>