<html>
<head>

<?php
echo '

<script>

function UIdeleteItem(ID)
{
var el=document.getElementById(ID);

el.parentNode.removeChild(el);
}
function deleteItem (event)
{
var splitId,symbol,section;
var ID =event.target.parentNode.parentNode.id;
if(ID)
{
splitId=ID.split("-");
symbol=splitId[0];
section=parseInt(splitId[1]);
deletefromDB(symbol,section);
UIdeleteItem(ID);
}
}
function deletefromDB(symbol,section)
{
}
function addbuttonPressed()
{
var html="<tr><td>%symbol%</td><td>%name%</td><td>%section%</td><td>%day%</td><td>%time%</td><td>%hall%</td><td><input type=\'image\' src=\'delete.jpg\'  height=\'42\' width=\'42\'></td><td><input type=\'image\' src=\'update.webp\'  height=\'42\' width=\'42\'></td></tr>";
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
var addButton=document.getElementById("addraw").insertAdjacentHTML(\'beforebegin\',newhtml);


';




echo '}
function start()
{var addButton=document.getElementById("addButton");
addButton.addEventListener("click",addbuttonPressed,false);

}
window.addEventListener("load",start,false);
</script>';
?>
</head>
<body>
<?php
if(!($database=mysqli_connect("localhost","root","HaYa.IaFiRlA.79","labs_registration_system")))

die("Could not connect to database </body></html>");

$q = "Select * from lab;";
$result = mysqli_query($database, $q);
echo "<table border = '1'><tr><td>Symbol</td><td>Name</td><td>Section</td><td>Day</td><td>Time</td><td>Hall</td><td colspan='2'>Actions</td></tr>";
while( $r = mysqli_fetch_row($result))
{

echo "<div id='$r[0].'-'.$r[2]'><tr><td>$r[0]</td><td>$r[1]</td><td>$r[2]</td><td>$r[3]</td><td>$r[4]</td><td>$r[5]</td><td><input type=\"image\" src=\"delete.jpg\"  height=\"42\" width=\"42\" id=\"$r[0].$r[2]\"></td>
<td><input type=\"image\" src=\"update.webp\"  height=\"42\" width=\"42\" id=\"updateButton\"></td></tr>";
}



echo '<tr id="addraw" >
<form method ="post"  id="myform" >
<td><input type ="text" placeholder="symbol" id="addSymbol" required ></td>
<td><input type ="text" placeholder="Name" id="addName" required ></td>
<td><input id="addSection" type ="number" required ></td>
<td><select id="addDay" required ><option>SUN</option><option>MON</option><option>TUE</option><option>WED</option><option>THU</option></select></td><td>
<input type ="time" placeholder="--:--:--" id="addTime" required ></td>
<td><input type ="text" placeholder="Hall Name"id="addHall" required></td>

<td><input type="image" src="add.jpg"  height="42" width="42" id="addButton"></td></form></tr></table>';


?>

</body>
</html>
<!-- rowspan , +2 to time-->
