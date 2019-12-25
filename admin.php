<html>
<head>
 <title>LABs Registration</title>

  <meta charset="utf-8">
	<link rel="shortcut icon" type="image/x-icon" href="images/JUST-Logo.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<?php

echo '
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>

function addbuttonPressed()
{
var html="<tr %n%><td>%symbol%</td><td>%name%</td><td>%section%</td><td>%day%</td><td>%time%</td><td>%hall%</td><td><button type=\'submit\' src=\'delete.jpg\'  height=\'42\' width=\'42\'>delete</button></td><td><button type=\'submit\' src=\'update.webp\'  height=\'42\' width=\'42\'>update</button></td></tr>";
var Symbol=document.getElementById("addSymbol").value;
var Name=document.getElementById("addName").value;
var Section= document.getElementById("addSection").value;
var Day=document.getElementById("addDay").value;
var Time=(document.getElementById("addTime").value)+":00";
var Hall=document.getElementById("addHall").value;
newhtml=html.replace("%symbol%",Symbol);
newhtml=newhtml.replace("%name%",Name);
newhtml=newhtml.replace("%section%",Section);
newhtml=newhtml.replace("%day%",Day);
newhtml=newhtml.replace("%time%",Time);
newhtml=newhtml.replace("%hall%",Hall);
newhtml=newhtml.replace("%n%",Symbol+"-"+Section);

var addButton=document.getElementById("addraw").insertAdjacentHTML(\'afterend\',newhtml);}


function start()
{
document.getElementById("labs").addEventListener("click",DeleteUpdateItem,false);
}';

echo '
function updateRaw(itemId)
{

splitID=itemId.split("-");

itemId=event.target.parentNode.parentNode.id;

var el=document.getElementById(itemId);

var idvalue="formdata-"+splitID[1]+splitID[3];

var child = el.lastElementChild;
while (child) {
            el.removeChild(child);
            child = el.lastElementChild;
        }
var newhtml=\'<form  method ="post" action = "update.php"><tr><td><input type ="text" placeholder="symbol" name="addSymbol" id="addSymbol"  readonly="readonly" value="\'+splitID[1]+\'" ></td><td><input type="text" placeholder="Name" name="addName" id="addName" readonly="readonly" value=\'+splitID[2]+\'  ></td><td><input name="addSection" id="addSection" type ="number" min="1" readonly="readonly" value=\'+splitID[3]+\'  ></td><td><select name="addDay" id="addDay" required value=\'+splitID[4]+\' ><option>SUN</option><option>MON</option><option>TUE</option><option>WED</option><option>THU</option></select></td><td><input type ="time" placeholder="--:--:--" name="addTime" id ="addTime" required value=\'+splitID[5]+\' ></td><td><input type ="text" placeholder="Hall Name" name="addHall" id="addHall" required value=\'+splitID[6]+\' ></td><td colspan="2"><input type="submit" id="updateButton" value="submit"/></td></tr></form>\';
document.getElementById("labs").insertAdjacentHTML("beforeBegin",newhtml);


}';


echo '
function DeleteUpdateItem(){
var itemId;
itemId=event.target.id;
if(itemId)
{
splitID=itemId.split("-");
type=splitID[0];


 if (type=="update")
{
updateRaw(itemId);
}

}
}';
echo'
window.addEventListener("load",start,false);
</script>';?>

<?php
    $symbolerror="";
    $sectionerror="";
    $someThingError="";
    $symbol="";
    $section="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      if (empty($_POST["symbol"]))
      $symbolerror='<div style="text-align:center" class="alert alert-danger alert-dismissible">
  							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Symbol is required
  					</div>';
     else
    	 $symbol=$_POST["symbol"];
       if (empty($_POST["section"]))
       $sectionerror='<div style="text-align:center" class="alert alert-danger alert-dismissible">
   							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 Section is required
   					</div>';
       else
    	   $section=$_POST["section"];

      if($symbolerror=="" && $sectionerror=="")
      {
        $con=mysqli_connect("h40lg7qyub2umdvb.cbetxkdyhwsb.us-east-1.rds.amazonaws.com	","qygo0fj96x0bqqs1	","tldlxjueyhqci5v1","jxmuczgeixk2nwzx");
        if(!$con)
          die("not connected".mysqli_connect_error());
        $sql="SELECT count(*) FROM lab where symbol='$symbol' and section='$section'";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_row($result);
        if($row[0]==0){
          $someThingError='<div style="text-align:center" class="alert alert-danger alert-dismissible">
      							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    some thing error
      					</div>';
        }
        else {
          $sql="SELECT COUNT(*) FROM student INNER JOIN studentlabs ON student.ID = studentlabs.studentID and studentlabs.labSymbol='$symbol' and studentlabs.Section='$section'";
          $result=mysqli_query($con,$sql);
          $row=mysqli_fetch_row($result);
          if($row[0]==0){
          $someThingError='<div style="text-align:center" class="alert alert-danger alert-dismissible">
        							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      no student Registered in this section
        					</div>';
          }
          else {
            $symbolerror="";
            $sectionerror="";
            $someThingError="";
            header("location:studentFile.php?symbol=$symbol&section=$section");
          }
        }
      }
    }
    ?>

</head>
<body>

<?php
  session_start();

  ?>

<?php
if(!($database=mysqli_connect("h40lg7qyub2umdvb.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","qygo0fj96x0bqqs1","tldlxjueyhqci5v1","jxmuczgeixk2nwzx")))

die("Could not connect to database </body></html>");

$q1 = "Select * from hall;";
$result1 = mysqli_query($database, $q1);

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
          <li><a href="#"  style="color:#EDD700"><span class="glyphicon glyphicon-user"></span> admin page</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.html"  style="color:#EDD700"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </div>
    </div>
    <hr style="border: 1.5px solid #EDD700;border-radius: 5px;padding:0px;margin:0px">
</nav>
<span><?php echo $symbolerror;?></span>
<span><?php echo $sectionerror;?></span>
<span><?php echo $someThingError;?></span>
<span><?php  $msg=$_SESSION["m"]; echo $msg; $_SESSION["m"]=" "; ?></span>
<span><?php  $msg=$_SESSION["d"]; echo $msg; $_SESSION["d"]=" "; ?></span>
<span><?php  $msg=$_SESSION["u"]; echo $msg; $_SESSION["u"]=" "; ?></span>
  <div style="border-radius: 60px;border-color: #EDD700;color: #EDD700;background-color:#2E3951;border-width: 3px;border-style: solid;margin-left:5%;margin-right:5%;" >
    <p style="text-align:center;margin-top:3px;">Download Students Info in specific section</p>
        <form class="form-inline" style="padding:10px;margin-left:20%;margin-right:5%;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <label class="control-label" for="symbol">symbol</label>
          <input type="text" name="symbol" value="" style="color:#2E3951;">
          <label class="control-label" for="section">section</label>
          <input type="text" name="section" value="" style="color:#2E3951;">
          <input type="submit" name="download" value="download" style="background-color:#EDD700;color:#2E3951;font-weight:bold;">
        </form>
    </div>
<br><br>
<?php
echo'
    <div class="container" style="margin-left:5% auto;margin-right:5% auto;"><table class="table table-sm text-center" name="labs" id="labs">
    <thead>
    <tr style="background-color:#2E3951;color:#EDD700;">
    <td>Symbol</td><td>Name</td><td>Section</td><td>Day</td><td>Time</td><td>Hall</td><td>Registered</td><td colspan="2">Actions</td>
    </tr>
    </thead>
    <tbody>';
echo
'<tr id="addraw">
<form method ="post" action = "insert.php"  >
<td><input style="width:90px;" type ="text" placeholder="symbol" name="addSymbol" id="addSymbol"required ></td>
<td><input style="width:250px;" type ="text" placeholder="Name" name="addName"  id="addName" required ></td>
<td><input style="width:30px;" name="addSection" id="addSection" type ="number"  min="1" required ></td>
<td><select name="addDay" id="addDay" required ><option>SUN</option><option>MON</option><option>TUE</option><option>WED</option><option>THU</option></select></td>
<td><input type ="time" placeholder="--:--:--" name="addTime" id ="addTime" required ></td>
<td><select name="addHall" id="addHall" required >'
;
while( $r = mysqli_fetch_row($result1))
{
echo '
<option>'.$r[2].'</option>';
}
echo'</select></td><td></td><td colspan="2"><input type="image" name="button" src="add.jpg" height="42" width="42"  value="add" id="addButton"></td>
</form></tr>';
$q = "Select * from lab;";
$result = mysqli_query($database, $q);
$i=0;
$table='';
while( $r = mysqli_fetch_row($result))
{
if($i%2==0){
$table.="<tr style='background-color:#FFFF99' id='$r[0]-$r[1]-$r[2]-$r[3]-$r[4]-$r[5]'>";
 }
else {
$table.="<tr style='background-color:#EDD700' id='$r[0]-$r[1]-$r[2]-$r[3]-$r[4]-$r[5]'>";
}
$i+=1;
echo $table."<form method =\"post\" action = \"delete.php\"  >
<td>$r[0]</td><td>$r[1]</td><td>$r[2]</td><td>$r[3]</td><td>$r[4]</td><td>$r[5]</td>
<td>$r[6]</td>
<td id='delete-td'><button style='background-color:#2E3951;color:#EDD700;'  name='button1' type=\"submit\" src=\"delete.jpg\"  height=\"42\" width=\"42\" id='delete-$r[0]-$r[2]'  value='$r[0]-$r[2]'>delete</button></td><td id='update-td'>
<button  style='background-color:#2E3951;color:#EDD700;' name='button2' value='$r[0]-$r[1]-$r[2]-$r[3]-$r[4]-$r[5]' type=\"submit\" src=\"update.webp\"  height=\"42\" width=\"42\" id='update-$r[0]-$r[1]-$r[2]-$r[3]-$r[4]-$r[5]'>update</button>
</td>
</form>
</tr>
";
}
echo"</tbody></table></div>";
?>


</body>
</html>
<!--  labeled ,rowspan , +2 to time,insert-->
