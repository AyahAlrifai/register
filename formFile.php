<!DOCTYPE html>
<html lang="en">
<head>
<?php
  $symbolerror="";
  $sectionerror="";
  $omeThingError="";
  $symbol="";
  $section="";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["symbol"]))
      $symbolerror = "Symbol is required";
   else
  	 $symbol=$_POST["symbol"];

     if (empty($_POST["section"]))
      $sectionerror = "Section is required";
     else
  	   $section=$_POST["section"];
    if($symbolerror=="" && $sectionerror=="")
    {
      $con=mysqli_connect("localhost","root","HaYa.IaFiRlA.79","labs_registration_system");
      if(!$con)
        die("not connected".mysqli_connect_error());
      $sql="SELECT count(*) FROM lab where symbol='$symbol' and section='$section'";
      $result=mysqli_query($con,$sql);
      $row=mysqli_fetch_row($result);
      if($row[0]==0){
        $omeThingError="some thing error";
      }
      else {
        $sql="SELECT COUNT(*) FROM student INNER JOIN studentlabs ON student.ID = studentlabs.studentID and studentlabs.labSymbol='$symbol' and studentlabs.Section='$section'";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_row($result);
        if($row[0]==0){
          $omeThingError="no student Registered in this section";
        }
        else {
          $symbolerror="";
          $sectionerror="";
          $omeThingError="";
          header("location:studentFile.php?symbol=$symbol&section=$section");
        }
      }
    }
  }
  ?>
<meta charset="UTF-8">
<title>File</title>
</style>
</head>
<body>
  <div style="border-radius: 60px;border-color: #EDD700;color: #EDD700;background-color:#2E3951;border-width: 3px;border-style: solid;margin:5% auto;" >
    <p style="text-align:center">Download Students Info in specific section</p>
        <form class="form-inline" style="padding-left:30px;padding-bottom:30px;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <label class="control-label" for="symbol">symbol</label>
          <input type="text" name="symbol" value="<?php echo htmlspecialchars($symbol);?>">
          <label class="control-label" for="section">section</label>
          <input type="text" name="section" value="<?php echo htmlspecialchars($section); ?>">
          <input type="submit" name="download" value="download" style="background-color:#EDD700;color:#2E3951;font-weight:bold;">
          <span style="color:red;"><?php echo $symbolerror;?></span>
          <span style="color:red;"><?php echo $sectionerror;?></span>
          <span style="color:red;padding-right:10%;" id="p2"><?php echo $omeThingError;?></span>
        </form>
    </div>
</body>
</html>
