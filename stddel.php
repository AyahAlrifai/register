<?php
session_start();
$msg="";
$v=$_POST['button1'];
$symbol=substr($v,0,6);
$section=substr($v,7);
$id=$_SESSION["myid"];
$conn=mysqli_connect("localhost","root","","labs_registration_system");
  $result=mysqli_query($conn,"Delete from studentlabs where labSymbol='$symbol' and section='$section' and studentID='$id'");
  $sql2=mysqli_query($conn,"update lab set Registered=Registered-1 where symbol='$symbol' and section='$section'");
  $msg='<div style="text-align:center" class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        one row deleted
        </div>';
        $_SESSION["m"] = $msg;
  header('location:student.php');
?>
