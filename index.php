<?php 
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Wel come to Online Exam</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include("header.php");
include("database.php");
$connect = $_SESSION['connect'];
extract($_POST);

if(isset($submit))
{
	$rs=mysqli_query($connect, "select * from mst_user where login='$loginid' and pass='$pass'");
	if(mysqli_num_rows($rs)<1)
	{
		$found="N";
	}
	else
	{
		$_SESSION[login]=$loginid;
	}
}
if (isset($_SESSION[login]))
{
echo "<h1 class='style8' align=center>Wel come to Online Exam</h1>";
		echo '<table width="28%"  border="0" align="center">
  <tr>
    <td width="7%" height="65" valign="bottom"><img src="image/HLPBUTT2.JPG" width="50" height="50" align="middle"></td>
    <td width="93%" valign="bottom" bordercolor="#0000FF"> <a href="sublist.php" class="style4">Select your Subject for Exam </a></td>
  </tr>
  <tr>
    <td height="58" valign="bottom"><img src="image/DEGREE.JPG" width="43" height="43" align="absmiddle"></td>
    <td valign="bottom"> <a href="result.php" class="style4">See Your Result </a></td>
  </tr>
</table>';
   
		exit;
		

}

r
?>
<table width="100%" border="0">
  <tr>
    <td width="70%" height="25">&nbsp;</td>
    <td width="1%" rowspan="2" bgcolor=""><span class="style6"></span></td>
    <td width="29%" bgcolor="#2F4F4F"><div align="center" class="style1">User Login </div></td>
  </tr>
  <tr>
    <td height="296" valign="top"><div align="center">
        <h1 class="style8">Online Exam Management System </h1>
      <span class="style5"><img src="images/cover.png" width="438" height="161">    
	  </span>
        <param name="movie" value="english theams two brothers.dat">
        <param name="quality" value="high">
        <param name="movie" value="Drag to a file to choose it.">
        <param name="quality" value="high">
        <param name="BGCOLOR" value="#FFFFFF">
<p align="left" class="style5">&nbsp;</p>
      <blockquote>
          <p align="left" class="style5"><span class="style7">Wel Come to Online 
            exam. This Site helps you to take part in your varsity Exam. You can attend both written and mcq Exam 
            You need to login for the take the online exam.</span></p>
      </blockquote>
    </div></td>
    <td valign="top"><form name="form1" method="post" action="">
      <table width="300" border="0">
        <tr>
          <td><span class="style2">Login ID </span></td>
          <td><input name="loginid" type="text" id="loginid2"></td>
        </tr>
        <tr>
          <td><span class="style2">Password</span></td>
          <td><input name="pass" type="password" id="pass2"></td>
        </tr>
        <tr>
          <td colspan="2"><span class="errors">
            <?php
		  if(isset($found))
		  {
		  	echo "Invalid Username or Password";
		  }
		  ?>
          </span></td>
          </tr>
        <tr>
          <td colspan=2 align=center class="errors">
		  <input name="submit" type="submit" id="submit" value="Login">		  </td>
        </tr>
        <tr>
          <td colspan="2" bgcolor="##FFA500"><div align="center"><span class="style4">New User ? <a href="signup.php">Signup Free</a></span></div></td>
          </tr>
		<tr>
          <td colspan="2" bgcolor="#CC3300"><div align="center"><span class="style4">Administration ? <a href="admin/index.php">Admin Login</a></span></div></td>
          </tr>
      </table>
      <div align="center">
        </div>
    </form></td>
  </tr>
</table>

</body>
</html>
