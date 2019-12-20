<html>
<body>
<?php
$con=mysqli_connect("localhost","root","","labs_registration_system");
if(!$con)
  die("not connected".mysqli_connect_error());
  $sql="DELETE FROM lab WHERE symbol=".$_GET["symbol"]."and section=".$_GET["section"];
  $result=mysqli_query($con,$sql);
header("location:admin.php");
?>
</body>
</html>
