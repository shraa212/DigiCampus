
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
				 <center> <h3>Co-Ordinators</h3> </center><br>
             
                <div class="col-md-12">
                  <div class="box-body table-responsive no-padding">
                    <table id="example2" class="table table-hover">
                      <thead>
                        <!-- <th>Company Name</th> -->
                        <th>Account Creator Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Status</th>
                        <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php
                        $sql = "SELECT * FROM company";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                              <!-- <td> -->
                              <!-- php echo $row['companyname'];  -->
                              <!-- </td>  -->
                              <td><?php echo $row['name']; ?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo $row['contactno']; ?></td>
                              <td><?php echo $row['city']; ?></td>
                              <td><?php echo $row['state']; ?></td>
                              <td><?php echo $row['country']; ?></td>
                              <td>
                                <?php
                                if ($row['active'] == '1') {
                                  echo "Activated";
                                } else if ($row['active'] == '2') {
                                ?>
                                  <a href="P-RejectCompany.php?id=<?php echo $row['id_company']; ?>">Reject</a> <a href="P-ApproveCompany.php?id=<?php echo $row['id_company']; ?>">Approve</a>
                                <?php
                                } else if ($row['active'] == '3') {
                                ?>
                                  <a href="approve-company.php?id=<?php echo $row['id_company']; ?>">Reactivate</a>
                                <?php
                                } else if ($row['active'] == '0') {
                                  echo "Rejected";
                                }
                                ?>
                              </td>
                              <td><a href="P-DeleteCompany.php?id=<?php echo $row['id_company']; ?>">Delete</a></td>
                            </tr>
                        <?php
                          }
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
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