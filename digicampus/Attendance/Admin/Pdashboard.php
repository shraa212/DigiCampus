
<?php 
error_reporting(0);
include '../Includes/dbcon.php';
//include '../Includes/session.php';
//include "connection1.php";
//include "connection2.php";





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

  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
	
	<!--placement portal CSS Start -->
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>Placement Portal</title>
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	  <!-- Bootstrap 3.3.7 -->
	  
	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <!-- Ionicons -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	  <!-- Theme style -->
	 <link rel="stylesheet" href="../css/AdminLTE.min.css">
  
	  <!-- Custom -->
	  <link rel="stylesheet" href="../css/custom.css">
	  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	  <!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	  <![endif]-->

	  <!-- Google Font -->
	  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <!--placement portal CSS End -->
	<style>
		.placement-cell-stats {
		  display: flex;
		  flex-wrap: wrap;
		  justify-content: space-between;
		  margin: 0 auto;
		  max-width: 600px;
		}

		.placement-cell-stats h2 {
		  background-color: #f1f1f1;
		  padding: 10px;
		  text-align: center;
		  width: 100%;
		}

		.stat {
		
		 background-color:#F4A460;
		  border: 1px solid #ddd;
		  box-sizing: border-box;
		  flex: 1 1 300px;
		  margin-bottom: 60px;
		  margin-right: 150px;
		  padding: 15px;
		  height: 80px;
		}

		.stat h3 {
		  margin-top: 0;
		}
			.container10{
			padding-top: 0px;
			padding-left: 0px;
			padding-right: 10px;
			padding-bottom: 10px;
			margin-top:0px;
			margin-bottom:10px;
			margin-left:10px;
			margin-right:5px;
			width:100%;
			
		}
		.container {
			 padding: 2px 0px;
			 margin-dp 
		}
	</style>

   <script>
    function classArmDropdown(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxClassArms2.php?cid="+str,true);
        xmlhttp.send();
    }
}
</script>
		 
  
  
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
      <?php include "Includes/sidebar.php";?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
       <?php include "Includes/tpbar.php";?>
        <!-- Topbar -->

        <!-- Container Fluid-->
			<center>  <h3>Placement Cell Statistics</h3> </center>
			<div class="row" style="margin-right:40px; margin-left:40px; margin-top:40px;">
                <div class="col-md-6">
                  <div class="info-box bg-c-yellow">
                    <span class="info-box-icon bg-red"><i class="ion ion-briefcase"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Co-Ordinators</span>
                      <?php
                      $sql = "SELECT * FROM company WHERE active='1'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                      ?>
                      <span class="info-box-number"><?php echo $totalno; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box bg-c-yellow">
                    <span class="info-box-icon bg-red"><i class="ion ion-briefcase"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Pending Coordinators Approval</span>
                      <?php
                      $sql = "SELECT * FROM company WHERE active='2'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                      ?>
                      <span class="info-box-number"><?php echo $totalno; ?></span>

                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box bg-c-yellow">
                    <span class="info-box-icon bg-green"><i class="ion ion-person-stalker"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Registered Students</span>
                      <?php
                      $sql = "SELECT * FROM users WHERE active='1'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                      ?>
                      <span class="info-box-number"><?php echo $totalno; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box bg-c-yellow">
                    <span class="info-box-icon bg-green"><i class="ion ion-person-stalker"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Pending Students Confirmation</span>
                      <?php
                      $sql = "SELECT * FROM users WHERE active='0'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                      ?>
                      <span class="info-box-number"><?php echo $totalno; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box bg-c-yellow">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-person-add"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Total Drive Posts</span>
                      <?php
                      $sql = "SELECT * FROM job_post";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                      ?>
                      <span class="info-box-number"><?php echo $totalno; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box bg-c-yellow">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-browsers"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Total DRIVE Applications</span>
                      <?php
                      $sql = "SELECT * FROM apply_job_post";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                      ?>
                      <span class="info-box-number"><?php echo $totalno; ?></span>
                    </div>
                  </div>
                </div>
              </div>	
					  
			
			
          

         
        <!---Container Fluid-->
      
      <!-- Footer -->
      
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