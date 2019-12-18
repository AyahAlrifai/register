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
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <label for="symbol">symbol</label>
      <input type="text" name="symbol" value="<?php echo htmlspecialchars($symbol);?>">
      <span style="color:red"><?php echo $symbolerror;?></span>
      <label for="section">section</label>
      <input type="text" name="section" value="<?php echo htmlspecialchars($section); ?>">
      <span style="color:red" id="p2"><?php echo $sectionerror;?></span>
      <input type="submit" name="download" value="download">
      <br>
      <span style="color:red" id="p2"><?php echo $omeThingError;?></span>
    </form>
</body>
</html>
