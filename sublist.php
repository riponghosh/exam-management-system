<?php
session_start();
?>
<!DOCTYPE HTML >
<html>
<head>
<title>Online Exam - Exam  List</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
include("header.php");
include("database.php");
$connect = $_SESSION['connect'];
echo "<h2 class=head1> Select Subject to Give Exam </h2>";
$rs=mysqli_query($connect,"select * from mst_subject");
echo "<table align=center>";
while($row=mysqli_fetch_row($rs))
{
	echo "<tr><td align=center ><a href=showtest.php?subid=$row[0]><font size=4>$row[1]</font></a>";
}
echo "</table>";
?>
</body>
</html>
