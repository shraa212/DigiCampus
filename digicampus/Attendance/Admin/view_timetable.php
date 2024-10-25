<?php
date_default_timezone_set('Asia/Kolkata'); // Set your timezone

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

$department_name = "";
$day_of_week = date('l'); // Get the current day of the week

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $department_name = $_POST['department_name'];
}

// Get the timetable for the selected department and current day, ordered by start time
$sql = "SELECT * FROM timetable WHERE department_name='$department_name' AND day_of_week='$day_of_week' ORDER BY start_time";
$result = $conn->query($sql);

// Get the current time
$current_time = date('H:i');

// Function to check the status of the time slot
function getStatus($start_time, $end_time, $current_time) {
    if ($current_time >= $start_time && $current_time <= $end_time) {
        return 'Ongoing'; // If current time is between start and end time
    } elseif ($current_time > $end_time) {
        return 'Ended'; // If current time is past the end time
    } else {
        return 'Upcoming'; // If current time is before the start time
    }
}

// Initialize an array to group entries by time slots
$time_slots = [];
while ($row = $result->fetch_assoc()) {
    $start_hour = date('H', strtotime($row['start_time']));
    $end_hour = date('H', strtotime($row['end_time']));
    
    // Create a time slot key based on the hour
    $slot_key = $start_hour . ":00 - " . ($start_hour + 1) . ":00";
    
    // Initialize the array for the time slot if it doesn't exist
    if (!isset($time_slots[$slot_key])) {
        $time_slots[$slot_key] = [];
    }
    
    // Add the entry to the corresponding time slot
    $time_slots[$slot_key][] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Timetable</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            padding: 20px 0;
            font-size: 2.5em;
            color: #333;
            margin-bottom: 20px;
        }
        /* Form Styles */
        form {
            text-align: center;
            margin-bottom: 20px;
        }
        select {
            padding: 10px;
            font-size: 1em;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            padding: 10px 15px;
            font-size: 1em;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        /* Card Styles */
        .card {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background-color: white;
            display: none; /* Hide initially */
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #3498db;
            color: white;
            font-size: 1.1em;
            text-transform: uppercase;
        }

        /* Row Styling based on Status */
        .ended {
            background-color: #ff6f61; /* Red for ended sessions */
            color: #fff;
        }
        .ongoing {
            background-color: #58d68d; /* Green for ongoing sessions */
            color: #fff;
        }
        .upcoming {
            background-color: #3498db; /* Blue for upcoming sessions */
            color: #fff;
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            table {
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>

<h2>Timetable for <?= $day_of_week ?></h2>

<form method="POST" action="">
    <label for="department_name">Select Department:</label>
    <select name="department_name" id="department_name" required>
        <option value="">Select Department:</option>
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
    <input type="submit" value="View Timetable">
</form>

<?php if (!empty($time_slots)): ?>
    <div class="card" style="display: block;"> <!-- Show card when there are results -->
        <?php foreach ($time_slots as $slot_key => $entries): ?>
            <h3 style="text-align:center;"><?= $slot_key ?></h3>
            <table>
                <tr>
                    <th>Subject</th>
                    <th>Faculty</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Status</th>
                </tr>
                <?php foreach ($entries as $row): ?>
                    <?php
                    $status = getStatus($row['start_time'], $row['end_time'], $current_time);
                    $status_class = strtolower($status); // Lowercase class for CSS styling
                    ?>
                    <tr class="<?= $status_class; ?>">
                        <td><?= $row['subject_name']; ?></td>
                        <td><?= $row['faculty_name']; ?></td>
                        <td><?= $row['start_time']; ?></td>
                        <td><?= $row['end_time']; ?></td>
                        <td><?= $status; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="card" style="display: block;">
        <p style="text-align:center;">No timetable entries for the selected department today.</p>
    </div>
<?php endif; ?>
<center><a href="index.php">Go Back To Dashboard</a></center>

</body>
</html>
