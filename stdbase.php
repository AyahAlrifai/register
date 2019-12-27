<?php
  session_start();
  $symbol=$_POST["symbol"];
  $section=$_POST["section"];
  $flag=true;
  $msg="" ;
  $id=$_SESSION["myid"];
  $conn=mysqli_connect('gp96xszpzlqupw4k.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306','s65zogn0z3wxrq0a','dkiqhhx8sj4doabh','rlii1q7s8y1oeop8');
  $result=mysqli_query($conn,"select symbol,section from lab where symbol='$symbol' and section='$section'");
  if(!(mysqli_num_rows($result) > 0)){
    $msg='<div style="text-align:center" class="alert alert-danger alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          this course or section doesnt exist
          </div>';
  	$flag=false;
  }
  else{
    $result=mysqli_query($conn,"select labSymbol from studentlabs where studentID='$id' and labSymbol='$symbol'");
    if((mysqli_num_rows($result) > 0)){
      $msg='<div style="text-align:center" class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            you already register this course
            </div>';
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
                    {
                      $msg='<div style="text-align:center" class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            time conflict
                            </div>';
                      $flag=false;}

		    }
		    }
  	}
  	    if($flag){
  	    	$result=mysqli_query($conn,"select hall.Capacity,lab.Registered from hall,lab where lab.hall=hall.hallName and lab.symbol='$symbol' and lab.section='$section' ");
  	    	$row=mysqli_fetch_row($result);
  	    	if($row[1]==$row[0])
          $msg='<div style="text-align:center" class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                closed section
                </div>';
  	    	else{
  	    		$sql=mysqli_query($conn,"insert into studentlabs values ('$id','$symbol','$section')");
		  		$sql2=mysqli_query($conn,"update lab set Registered=Registered+1 where symbol='$symbol' and section='$section'");
          $msg='<div style="text-align:center" class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                You registered successfully
                </div>';
  	    	}
  	    }

$_SESSION["m"] = $msg;
header('location:student.php');

?>
