<?php
session_start();

if(!isset($_SESSION['userId']))
{
  header('location:login.php');
}
 ?>
<?php require "assets/function.php" ?>
<?php require 'assets/db.php';?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo siteTitle(); ?></title>
  <?php require "ass/autoloader.php" ?>
  <style type="text/css">
  <?php include 'css/customStyle.css'; ?>

  </style>
  <?php 
  $notice="";
  if (isset($_POST['safeIn'])) 
  {
    $filename = $_FILES['inPic']['name'];
    move_uploaded_file($_FILES["inPic"]["tmp_name"], "photo/".$_FILES["inPic"]["name"]);
    if ($con->query("insert into categories (name,pic) value ('$_POST[name]','$filename')")) {
      $notice ="<div class='alert alert-success'>Successfully Saved</div>";
    }
    else
      $notice ="<div class='alert alert-danger'>Not saved Error:".$con->error."</div>";
  }

   ?>
</head>
<body style="background: #ECF0F5;padding:0;margin:0">


  <div class="content2">
    <?php echo $notice; ?>
    <div>
      <span style="font-size: 16pt;color: #333333">Categories </span>
      <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#addIn" style="margin-left: 2px;"><i class="fa fa-plus fa-fw"> </i>Add New Category</button> 
      <a href="manageCat.php"><button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#addIn"><i class="fa fa-gear  fa-fw"> </i> Manage Categories</button></a>

    </div>

  <?php 
    $array = $con->query("select * from categories");
    while ($row = $array->fetch_assoc()) 
    {
      $array2 = $con->query("select count(*) from inventeries where catId = '$row[id]'");
      $row2 = $array2->fetch_assoc();
  ?>
    <a href="inventeries.php?catId=<?php echo $row['id'] ?>"><div class="box2 col-md-3">
     <div class="center"> <img src="photo/<?php echo $row['pic'] ?>" style="width: 155px;height: 122px;" class='img-thumbnail'></div>
      <hr style="margin: 7px;">
      <span style="padding: 11px"><strong style="font-size: 10pt">Name</strong><span class="pull-right" style="color:blue;margin-right: 11px;"><?php echo $row['name'] ?></span></span>
      <hr style="margin: 7px;">
      <span style="padding: 11px"><strong style="font-size: 10pt">Available Qty</strong><span class="pull-right" style="color:blue;margin-right: 11px"><?php echo $row2['count(*)']; ?></span></span>
    </div></a>
  <?php
    }
   ?>
  </div>
</div>

<div id="addIn" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Inventory</h4>
      </div>
      <div class="modal-body"> <form method="POST" enctype="multipart/form-data">
        <div style="width: 77%;margin: auto;">
         
          <div class="form-group">
            <label for="some" class="col-form-label">Name</label>
            <input type="text" name="inName" class="form-control" id="some" required>
          </div>
          <div class="form-group">
            <label for="2" class="col-form-label">Picture</label>
            <input type="file" name="inPic" class="form-control" id="2" required>
          </div>
          
       
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="safeIn">Save Inventory</button>
      </div>
    </form>
    </div>

  </div>
</div>

</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){$(".rightAccount").click(function(){$(".account").fadeToggle();});});
</script>

