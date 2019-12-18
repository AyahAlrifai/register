<!DOCTYPE html>
<html lang="en">
<head>
  <?
  echo "hello";
  $symbolerror="error";
  $sectionerror="error";
  $symbol="cis";
  $section="5";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["symbol"]))
      $symbolerror = "Symbol is required";
   else
  	 $symbol=$_POST["symbol"];

     if (empty($_POST["section"]))
      $sectionerror = "Section is required";
     else
  	   $section=$_POST["section"];

    if($symbolerror=="" || $symbolerror=="")
    {
      $con=mysqli_connect("localhost","root","HaYa.IaFiRlA.79","labs_registration_system");
      if(!$con)
        die("not connected".mysqli_connect_error());
      $sql="SELECT count(*) FROM lab where symbol='$symbol' and section='$section'";
      $result=mysqli_query($con,$sql);
      $row=mysqli_fetch_row($result);
      if($row==0){
        $symbolerror="some thing error";
      }
      else {
        header("location:studentFile.php");

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
      <span style="color:red"><? echo $symbolerror;?></span>
      <label for="section">section</label>
      <input type="text" name="section" value="<?php echo htmlspecialchars($section); ?>">
      <span style="color:red" id="p2"><? echo $sectionerror;?></span>
      <input type="submit" name="download" value="download">
    </form>
</body>
</html>
