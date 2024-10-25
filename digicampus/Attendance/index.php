<?php 
include 'Includes/dbcon.php';
session_start();

// $_SESSION['OTP_sent']="hello";
// $res=isset($_SESSION['OTP_sent']);
// echo $res;

if(isset($_POST['send_otp'])){

  $userType = $_POST['userType'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $otp = $_POST['otp'];
  //$password = md5($password);

  if($userType == "Administrator"){

    $query = "SELECT * FROM tbladmin WHERE emailAddress = '$email' AND password = '$password'";
    $rs = $conn->query($query);
    $num = $rs->num_rows;
    $rows = $rs->fetch_assoc();

    if($num > 0){
      $_SESSION['userType']=$userType;
      $_SESSION['userId'] = $rows['Id'];
      $_SESSION['firstName'] = $rows['firstName'];
      $_SESSION['lastName'] = $rows['lastName'];
      $_SESSION['emailAddress'] = $rows['emailAddress'];
      $_SESSION['password'] = $password;
      echo "<script>window.location.href='sendOTP.php'</script>";
    }

    else{

      echo "<div class='alert alert-danger' role='alert'>
      Invalid Username/Password!
      </div>";

    }
  }
  else if($userType == "ClassTeacher"){

    $query = "SELECT * FROM tblclassteacher WHERE emailAddress = '$email' AND password = '$password'";
    $rs = $conn->query($query);
    $num = $rs->num_rows;
    $rows = $rs->fetch_assoc();

    if($num > 0){
      $_SESSION['userType']=$userType;
      $_SESSION['password'] = $password;
      $_SESSION['userId'] = $rows['Id'];
      $_SESSION['firstName'] = $rows['firstName'];
      $_SESSION['lastName'] = $rows['lastName'];
      $_SESSION['emailAddress'] = $rows['emailAddress'];
      $_SESSION['classId'] = $rows['classId'];
      $_SESSION['classArmId'] = $rows['classArmId'];
      echo "<script>window.location.href='sendOTP.php'</script>";
     
    }

    else{

      echo "<div class='alert alert-danger' role='alert'>
      Invalid Username/Password!
      </div>";

    }
  }
  else if($userType == "Student"){

    $query = "SELECT * FROM tblstudents WHERE email = '$email' AND password = '12345'";
    $rs = $conn->query($query);
    $num = $rs->num_rows;
    $rows = $rs->fetch_assoc();

    if($num > 0){
      $_SESSION['userType']=$userType;
      $_SESSION['password'] = $password;
      $_SESSION['userId'] = $rows['Id'];
      $_SESSION['firstName'] = $rows['firstName'];
      $_SESSION['lastName'] = $rows['lastName'];
      $_SESSION['emailAddress'] = $rows['email'];
      /*$_SESSION['classId'] = $rows['classId'];
      $_SESSION['classArmId'] = $rows['classArmId'];*/
      echo "<script>window.location.href='sendOTP.php'</script>";
      echo "<script type = \"text/javascript\">
      window.location = (\"Student/dashboard.php\")
      </script>";
    }

    else{

      echo "<div class='alert alert-danger' role='alert'>
      Invalid Username/Password!
      </div>";

    }
  }
  else{

      echo "<div class='alert alert-danger' role='alert'>
      Invalid Username/Password!
      </div>";

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
    <title>DIGI-CAMPUS </title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login" style="background-image: url('img/logo/loral1.jpe00g');">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <h5 align="center">DIGI-CAMPUS SMART SYSTEM</h5>
                                    <div class="text-center">
                                        <img src="img/logo/attnlg.jpg" style="width:100px;height:100px">
                                        <br><br>
                                        <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
                                    </div>
                                    <form class="user" method="Post" action="">
                                        <div class="form-group">
                                            <select required name="userType" id='userType'class="form-control mb-3">
                                                <option value="">--Select User Roles--</option>
                                                <option value="Administrator">Admin</option>
                                                <option value="ClassTeacher">ClassTeacher</option>
                                                <option value="Student">Student</option>
                                            </select>
                                        </div>
                                        <!-- <div class="form-group">
                                            <input type="text" class="form-control" required style="display:none"name="userType" id='userType1'>
                                        </div> -->
                                        <div class="form-group">
                                            <input type="email" class="form-control" required name="email" id="exampleInputEmail" placeholder="Enter Email Address">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" required class="form-control" id="exampleInputPassword" placeholder="Enter Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="otp" style="display:none;" class="form-control" id="exampleInputOtp" placeholder="Enter OTP">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <!-- <label class="custom-control-label" for="customCheck">Remember
                          Me</label> -->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success btn-block" id='send_otp'value="Send OTP" name="send_otp" />
                                        </div>
                                        
                                              <br>
                                              <center> <a href="../">Go To Home Page</a></center>
                                        </div>
                                    </form>
<?php
if($_SESSION['OTP_sent']=="sent"){
  $userType = $_SESSION['userType'];
  // echo "<script>alert('$userType');</script>";
  $userType=$_SESSION['userType'];
  $email1=$_SESSION['emailAddress'];
  $pass1=$_SESSION['password'];
  echo "<script>document.getElementById('userType').required=false</script>";
  // echo "<script>document.getElementById('userType').value='$userType1'</script>";
  echo "<script>document.getElementById('userType').style.display='none'</script>";
  // echo "<script>document.getElementById('userType1').style.display='block'</script>";
  // echo "<script>document.getElementById('userType1').value='$usertype1'</script>";
  echo "<script>document.getElementById('exampleInputEmail').value='$email1'</script>";
  echo "<script>document.getElementById('exampleInputPassword').value=$pass1</script>";

  echo "<script>document.getElementById('exampleInputOtp').required=true</script>";
  echo "<script>document.getElementById('exampleInputOtp').style.display='block'</script>";
  echo "<script>document.getElementById('exampleInputPassword').readOnly=true</script>";
  echo "<script>document.getElementById('exampleInputEmail').readOnly=true</script>";
  echo "<script>document.getElementById('send_otp').name='login'</script>";
  echo "<script>document.getElementById('send_otp').value='login'</script>";
}
?>
<?php

  if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $otp = $_POST['otp'];
    //$password = md5($password);

    if($userType == "Administrator"){

      $query = "SELECT * FROM tbladmin WHERE emailAddress = '$email' AND password = '$password' AND otp='$otp'";
      $rs = $conn->query($query);
      $num = $rs->num_rows;
      $rows = $rs->fetch_assoc();

      if($num > 0){

        $_SESSION['userId'] = $rows['Id'];
        $_SESSION['firstName'] = $rows['firstName'];
        $_SESSION['lastName'] = $rows['lastName'];
        $_SESSION['emailAddress'] = $rows['emailAddress'];

        echo "<script type = \"text/javascript\">
        window.location = (\"Admin/index.php\")
        </script>";
      }

      else{

        echo "<div class='alert alert-danger' role='alert'>
        Invalid OTP!
        </div>";

      }
    }
    else if($userType == "ClassTeacher"){

      $query = "SELECT * FROM tblclassteacher WHERE emailAddress = '$email' AND password = '$password' AND otp='$otp'";
      $rs = $conn->query($query);
      $num = $rs->num_rows;
      $rows = $rs->fetch_assoc();

      if($num > 0){

        $_SESSION['userId'] = $rows['Id'];
        $_SESSION['firstName'] = $rows['firstName'];
        $_SESSION['lastName'] = $rows['lastName'];
        $_SESSION['emailAddress'] = $rows['emailAddress'];
        $_SESSION['classId'] = $rows['classId'];
        $_SESSION['classArmId'] = $rows['classArmId'];

        echo "<script type = \"text/javascript\">
        window.location = (\"ClassTeacher/index.php\")
        </script>";
      }

      else{

        echo "<div class='alert alert-danger' role='alert'>
        Invalid OTP!
        </div>";

      }
    }
    else if($userType == "Student"){

      $query = "SELECT * FROM tblstudents WHERE email = '$email' AND password = '$password' AND otp='$otp'";
      $rs = $conn->query($query);
      $num = $rs->num_rows;
      $rows = $rs->fetch_assoc();

      if($num > 0){

        $_SESSION['userId'] = $rows['Id'];
        $_SESSION['firstName'] = $rows['firstName'];
        $_SESSION['lastName'] = $rows['lastName'];
        $_SESSION['emailAddress'] = $rows['emailAddress'];
        /*$_SESSION['classId'] = $rows['classId'];
        $_SESSION['classArmId'] = $rows['classArmId'];*/

        echo "<script type = \"text/javascript\">
        window.location = (\"Student/dashboard.php\")
        </script>";
      }
      else{
        echo "<div class='alert alert-danger' role='alert'>
        Invalid OTP!
        </div>";

      }
    }
    else{

        echo "<div class='alert alert-danger' role='alert'>
        Invalid OTP!
        </div>";

    }
}
?>

                                    <!-- <hr>
                    <a href="index.html" class="btn btn-google btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a> -->


                                    <div class="text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>

</body>

</html>