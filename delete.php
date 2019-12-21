<html>
<body>
<?php
session_start();
$deleteResult="";

$arr=array();
$i=0;


$token = strtok($_POST["button1"], "-");
while ($token !== false)
{
$arr[$i++]=$token;
$token = strtok("-");

}
$database=mysqli_connect('localhost','root','','labs_registration_system');
if(!$database)
die("Could not connect to database ");

$q= "Select * from lab where symbol= '$arr[0]' AND section='$arr[1]';";
$result3 = mysqli_query($database, $q);
 $r2 = mysqli_fetch_row($result3);
if(!$r2[6] )
{


$q = "delete from lab where symbol= '$arr[0]' AND section='$arr[1]';";

$result = mysqli_query($database, $q);
$deleteResult="One row is deleted";
}
else
$deleteResult="This lab cannot be deleted because there are students enrolled in it.";



$_SESSION["d"] = $deleteResult;
print_r($_SESSION);
header("Location:admin.php");

?>
</body>
</html>
