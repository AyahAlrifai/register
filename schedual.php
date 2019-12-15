<!DOCTYPE html>
<html lang="en">
<head>
  <title>LABs Registration</title>
  <link rel="stylesheet" type="text/css" href="css/schedual.css">
  <meta charset="utf-8">
	<link rel="shortcut icon" type="image/x-icon" href="images/JUST-Logo.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-expand-sm" style="background-color:#2E3951;">
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
<div class="container" style="border-color:#2E3951;border-style:groove;font-size:xx-large;text-align:center;border-radius:100px;padding:10px;margin:3%;background-color:#FFFF99;color:#2E3951;font-weight: 900;">
  Course Schedule <img src="images/JUST-Logo.png" class='image' style="display:inline" alt="" width="60px" height="60px">الجدول الدراسي
</div>
    <?php
    		$con=mysqli_connect("localhost","root","","labs_registration_system");
    		if(!$con)
    			die("not connected".mysqli_connect_error());
        $sql="SELECT lab.*,hall.Capacity FROM lab LEFT JOIN hall ON lab.hall = hall.hallName order by lab.symbol,lab.section";
    		$result=mysqli_query($con,$sql);
        $i=0;
        $table="<div class='container'><table class='table table-sm text-center'>";
        $table.="<thead><tr style='background-color:#2E3951;color:#EDD700;'>";
        #style='text-align:center; because text-center class not work in thead !!!
        $table.="<th style='text-align:center;'>Symbol</th><th style='text-align:center;'>Name</th><th style='text-align:center;'>Section</th><th style='text-align:center;'>Day</th><th style='text-align:center;'>Time</th><th style='text-align:center;'>Hall";
        $table.="</th><th style='text-align:center;'>Registered</th><th style='text-align:center;'>Capacity</th></tr></thead><tbody>";
         while ($row=mysqli_fetch_row($result)){
           if($i%2==0){
             $table.="<tr style='background-color:#FFFF99'>";
           }
           else {
             $table.="<tr style='background-color:#EDD700'>";
           }
           $i+=1;
           foreach ($row as $key => $value){
               $table.="<td>".$value."</td>";
           }
           $table.="</tr>";
         }
         $table.="</tbody></table></div>";
         echo $table;
        mysqli_close($con);
    	?>
</body>
</html>
