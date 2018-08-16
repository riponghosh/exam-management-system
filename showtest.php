<?php
session_start();
?>
<!DOCTYPE HTML >
<html>
<head>
<title>Online Exam - Exam List</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
include("header.php");
include("database.php");
$connect = $_SESSION['connect'];
extract($_GET);
$rs1=mysqli_query($connect, "select * from mst_subject where sub_id=$subid");
$row1=mysqli_fetch_array($rs1);
echo "<h1 align=center><font color=blue> $row1[1]</font></h1>";
$rs=mysqli_query($connect, "select * from mst_test where sub_id=$subid");
if(mysqli_num_rows($rs)<1)
{
	echo "<br><br><h2 class=head1> No Quiz for this Subject </h2>";
	exit;
}
echo "<h2 class=head1> Select Exam Name to Give Exam </h2>";
echo "<table align=center>";

while($row=mysqli_fetch_row($rs))
{?>
	<tr><td align=center onclick="a()"><?php echo "<a href=quiz.php?testid=$row[0]&subid=$subid><font size=4>$row[2]</font></a>";
}
echo "</table>";
?>
<script type="text/javascript">
document.cookie = "username=John Doe";
	function a(){
		document.cookie = "check=1";
		document.cookie = "min=0";
		document.cookie = "sec=0";
		//var x = document.cookie;
		//var b= getCookie("check");
	}


function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
} 
	
</script>
</body>
</html>
