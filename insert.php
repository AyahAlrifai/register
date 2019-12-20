<html>
<head>
  <title>LABs Registration</title>
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
        <ul class="nav navbar-nav navbar-right">
  				<li><a href="signup.php"  style="color:#EDD700"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
  		    <li><a href="signin.php"  style="color:#EDD700"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
  				<!--<li><a href="#"  style="color:#EDD700"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>-->
        </ul>
      </div>
    </div>
  	<hr style="border: 1.5px solid #EDD700;border-radius: 5px;padding:0px;margin:0px">
  </nav>
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
