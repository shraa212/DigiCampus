
<?php
session_start();
 require "assets/function.php" ;
 require 'assets/db.php';
 require "assets/autoloader.php";

 if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == "edit")
  {
        $id= $_GET['id'];

        $query=mysqli_query($con,"select * from inventeries where id ='$id'");
        $row=mysqli_fetch_array($query);
       
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require "assets/autoloader.php" ?>
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
      <?php include "Includes/tpbar.php";?>
        <!-- Topbar -->

        <!-- Container Fluid-->

 <div class="content2">
<ol class="breadcrumb ">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Add New Product</li>
    </ol>
    
    <div style="width: 55%;margin: auto;padding: 22px;" class="well well-sm center">

      <h4>Add New Product</h4><hr>
      <form method="POST">
         <div class="form-group">
            <label for="some" class="col-form-label">Name</label>
            <input type="text" name="name" class="form-control" id="some" value="<?php echo $row['name'];?>" required>
          </div>
          <div class="form-group">
            <label for="some" class="col-form-label">Unit</label>
            <input type="text" name="unit" placeholder="i.e 50mg" class="form-control" id="some" value="<?php echo $row['unit'];?>" required>
          </div>
         
          <div class="form-group">
            <label for="some" class="col-form-label">Company Name</label>
            <input type="text" name="company" value="<?php echo $row['company'];?>" class="form-control" id="some" required>
          </div>
          <div class="form-group">
            <!-- <label for="some" class="col-form-label">Select Category</label> -->
            <!-- <select class="form-control" required name="catId">
              <option selected disabled value="">Please Select Category</option>
            <?php getAllCat(); ?>
              
            </select> -->
          </div>
           <div class="form-group">
            <label for="some" class="col-form-label">Discription</label>
          <textarea class="form-control" value="" name="discription" required placeholder="Write some discription"><?php echo $row['description'];?></textarea> 
          </div>
          <div class="center">
            <button type="submit" name="saveProduct" class="btn btn-primary">Save</button>
            <button type="reset" class="btn btn-success">Reset</button>
          </div>
        </form>
    </div>
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

<?php 
if (isset($_POST['saveProduct'])) {
if ($con->query("update inventeries set name='$_POST[name]',unit='$_POST[unit]',description='$_POST[discription]',company='$_POST[company]'where id='$id'")) {
  $notice ="<div class='alert alert-success'>Successfully Saved</div>";
}
else{
  $notice ="<div class='alert alert-danger'>Error is:".$con->error."</div>";
}
}

 ?>