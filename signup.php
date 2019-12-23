<!DOCTYPE html>
<html lang="en">
<head>
  <title>LABs Registration</title>
  <?php include('reg.php'); ?>
  <script>
    function match(){
    	var note1=document.getElementById("p1");
    	var note2=document.getElementById("p2");
    	var pass=document.getElementById("mypass2");
    	if(pass.value=="")
    	{
    		note1.innerHTML="<font color='red' >confirm your password</font>";
    		note2.innerHTML="";
    	}
    }
  </script>
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
<span style="color:red"><?php echo $done;?></span>
<div style="  border-radius: 60px;border-color: #EDD700;color: #EDD700;background-color:#2E3951;border-width: 3px;border-style: solid;width:500px;margin:10% auto;" >
  <h2 style="text-align:center;"> Sign Up </h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <p><span style="color:red;margin-left:5%;margin-right:5%;">* required field</span></p>
    <div style="margin-left:5%;margin-right:5%;">
      <div class="form-group">
        <label>  Student Id</label>&nbsp<span style="color:red">*</span>
        <input type="text" name="id" value="<?= $id ?>" class="form-control" style="background-color:#FFFFFF;">
        <span style="color:red"> <?php echo $IdError;?></span>
      </div>
      <div class="form-group">
        <label> Name </label>&nbsp<span style="color:red">*</span>
        <input type="text" name="name" value="<?= $name ?>" class="form-control">
        <span style="color:red"><?php echo $NameError;?></span>
      </div>
      <div class="form-group">
        <label> Age </label>&nbsp<span style="color:red">*</span>
        <input type="text" name="age" value="<?= $age ?>" class="form-control">
      </div>
      <div class="form-group">
        <label> Password </label>&nbsp<span style="color:red">*</span>
        <input type="password" name="password1" id="mypass1" value="<?= $pass1 ?>" class="form-control" onblur="check()">
        <div id="p3"></div>
        <span style="color:red"><?php echo $invalidError;?></span>
      </div>
      <div class="form-group">
        <label> Confirm Password </label>&nbsp<span style="color:red">*</span>
        <input type="password" name="password2" id="mypass2" value="<?= $pass2 ?>" class="form-control" onblur="match()">
        <div id="p1"></div>
        <span style="color:red" id="p2"><?php echo $notMatchError;?></span>
      </div>
      <input type="submit" value="signup" class="btn" style="background-color:#EDD700;color:#2E3951;font-weight:bold;">
      <input type="reset" class="btn btn-default" value="clear" style="color:#2E3951;font-weight:bold;">
      <br><br>
      <p>Already have an account? <a href="signin.php">Login here</a>.</p>
      <span style="color:red"><?php echo $notdone;?></span>
      <br><br>
    </div>
  </form>
</div>
</body>
</html>
