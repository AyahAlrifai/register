<html>
<body>
<?php
session_start();
$insertResult="";


$Symbol=$_POST["addSymbol"];
$Name =$_POST["addName"];
$Section=$_POST["addSection"];
$Day =$_POST["addDay"];
$Time=$_POST["addTime"].':00';
$Hall=$_POST["addHall"];


$database=mysqli_connect('localhost','root','','labs_registration_system');
if(!$database)
die("Could not connect to database ");
$q= "Select * from lab;";
$result2 = mysqli_query($database, $q);
$flag=0;

while( $r2 = mysqli_fetch_row($result2))
{

if ($r2[3]==$Day && $r2[4]==$Time &&$r2[5]==$Hall)
	{
	$insertResult="This Hall is reserved at this time";

	$flag=1;
	}
}
if(!$flag)
	{
	$q = "Insert Into lab values ('$Symbol','$Name','$Section','$Day','$Time','$Hall','0');";
	$result = mysqli_query($database, $q);
	$insertResult="One row is inserted";
	}

$_SESSION["m"] = $insertResult;
//print_r($_SESSION);
header("Location:admin.php");

?>
</body>
</html>
