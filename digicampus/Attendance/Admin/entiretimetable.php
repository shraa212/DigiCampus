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

// Function to fetch and display the timetable for the selected department
function displayTimetable($department, $conn) {
    // Define time slots including breaks in 24-hour format
    $time_slots = [
        "09:00-10:00", 
        "10:00-11:00", 
        "11:00-12:00", 
        "12:00-13:00", 
        "13:00-14:00", // Lunch Break
        "14:00-15:00", 
        "15:00-16:00"
    ];
    
    // Prepare the SQL query
    $sql = "SELECT day_of_week, start_time, end_time, subject_name 
            FROM timetable WHERE department_name = ? 
            ORDER BY FIELD(day_of_week, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'), start_time";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $department);
    $stmt->execute();
    $result = $stmt->get_result();

    // Create an array to hold timetable data
    $timetable = [];
    while ($row = $result->fetch_assoc()) {
        $day = $row['day_of_week'];
        $start_time = $row['start_time'];
        $end_time = $row['end_time'];
        $subject = $row['subject_name'];
        
        // Determine the corresponding time slots based on start and end time
        $start_slot_index = getSlotIndex($start_time);
        $end_slot_index = getSlotIndex($end_time);

        // Store subjects in the timetable
        for ($i = $start_slot_index; $i <= $end_slot_index; $i++) {
            // Avoid overwriting slots that are already occupied
            if (!isset($timetable[$day][$i])) {
                $timetable[$day][$i] = [];
            }
            // Ensure that the subject is only added to the starting time slot
            if ($i === $start_slot_index) {
                if (!in_array($subject, $timetable[$day][$i])) {
                    $timetable[$day][$i][] = $subject;
                }
            }
        }
    }

    // Display the timetable
    echo "<h2>Timetable for $department Department</h2>";
    echo "<table>";
    echo "<tr><th>Day</th><th>09:00-10:00</th><th>10:00-11:00</th><th>11:00-12:00</th><th>12:00-13:00</th><th>13:00-14:00</th><th>14:00-15:00</th><th>15:00-16:00</th></tr>";

    // Days of the week in order
    $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    
    foreach ($daysOfWeek as $day) {
        echo "<tr>";
        
        // Display Sunday with merged cell functionality
        if ($day === "Sunday") {
            echo "<td rowspan='1'>Sunday</td>";
            echo "<td colspan='7' style='text-align:center;'>Holiday</td>"; // Show "Holiday" for Sunday
            echo "</tr>";
            continue; // Skip to the next day
        } else {
            echo "<td>$day</td>";
        }

        // Display subjects for each time slot
        for ($i = 0; $i < count($time_slots); $i++) {
            echo "<td>";

            // Merge cells for lunch break
            if ($i === 4) { // Lunch Break slot
                echo "Lunch Break"; // Display Lunch Break only once
            } elseif (isset($timetable[$day][$i])) {
                if (count($timetable[$day][$i]) > 0) {
                    // Merge cells for overlapping time slots
                    $subjects = implode(", ", $timetable[$day][$i]);
                    echo "<div style='text-align:center;'>" . htmlspecialchars($subjects) . "</div>";
                } else {
                    echo "No classes";
                }
            } else {
                echo "No classes";
            }
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

// Helper function to get the slot index based on the start time
function getSlotIndex($time) {
    $time_slots = [
        "09:00-10:00", 
        "10:00-11:00", 
        "11:00-12:00", 
        "12:00-13:00", 
        "13:00-14:00", // Lunch Break
        "14:00-15:00", 
        "15:00-16:00"
    ];
    
    foreach ($time_slots as $index => $slot) {
        list($slot_start, $slot_end) = explode("-", $slot);
        if ($time >= $slot_start && $time < $slot_end) {
            return $index; // Return the index of the matching slot
        }
    }
    return null; // Return null if no matching slot is found
}

// Get the selected department from user input
$selected_department = isset($_GET['department']) ? $_GET['department'] : 'E&TC'; // Default to E&TC

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weekly Timetable</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            font-size: 2em;
            color: #333;
            margin-bottom: 20px;
        }
        form {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
            background-color: white; /* White background for cells */
        }
        th {
            background-color: #3498db;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9; /* Zebra striping for better readability */
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
        }
        input[type="submit"]:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

<form method="GET" action="">
    <label for="department">Select Department:</label>
    <select name="department" id="department" required>
        
        <option value="E&TC" <?= $selected_department == 'E&TC' ? 'selected' : '' ?>>E&TC</option>
        <option value="CS" <?= $selected_department == 'CS' ? 'selected' : '' ?>>CS</option>
        <option value="IT" <?= $selected_department == 'IT' ? 'selected' : '' ?>>IT</option>
        <option value="IS" <?= $selected_department == 'IS' ? 'selected' : '' ?>>IS</option>
        <option value="CE" <?= $selected_department == 'CE' ? 'selected' : '' ?>>CE</option>
        <option value="ME" <?= $selected_department == 'ME' ? 'selected' : '' ?>>ME</option>
        <option value="EE" <?= $selected_department == 'EE' ? 'selected' : '' ?>>EE</option>
        <option value="AIDS" <?= $selected_department == 'AIDS' ? 'selected' : '' ?>>AIDS</option>
        <option value="A&R" <?= $selected_department == 'A&R' ? 'selected' : '' ?>>A&R</option>
    </select>
    <input type="submit" value="View Timetable">
</form>

<?php
// Display the timetable after the form
displayTimetable($selected_department, $conn);
$conn->close();
?>

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

<center><a href="index.php">Go Back To Dashboard</a></center>