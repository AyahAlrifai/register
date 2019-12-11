<!DOCTYPE html>
<html lang="en">
<head>
  <title>LABs Registration</title>
	<style media="screen">
	</style>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/signup.css">
	<link rel="shortcut icon" type="image/x-icon" href="images/JUST-Logo.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#2E3951">
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
		<li><a href="signup.php"  style="color:#EDD700"><span class="glyphicon glyphicon-user"></span> SignUp</a></li>
		    <li><a href="signin.php"  style="color:#EDD700"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					<!--<li><a href="#"  style="color:#EDD700"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>-->
      </ul>
    </div>
  </div>
	<hr style="border: 1.5px solid #EDD700;border-radius: 5px;padding:0px;margin:0px">
</nav>
	<div class="container">
    <div class="container" >
    <div class="login-box">
    <div class="row">
    <div class="login-left">
    <div class="login-right">
    <h2> Sign Up </h2>
    <form action="" method="POST">
    <p><span class="error">* required field</span></p>
    <div class="form-group">
    <label>  Student Id </label>
    <input type="text" name="id" value="" class="form-control">
    <div class="form-group">
    <label> Name </label>
    <input type="text" name="name" value="" class="form-control">
    </div>
    <div class="form-group">
    <label> Age </label>
    <input type="text" name="age" value="" class="form-control">
    </div>
    <div class="form-group">
    <label> Password </label>
    <input type="password" name="password1" value="" class="form-control">
    </div>
    <div class="form-group">
    <label> Repeat Password </label>
    <input type="password" name="password2" value="" class="form-control">
    </div>
    <input type="submit" value="signup" class="btn btn-primary">
    <input type="reset" class="btn btn-default" value="clear">
    <br>
    <br>
    <p>Already have an account? <a href="signin.html">Login here</a>.</p>
    <br>
    <br>
    </form>
    </div>
    </div>
    </div>
    </div>
  	</div>
</body>
</html>
