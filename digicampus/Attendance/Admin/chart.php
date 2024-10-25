<!-- <?php require_once("config.php");?> -->

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
  <title>Dashboard</title>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <style>
    .legend-container {
        display: flex;
        flex-direction: column;
        justify-content: bottom;
        align-items: bottom;
        height: 100%; /* Adjust height if needed */
    }

    .legend-item {
        display: flex;
        align-items: bottom;
        margin-bottom: 5px;
    }

    .legend-color-box {
        width: 20px;
        height: 20px;
        margin-right: 5px;
    }

    #legend {
        margin-left: 40px;
        margin-top: 200px;
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
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Resource Analysis</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Resource Analysis</li>
            </ol>
          </div>

          <div class="d-flex">
            <div>
              <canvas id="myPieChart" width="400" height="400"></canvas>
            </div>
            <!-- Legend box beside the canvas -->
            <div id="legend" class="legend-container"></div>
          </div>

          <?php
          // Database connection parameters
          $host = "localhost";
          $username = "root";
          $password = "";
          $database = "store";

          // Create connection
          $conn = new mysqli($host, $username, $password, $database);

          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

          // Fetch data from the database
          $sql = "SELECT name, unit FROM inventeries";
          $result = $conn->query($sql);

          // Process the fetched data
          $data = [];
          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  $data[$row['name']] = (int)$row['unit'];
              }
          }

          // Close the database connection
          $conn->close();

          // Convert data to JSON for JavaScript
          $data_json = json_encode($data);
          ?>

          <script>
            // Get the canvas element
            var canvas = document.getElementById('myPieChart');
            var ctx = canvas.getContext('2d');

            // Parse the JSON data
            var data = <?php echo $data_json; ?>;

            // Function to draw a pie chart
            function drawPieChart(data, colors) {
              var total = Object.values(data).reduce((a, b) => a + b, 0);

              var startAngle = 0;
              for (var i = 0; i < colors.length; i++) {
                var category = Object.keys(data)[i];
                var sliceAngle = (data[category] / total) * 2 * Math.PI;

                ctx.fillStyle = colors[i];
                ctx.beginPath();
                ctx.moveTo(canvas.width / 2, canvas.height / 2);
                ctx.arc(canvas.width / 2, canvas.height / 2, canvas.width / 2, startAngle, startAngle + sliceAngle);
                ctx.closePath();
                ctx.fill();

                startAngle += sliceAngle;
              }
            }

            // Function to generate a random color
            function getRandomColor() {
              var letters = '0123456789ABCDEF';
              var color = '#';
              for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
              }
              return color;
            }

            // Draw legend beside the canvas
            function drawLegend(data, colors) {
              var legendDiv = document.getElementById('legend');
              legendDiv.innerHTML = '';

              for (var i = 0; i < colors.length; i++) {
                var category = Object.keys(data)[i];

                var legendItem = document.createElement('div');
                legendItem.className = 'legend-item';

                var colorBox = document.createElement('div');
                colorBox.className = 'legend-color-box';
                colorBox.style.backgroundColor = colors[i];

                var label = document.createElement('span');
                label.textContent = category + ": " + data[category];

                legendItem.appendChild(colorBox);
                legendItem.appendChild(label);
                legendDiv.appendChild(legendItem);
              }
            }

            // Generate colors array
            var colors = [];
            for (var i = 0; i < Object.keys(data).length; i++) {
              colors.push(getRandomColor());
            }

            // Call the drawPieChart and drawLegend functions
            drawPieChart(data, colors);
            drawLegend(data, colors);
          </script>

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
