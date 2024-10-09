<?php
// 
session_start();
$userType = $_SESSION['userType'];
// echo "<script>alert('$userType');</script>";
include "Includes/dbcon.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$email=$_SESSION['emailAddress'];
// echo "<script>alert('$email');</script>";
$pass=$_SESSION['password'];
$id=$_SESSION['userId'];
$userType=$_SESSION['userType'];
function sendOTP($email,$otp)
{
    require ("PHPMailer\Exception.php");
    require ("PHPMailer\SMTP.php");
    require ("PHPMailer\PHPMailer.php");
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {                    
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'dhamanechinmay@gmail.com';                     //SMTP username
        $mail->Password   = 'dkahfromshmwuczw';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('dhamanechinmay@gmail.com', 'Life saviour');
        $mail->addAddress($email);               //Name is optional
       
    
        //Attachments
       // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Techaholics login OTP';
        $mail->Body    = 'Your OTP :<b>'.$otp.'</b>';

        $mail->send();
        // echo "sent";
        Return true;
    } catch (Exception $e) {
        echo "<script>location.reload()</script>";
         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        Return false;
    }
}
$otp=rand(000000,999999);
if(sendOTP($email,$otp))
    {   
        if($userType == "Administrator"){
            $query="update tbladmin set otp='$otp' where Id='$id'";
        }
        if($userType == "ClassTeacher"){
            $query="update tblclassteacher set otp='$otp' where Id='$id'";
        }
        if($userType == "Student"){
            $query="update tblstudents set otp='$otp' where Id='$id'";
        }
        date_default_timezone_set('Asia/Kolkata');
        
        mysqli_query($conn,$query);
        $_SESSION['OTP_sent']="sent";
        echo "<script>window.location.href='index.php'</script>";
        // $_SESSION['otp']="sent";
    }
    else{
        echo "not sent";
    }
//echo "$email";
// $otp=random_bytes(6);
// $otp=bin2hex($otp);

?>