<html>
<body>
<?php
print_r($_POST);

foreach( $_POST as $index => $val )
{
if("button1"==$index)
{
$arr=array();
$i=0;


$token = strtok($_POST["button1"], "-");
while ($token !== false)
{
$arr[$i++]=$token;
$token = strtok("-");

}
$database=mysqli_connect('h40lg7qyub2umdvb.cbetxkdyhwsb.us-east-1.rds.amazonaws.com','qygo0fj96x0bqqs1','tldlxjueyhqci5v1','jxmuczgeixk2nwzx');
if(!$database)
die("Could not connect to database ");
$q = "delete from lab where symbol= '$arr[0]' AND section='$arr[1]';";
echo $q;
$result = mysqli_query($database, $q);
if ($result)
echo "One row is deleted";
header("Location:admin.php");
}
else
{
$arr=array();
$i=0;
$token = strtok($_POST["button2"], "-");
while ($token !== false)
{
$arr[$i++]=$token;
$token = strtok("-");

}


$raw= '<tr>
<form method ="post" action = "insert.php" >
<td><input type ="text" placeholder="'.$arr[0].'" name="addSymbol" id="addSymbol"required ></td>
<td><input type ="text" placeholder="'.$arr[1].'"  name="addName"  id="addName" required ></td>
<td><input name="addSection" id="addSection" placeholder="'.$arr[2].'" type ="number" required ></td>
<td><select name="addDay" id="addDay" placeholder="'.$arr[3].'" required ><option>SUN</option><option>MON</option><option>TUE</option><option>WED</option><option>THU</option></select></td>
<td><input type ="time" value="'.$arr[4].'" name="addTime" id ="addTime" required ></td>
<td><input type ="text" placeholder="'.$arr[5].'" name="addHall" id="addHall" required></td>
';
echo $raw;
}

}
header("Location:admin.php");
?>
</body>
</html>
