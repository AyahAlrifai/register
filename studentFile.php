<?php
$symbol=$_GET["symbol"];
$section=$_GET["section"];
    $filepath = "student.txt";
    $myfile = fopen($filepath, "w");
    $con=mysqli_connect('gp96xszpzlqupw4k.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306','s65zogn0z3wxrq0a','dkiqhhx8sj4doabh','rlii1q7s8y1oeop8');
    if(!$con)
      die("not connected".mysqli_connect_error());
    $sql="SELECT student.ID,student.Name FROM student INNER JOIN studentlabs ON student.ID = studentlabs.studentID and studentlabs.labSymbol='$symbol' and studentlabs.Section='$section'";
    $result=mysqli_query($con,$sql);
    $output="$symbol-$section\nStudent id\tStudent name\n";
     while ($row=mysqli_fetch_row($result)){
       $output.="$row[0]\t\t$row[1]\n";
     }
     echo $output;
     fwrite($myfile, $output);
     fclose($myfile);
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filepath));
    flush(); // Flush system output buffer
    readfile($filepath);
    exit;
?>
