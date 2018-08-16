<?php
session_start();
error_reporting(1);
include("database.php");
$connect = $_SESSION['connect'];
extract($_POST);
extract($_GET);
extract($_SESSION); 

if(isset($subid) && isset($testid))
{
$_SESSION[sid]=$subid;
$_SESSION[tid]=$testid;
header("location:quiz.php");
}
if(!isset($_SESSION[sid]) || !isset($_SESSION[tid]))
{
	header("location: index.php");
}
?>
<!DOCTYPE HTML >
<html>
<head>
<title>Online Exam</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include("header.php");
?>

<p id="demo"></p>

<form name="Tick">
<input type="text" size="11" name="Clock">
</form>
<?php


$query="select * from mst_question";

$rs=mysqli_query($connect,"select * from mst_question where test_id=$tid") or die(mysqli_error());
if(!isset($_SESSION[qn]))
{
	$_SESSION[qn]=0;
	mysqli_query($connect,"delete from mst_useranswer where sess_id='" . session_id() ."'") or die(mysqli_error());
	$_SESSION[trueans]=0;
	
}
else
{	
		if($submit=='Next Question' && isset($ans))
		{
				mysqli_data_seek($rs,$_SESSION[qn]);
				$row= mysqli_fetch_row($rs);	
				mysqli_query($connect,"insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysqli_error());
				if($ans==$row[7])
				{
					$_SESSION[trueans]=$_SESSION[trueans]+1;
				}http://localhost/tools/phpmyadmin/sql.php?server=1&db=quiz_new&table=mst_subject&pos=0&token=a6c2a9b3f679d60b576fa959e3f48860
				$_SESSION[qn]=$_SESSION[qn]+1;
		}
		else if($submit=='Get Result')
		{
				if(!isset($ans)){
					$ans=0;
				}
				mysqli_data_seek($rs,$_SESSION[qn]);
				$row= mysqli_fetch_row($rs);
	
				mysqli_query($connect,"insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysqli_error());
				if($ans==$row[7])
				{
							$_SESSION[trueans]=$_SESSION[trueans]+1;
				}
				echo "<h1 class=head1> Result</h1>";
				$_SESSION[qn]=$_SESSION[qn]+1;
				echo "<Table align=center><tr class=tot><td>Total Question<td> $_SESSION[qn]";
				echo "<tr class=tans><td>True Answer<td>".$_SESSION[trueans];
				$w=$_SESSION[qn]-$_SESSION[trueans];
				echo "<tr class=fans><td>Wrong Answer<td> ". $w;
				echo "</table>";
				mysqli_query($connect,"insert into mst_result(login,test_id,test_date,score) values('$login',$tid,'".date("d/m/Y")."',$_SESSION[trueans])") or die(mysqli_error());
				echo "<h1 align=center><a href=review.php> Review Question</a> </h1>";
				unset($_SESSION[qn]);
				unset($_SESSION[sid]);
				unset($_SESSION[tid]);
				unset($_SESSION[trueans]);
				exit;
		}
}
$rs=mysqli_query($connect,"select * from mst_question where test_id=$tid") or die(mysqli_error());
if($_SESSION[qn]>mysqli_num_rows($rs)-1)
{
unset($_SESSION[qn]);
echo "<h1 class=head1>Some Error  Occured</h1>";
session_destroy();
echo "Please <a href=index.php> Start Again</a>";

exit;
}
mysqli_data_seek($rs,$_SESSION[qn]);
$row= mysqli_fetch_row($rs);
echo "<form name=myfm method=post action=quiz.php>";
echo "<table width=100%> <tr> <td width=30>&nbsp;<td> <table border=0>";
$n=$_SESSION[qn]+1;
echo "<tR><td><span class=style2>Que ".  $n .": $row[2]</style>";
echo "<tr><td class=style8><input type=radio name=ans value=1>$row[3]";
echo "<tr><td class=style8> <input type=radio name=ans value=2>$row[4]";
echo "<tr><td class=style8><input type=radio name=ans value=3>$row[5]";
echo "<tr><td class=style8><input type=radio name=ans value=4>$row[6]";

if($_SESSION[qn]<mysqli_num_rows($rs)-1)
echo "<tr><td><input type=submit name=submit id=timeout value='Next Question'></form>";
else
echo "<tr><td><input type=submit name=submit value='Get Result'></form>";
echo "</table></table>";
?>

<script type="text/javascript">
	var check=getCookie("check");
	//window.alert(check);
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

<script>
<!--
/*By George Chiang (JK's JavaScript tutorial)
http://javascriptkit.com
Credit must stay intact for use*/
var Xmas95 = new Date();
var minutes = Xmas95.getMinutes();
//document.getElementById("demo").innerHTML=minutes;

console.log(minutes); // 15
var min=0;
var sec=0;
var mincunt=0;
min=getCookie("min");
sec=getCookie("sec");

function show(){
	sec++
	if((sec%60)==0){
		min++
	}
	if(sec==60){
		sec=0
	}

document.Tick.Clock.value=min+":"
+sec
if(sec==15){
	document.getElementById("timeout").value="Get Result"
	//document.getElementById("tabempty").innerHTML="Get Result"
	return
}
document.cookie = "min="+min
document.cookie = "sec="+sec

setTimeout("show()",1000)
}
show()
//-->
</script>

</body>
</html>