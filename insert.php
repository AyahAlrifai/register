<html>
<body>
<?php
$Symbol=$_POST["addSymbol"];
$Name =$_POST["addName"];
$Section=$_POST["addSection"];
$Day =$_POST["addDay"];
$Time=$_POST["addTime"].':00';
$Hall=$_POST["addHall"];

$database=mysqli_connect('localhost','root','','labs_registration_system');
if(!$database)
die("Could not connect to database ");

$q = "Insert Into lab values ('$Symbol','$Name','$Section','$Day','$Time','$Hall','0');";

$result = mysqli_query($database, $q);
if ($result)
echo "One row is inserted";
header("Location:admin.php");

?>
</body>
</html>
