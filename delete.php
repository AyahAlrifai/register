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
$database=mysqli_connect('gp96xszpzlqupw4k.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306','s65zogn0z3wxrq0a','dkiqhhx8sj4doabh','rlii1q7s8y1oeop8');
if(!$database)
die("Could not connect to database ");

$q= "Select * from lab where symbol= '$arr[0]' AND section='$arr[1]';";
$result3 = mysqli_query($database, $q);
 $r2 = mysqli_fetch_row($result3);
if(!$r2[6] )
{


$q = "delete from lab where symbol= '$arr[0]' AND section='$arr[1]';";

$result = mysqli_query($database, $q);
$deleteResult='<div style="text-align:center" class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      One row is deleted
      </div>';
}
else
$deleteResult='<div style="text-align:center" class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      This lab cannot be deleted because there are students enrolled in it
      </div>';

$_SESSION["d"] = $deleteResult;
print_r($_SESSION);
header("Location:admin.php");

?>
</body>
</html>
