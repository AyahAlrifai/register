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


$database=mysqli_connect('h40lg7qyub2umdvb.cbetxkdyhwsb.us-east-1.rds.amazonaws.com','qygo0fj96x0bqqs1','tldlxjueyhqci5v1','jxmuczgeixk2nwzx');
if(!$database)
die("Could not connect to database ");
$q= "Select * from lab;";
$result2 = mysqli_query($database, $q);
$flag=0;

while( $r2 = mysqli_fetch_row($result2))
{

if ($r2[3]==$Day && $r2[4]==$Time &&$r2[5]==$Hall)
	{
		$insertResult='<div style="text-align:center" class="alert alert-danger alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					This Hall is reserved at this time
					</div>';
	$flag=1;
	}
}
if(!$flag)
	{
	$q = "Insert Into lab values ('$Symbol','$Name','$Section','$Day','$Time','$Hall','0');";
	$result = mysqli_query($database, $q);
	$insertResult='<div style="text-align:center" class="alert alert-success alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				One row is inserted
				</div>';
	}

$_SESSION["m"] = $insertResult;
//print_r($_SESSION);
header("Location:admin.php");

?>
</body>
</html>
