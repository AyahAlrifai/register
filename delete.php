<html>
<body>
<?php
print_r($_POST);
echo "hello world";
$con=mysqli_connect("localhost","root","","labs_registration_system");
if(!$con)
  die("not connected".mysqli_connect_error());
?>
</body>
</html>
