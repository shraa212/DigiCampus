<?php require_once("config.php"); ?>
<?php
session_start();


?>


<?php
if(isset($_POST['delete'])) {
    $itemId = $_POST['item_id'];
    $query = "SELECT * FROM items WHERE id = $itemId";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $imagePath = "../upload/".$row['image'];

    // Delete from folder
    if(file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Delete from database
    $deleteQuery = "DELETE FROM items WHERE id = $itemId";
    mysqli_query($db, $deleteQuery);
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
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
    <?php include 'includes/title.php'; ?>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include "Includes/sidebar.php"; ?>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <?php include "Includes/tpbar.php"; ?>
                <!-- Topbar -->

                <!-- Container Fluid-->
              
                <div class="content">
                    <ol class="breadcrumb ">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active"><?php //echo $catName ?></li>
                    </ol>
                    <div class="tableBox">
                        <table  style= id="dataTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $res=mysqli_query($db,"SELECT * FROM items ORDER BY id DESC");
                                    while($row=mysqli_fetch_array($res)){
                                        echo '<tr>
                                            <td><img src="../upload/'.$row['image'].'" height="200" width="200"></td>
                                            <td >'.$row['title'].'</td>
                                            <td>
                                                <form method="post">
                                                    <input type="hidden" name="item_id" value="'.$row['id'].'">
                                                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- ending tag for content -->

            </div>
            <!-- ending tag for margin left -->

        </div>
        <!-- #content-wrapper closing tag -->
    </div>
    <!-- #wrapper closing tag -->

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include "Includes/footer.php"; ?>

    <!-- Footer -->

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>
    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
</body>

</html>
