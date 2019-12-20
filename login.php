<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['id']) || empty($_POST['password1'])) {
$error = "Username or Password is invalid";
}
else{
// Define $username and $password
$username = $_POST['id'];
$password = $_POST['password1'];
// mysqli_connect() function opens a new connection to the MySQL server.
$flag=false;

$conn=mysqli_connect("localhost","root","","labs_registration_system");


$q1="select * from student where ID='$username'";
$res1=mysqli_query($conn,$q1);
$num1=mysqli_num_rows($res1);

$q2="select * from admin where id='$username'";
$res2=mysqli_query($conn,$q2);
$num2=mysqli_num_rows($res2);




if($num1==0 and $num2==0)
	$error="no such record in our database ";

if($num1==1)
{
	$row=mysqli_fetch_assoc($res1);
	$pass=$row["Password"];
	if($pass != $password )
	{

		$error="Username or Password is invalid";
	}
	else
	{
		$_SESSION["myid"]=$row["ID"];
		$_SESSION["myname"]=$row["Name"];
		$login_session=$row["Name"];
		$_SESSION['login_user'] = "student";
		header("location:student.php");
	}

}

else if ($num2==1)
{
	$row=mysqli_fetch_assoc($res2);
	$pass=$row["password"];
	if($pass != $password )
	{

		$error="Username or Password is invalid";
	}
	else
	{

		$_SESSION['login_user']="admin";
		header("location:signup.php");
	}
}


}
}
?>
