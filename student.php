<!DOCTYPE html>
<html lang="en">
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
<?php
    session_start();
?>
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
          <li><a href="#"  style="color:#EDD700"><span class="glyphicon glyphicon-user"></span> Student page</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
  				<li><a href="index.html"  style="color:#EDD700"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
        </ul>
      </div>
    </div>
  	<hr style="border: 1.5px solid #EDD700;border-radius: 5px;padding:0px;margin:0px">
</nav>
<div style="border-radius: 60px;border-color: #EDD700;color: #EDD700;background-color:#2E3951;border-width: 3px;border-style: solid;margin:5%;" >
  <p style="text-align:center;margin-top:3px;">Add new cource</p>
      <form class="form-inline" style="padding:10px;margin-left:20%;margin-right:20%;" action="stdbase.php" method="post">
        <label class="control-label" for="symbol">symbol</label>
        <input type="text" name="symbol">
        <label class="control-label" for="section">section</label>
        <input type="text" name="section">
        <input type="submit" name="register" value="register" id="R1" style="background-color:#EDD700;color:#2E3951;font-weight:bold;">
        <br>
      </form>
      <div class="row" style="color: red; margin-top: 2%;">
        <span class="col-sm-3" style="text-align: center;">
          <?php $msg=$_SESSION["m"]; echo $msg; $_SESSION["m"]=" "; ?>
        </span>
      </div>
</div>
<div class='container'>
      <table class='table table-sm text-center'>
        <thead>
          <tr style='background-color:#2E3951;color:#EDD700;'>
            <th style='text-align:center;'>Lab Name</th>
            <th style='text-align:center;'>Lab Symbol</th>
            <th style='text-align:center;'>Section</th>
            <th style='text-align:center;'>Day</th>
            <th style='text-align:center;'>Time</th>
            <th style='text-align:center;'>hall</th>
            <th></th>
        </tr>
      </thead>
      <tbody>
    <?php
    		$id=114200;
    		$conn=mysqli_connect("localhost","root","","labs_registration_system");

    		$result=mysqli_query($conn,"select lab.name,studentlabs.labSymbol,studentlabs.section,lab.day,lab.time,lab.hall from studentlabs,lab where studentlabs.labSymbol=lab.symbol and studentlabs.section=lab.section and studentlabs.studentID='$id'");
        $i=0;
        $table="";
  			while($row = mysqli_fetch_row($result))
        {
          if($i%2!=0) {
            $table.="<tr style='background-color:#FFFF99'>";
            }
          else {
            $table.="<tr style='background-color:#EDD700'>";
          }
          $i++;
          echo $table."<form method='POST' action='stddel.php'><td>". $row[0]."</td><td>". $row[1]."</td><td>". $row[2]."</td><td>". $row[3]."</td><td>". $row[4]."</td><td>". $row[5]."</td><td id='delete-td'><button name='button1' style='color:#EDD700; background-color:#2E3951;'' type='submit' value='$row[1]-$row[2]'>delete</button></td></form></tr>";
      }
    ?>
    </tbody>
   </table>
</div>
</body>
</html>
