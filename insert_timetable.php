
<?php 
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';


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
  <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #e9eff1;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h2 {
            text-align: center;
            font-size: 2.5em;
            color: #333;
            margin-bottom: 20px;
        }
        form {
            width: 100%;
            max-width: 600px;
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s;
        }
        form:hover {
            transform: scale(1.02);
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-size: 1.1em;
            color: #555;
        }
        select, input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
            transition: border-color 0.3s;
        }
        select:focus, input[type="text"]:focus {
            border-color: #3498db;
            outline: none;
        }
        input[type="submit"] {
            padding: 10px 15px;
            font-size: 1.1em;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }
        @media (max-width: 768px) {
            form {
                padding: 20px;
            }
            h2 {
                font-size: 2em;
            }
        }
    </style>
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
        <?php
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
        } else {
            echo "<script>alert('Error inserting record: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    }
}

$conn->close();
?>



<body>

<form method="POST" action="">
    <h2>Insert Timetable Entry</h2>

    <label for="department_name">Select Department:</label>
    <select name="department_name" id="department_name" required>
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

    <label for="day_of_week">Day of the Week:</label>
    <select name="day_of_week" id="day_of_week" required>
        <option value="">Select Day</option>
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Saturday</option>
        <option value="Sunday">Sunday</option>
    </select>

    <label for="start_time">Start Time:</label>
    <select name="start_time" id="start_time" required>
        <option value="">Select Start Time:</option>
        <option value="09:00">09:00 AM</option>
        <option value="10:00">10:00 AM</option>
        <option value="11:00">11:00 AM</option>
        <option value="12:00">12:00 PM</option>
        <option value="13:00">01:00 PM</option>
        <option value="14:00">02:00 PM</option>
        <option value="15:00">03:00 PM</option>
       
    </select>

    <label for="end_time">End Time:</label>
    <select name="end_time" id="end_time" required>
         <option value="">Select End Time:</option>
        <option value="10:00">10:00 AM</option>
        <option value="11:00">11:00 AM</option>
        <option value="12:00">12:00 PM</option>
        <option value="13:00">01:00 PM</option>
        <option value="14:00">02:00 PM</option>
        <option value="15:00">03:00 PM</option>
        <option value="16:00">04:00 PM</option>
       
    </select>

    <label for="subject_name">Subject Name:</label>
    <input type="text" name="subject_name" id="subject_name" required>

    <label for="faculty_name">Faculty Name:</label>
    <input type="text" name="faculty_name" id="faculty_name" required>

    <input type="submit" value="Insert Entry">
</form>

</body>
</html>

      
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