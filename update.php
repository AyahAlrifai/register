<html>
<body>
<?php
session_start();
$updateResult="";

$database=mysqli_connect('gp96xszpzlqupw4k.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306','s65zogn0z3wxrq0a','dkiqhhx8sj4doabh','rlii1q7s8y1oeop8');
if(!$database)
die("Could not connect to database ");

$Symbol=$_POST["addSymbol"];
$Name =$_POST["addName"];
$Section=$_POST["addSection"];
$Day =$_POST["addDay"];
$Time=$_POST["addTime"].':00';
$Hall=$_POST["addHall"];

$q = "Select * from hall;";
$result = mysqli_query($database, $q);
$HallsArray=array();
while( $r = mysqli_fetch_row($result))
{
$new=array_push($HallsArray,$r[2]);
}
$q2 = "Select * from lab;";
$result2 = mysqli_query($database, $q2);
$flag=false;

foreach($HallsArray as $index=>$value)
if($Hall==$value)
$flag=true;

if(!$flag)
$updateResult='<div style="text-align:center" class="alert alert-danger alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				there is no lab with this name
		</div>';
else
{

$flag2=false;
while( $r2 = mysqli_fetch_row($result2))
{

if ($r2[3]==$Day && $r2[4]==$Time &&$r2[5]==$Hall)
	{
	$flag2=true;
		$updateResult='<div style="text-align:center" class="alert alert-danger alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						This Hall is reserved at this time
				</div>';

	}
}

if(!$flag2)
	{
	$q = "Update lab set day = '$Day' , time= '$Time' , hall ='$Hall' where symbol = '$Symbol' && section='$Section';";
	$result = mysqli_query($database, $q);
	$updateResult='<div style="text-align:center" class="alert alert-success alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				One row is updated
				</div>';
	}
}

$_SESSION["u"] = $updateResult;
header("Location:admin.php");
?>
</body>
</html>
