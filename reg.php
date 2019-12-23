<?php
$IdError="";
$NameError="";
$invalidError="";
$notMatchError="";
$flag1=false;
$flag2=false;

$name="";
$age="";
$id="";
$pass1="";
$pass2="";
$done="";
$error="GGG";
$temp="";
$temp="<script>document.writeln(val);</script>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["id"]))
    $IdError = "ID is required";
 else
	 $id=$_POST["id"];

   if (empty($_POST["name"]))
    $NameError = "Name is required";
   else
	   $name=$_POST["name"];

	if($_POST["password1"] != $_POST["password2"] )
	{
		if( preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#",$_POST["password1"]) and $_POST["password2"]=="")
			{
				$notMatchError="confirm your password";
				$pass1=$_POST["password1"];
				$pass2="";
			}
		else if (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#",$_POST["password1"]) and $_POST["password2"]!="")
			{
				$notMatchError="does not match";
				$pass1=$_POST["password1"];
				$pass2="";
			}

		else if(!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#",$_POST["password1"]))
		{
			$invalidError="password must be at least 8 characters ,upper/lower letters,digits and special characters";
			$pass1="";
			$pass2="";
		}
	}
	else
	{
		$pass1=$_POST["password1"];
		$pass2=$_POST["password2"];
	}
	$age=$_POST["age"];
	if($notMatchError == "" and $invalidError == "" and $NameError == "" and $IdError == "" and $_POST["password1"]!="")
	{
		$conn=mysqli_connect("localhost","root","","labs_registration_system");
		$q="insert into student values ('$id','$name','$pass1','$age')";
		$res=mysqli_query($conn,$q);
		if($res)
		{
      $done='<div style="text-align:center" class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              You Have Registered <strong>Successfully</strong> <a href="signin.php" class="alert-link">click here to sign in</a>.
            </div>';
			$name="";
			$age="";
			$id="";
			$pass1="";
			$pass2="";
		}
		else
		{
			$notdone='some thing<strong> wrong</strong>';
		}

	}

}
?>
