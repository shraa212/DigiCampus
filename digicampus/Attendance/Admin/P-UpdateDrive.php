
<?php 
error_reporting(0);
include '../Includes/dbcon.php';
//include '../Includes/session.php';
//include "connection1.php";
//include "connection2.php";
//------------------------SAVE--------------------------------------------------

//require_once("db.php");

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
<?php// include 'includes/title.php';?>
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
		.container{
			width:100%;
			height:50%;
			padding-right:200px;
			padding-left:20px;
			margin-left:60px;
			margin-right:80px;
			float:left;
			color:black;
			
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
			<div class="container">
			<center> <h2 style="font-weight:bold;">Update Drive</h2> </center>
			 <center> <p style="font-weight:bold;">In this section you can change drive details.</p> </center>
			  <?php
					$sql = "SELECT * FROM job_post WHERE id_jobpost='$_GET[id]'";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
				?>
				<div style="width:50%; height:100%;  float:left; padding-right:30px;">
					 <div class="form-group">
						<label>Company Name</label>
						<input type="text" class="form-control input-lg" name="companyname" id="companyname" value="<?php echo $row['jobtitle']; ?>">
					 </div>
					 <div class="form-group">
						<label>Role</label>
						<input type="text" class="form-control input-lg" name="role" id="role" value="<?php echo $row['experience']; ?>">
					 </div>
					 <div class="form-group">
						<label>Drive Detail</label>
						<textarea class="form-control input-lg" rows="4" id="description" name="description"><?php echo $row['description']; ?></textarea>
					 </div>
				</div>
				
				<div style="width:50%; height:100%; float:left;  padding-left:30px;">
					 <div class="form-group">
						<label for="contactno">Eligibility</label>
						<input type="text" class="form-control input-lg" id="Eligibility" name="Eligibility" placeholder="Eligibility" value="<?php echo $row['eligibility']; ?>">
					</div>
					<div class="form-group">
						<label for="city">CTC</label>
						<input type="text" class="form-control input-lg" id="CTC" name="CTC" value="<?php echo $row['minimumsalary']; ?>" placeholder="CTC">
					</div>
					<div class="form-group">
						<label for="state">Qualification Required</label>
						<input type="text" class="form-control input-lg" id="qualification" name="qualification" placeholder="qualification" value="<?php echo $row['qualification']; ?>">
					 </div>
				</div>
				 <div class="form-group">
					<center> <button type="submit" name="submit" id="submit" class="btn btn-flat btn-success">Update Profile</button> </center>
				</div>
				<?php
					}
				}
				?>
			</div>
			
        <!---Container Fluid-->
      </div>
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