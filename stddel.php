<?php

$v=$_POST['button1'];
$symbol=substr($v,0,6);
$section=substr($v,7);
$id=114200;
$conn=mysqli_connect("localhost","root","","labs_registration_system");
  $result=mysqli_query($conn,"Delete from studentlabs where labSymbol='$symbol' and section='$section' and studentID='$id'");


  header('location:student.php');



?>
