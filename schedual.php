<!DOCTYPE html>
<html lang="en">
<head>
  <title>LABs Registration</title>
	<style media="screen">
	</style>
  <link rel="stylesheet" type="text/css" href="css/schedual.css">
  <meta charset="utf-8">
	<link rel="shortcut icon" type="image/x-icon" href="images/JUST-Logo.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#2E3951;">
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
<div class="margin header">
  Course Schedule <img src="images/JUST-Logo.png" class='image' style="display:inline" alt="" width="100px" height="100px">الجدول الدراسي
</div>
    <?php
    		$con=mysqli_connect("localhost","root","HaYa.IaFiRlA.79","register");
    		if(!$con)
    			die("not connected".mysqli_connect_error());
        $sql="select * from Structure";
    		$result=mysqli_query($con,$sql);
        $i=0;
        $table="<div class='margin'><table class='table mid table-sm'><tr style='background-color:#2E3951;color:#EDD700'><th>Symbol</th><th>Section</th><th>Name</th><th>Day</th><th>Time</th><th>Hall</th><th>Registered</th><th>Capacity</th></tr>";
         while ($row=mysqli_fetch_row($result)) {
           if($i%2==0){
             $table.="<tr style='background-color:#F3F382'>";
           }
           else {
             $table.="<tr style='background-color:#EDD700'>";
           }
           $i+=1;
           foreach ($row as $key => $value) {
             $table.="<td>".$value."</td>";
           }
           $capacity=mysqli_fetch_row(mysqli_query($con,"select * from Hall where name='"+$rpw['hall']+"'"));
           $table.="<td>".$capacity."</td>";

           $table.="</tr>";

         }
         $table.="</table></div>";
         echo $table;
        mysqli_close($con);
    	?>
</body>
</html>
