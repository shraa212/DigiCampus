<?php require_once("config.php");?>

<?php 
$statusMsg = ''; // Define the status message variable
if (isset($_POST['form_submit'])) 
{
    $title=$_POST['title'];
    $folder='../upload/';
    $image_file=$_FILES['image']['name'];
    $file=$_FILES['image']['tmp_name'];
    $path=$folder.$image_file;
    $target_file=$folder.basename($image_file);
    $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" &&
       $imageFileType != "gif"){
        $error[]='sorry, only this file type can be upload';
    }
    if($_FILES['image']['size']>45000000){
        $error[]='image is too large';
    }
    if(!isset($error)){
        move_uploaded_file($file,$target_file);
        $result=mysqli_query($db,"INSERT INTO items(image,title) VALUES('$image_file','$title')");
        if($result){
            $image_success=1;
          
        }
        else
        {
            echo 'something went wrong';
        }
    }
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
  <title>Dashboard</title>
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

        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Upload Notice</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Upload Notice</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Upload Notice</h6>
                  <?php echo $statusMsg; ?>
                </div>
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data">
                    <div class="form-group row mb-3">
                      <div class="col-xl-6">
                        <h4>Upload Notice</h4>
                        <hr>

                        <div class="form-group">
                          <label for="some" class="col-form-label">Image</label>
                          <input type="file" name="image" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label for="some" class="col-form-label">Title</label>
                          <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="center">
                          <button type="submit" name="form_submit" class="btn btn-primary">Upload</button>
                        </div>
                        
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
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
