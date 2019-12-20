<?php
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
	if($_SESSION['login_user']=="student")
		header("location: student.php"); // Redirecting To Profile Page
	else
		header("location: admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>LABs Registration</title>
	<style media="screen">
	</style>
  <meta charset="utf-8">
	<link rel="shortcut icon" type="image/x-icon" href="images/JUST-Logo.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-expand-sm" style="background-color:#2E3951">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar" style="background-color: #EDD700;" ></span>
				<span class="icon-bar" style="background-color: #EDD700;" ></span>
				<span class="icon-bar" style="background-color: #EDD700;" ></span>
      </button>
			<a class="navbar-brand" href="#" style="padding:2px;">
				<img src="images/JUST-Logo.png" alt="logo" style="width:40px;display:inline;">
			</a>
			<p class="navbar-text"  style="color:#EDD700;font-weight:bold;">Jordan University of Science and Technology</p>
		</div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
				<li><a href="index.html" style="color:#EDD700">Home</a></li>
		    <li><a href="schedual.php" style="color:#EDD700">Schedual</a></li>
      </ul>
    </div>
  </div>
	<hr style="border: 1.5px solid #EDD700;border-radius: 5px;padding:0px;margin:0px">
</nav>
<div style="border-radius: 60px;border-color: #EDD700;color: #EDD700;background-color:#2E3951;border-width: 3px;border-style: solid;width:500px;margin:10% auto;" >
    <h1 style="text-align:center;">Sign in</h1>
    <div style="margin-left:5%;margin-right:5%;">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
				<div class="form-group">
				<label>  UserName </label>
				<input type="text" name="id"  class="form-control">
				</div>
				<div class="form-group">
				<label> Password </label>
				<input type="password" name="password1"  class="form-control">
				<br>
				<span style="color:#FF0000"><?php echo $error;?></span>
				</div>
				<input type="submit" name="submit" value="signin" class="btn btn-primary"  style="background-color:#EDD700;color:#2E3951;font-weight:bold;">
				<br>
				<br>
				<p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>
				<br>
				<br>
    </form>
</div>
</body>
</html>
