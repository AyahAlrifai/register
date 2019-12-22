<?php
  session_start();
  $symbol=$_POST["symbol"];
  $section=$_POST["section"];
  $flag=true;
  $msg="" ;
  $id=114200;
  $conn=mysqli_connect("localhost","root","","labs_registration_system");
  $result=mysqli_query($conn,"select symbol,section from lab where symbol='$symbol' and section='$section'");
  if(!(mysqli_num_rows($result) > 0)){
  	$msg="this course or section doesnt exist";
  	$flag=false;
  }
  else{
    $result=mysqli_query($conn,"select labSymbol from studentlabs where studentID='$id' and labSymbol='$symbol'");
    if((mysqli_num_rows($result) > 0)){
  	   $msg="you already register this course";
  	   $flag=false;
  	}
  	else{
  		$result=mysqli_query($conn,"select lab.time,lab.day from studentlabs,lab where lab.section=studentlabs.section and lab.symbol= studentlabs.labSymbol and studentlabs.studentID='$id' ");// to get all sections time and day for specific student
		$sql2=mysqli_query($conn,"select time,day from lab where section='$section' and symbol='$symbol'");// get time of section that entered
		$row=mysqli_fetch_row($sql2);
		$time=$row[0];
		$day=$row[1];
		if((mysqli_num_rows($result) > 0))
			while($row=mysqli_fetch_row($result)){

				if($row[0]==$time && $row[1]==$day)
                    {$msg="time conflict";
                      $flag=false;}

		    }
		    }
  	}
  	    if($flag){
  	    	$result=mysqli_query($conn,"select hall.Capacity,lab.Registered from hall,lab where lab.hall=hall.hallName and lab.symbol='$symbol' and lab.section='$section' ");
  	    	$row=mysqli_fetch_row($result);
  	    	if($row[1]==$row[0])
  	    		$msg="closed section";
  	    	else{
  	    		$sql=mysqli_query($conn,"insert into studentlabs values ('$id','$symbol','$section')");
		  		$sql2=mysqli_query($conn,"update lab set Registered=Registered+1 where symbol='$symbol' and section='$section'");
          $msg="";
  	    	}
  	    }

$_SESSION["m"] = $msg;
header('location:student.php');

?>
