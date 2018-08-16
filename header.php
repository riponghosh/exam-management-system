<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
}
-->
</style>
<table border="0" width="100%" cellspacing="0" cellpadding="0" background="image/topbkg.jpg">
  <tr>
    
    <td width="10%">
     <img border="0" src="image/topright.jpg" width="203" height="68" align="right"></td>
  </tr>
</table>
<table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#000000" background="img/blackbar.jpg">
  <tr>
    <td width="100%" align="right"><img border="0" src="image/blackbar.jpg" width="89" height="15"></td>
  </tr>
  </Table>
  <Table width="100%">
  <tr>
  <td>
  <?php @$_SESSION['login']; 
  error_reporting(1);
  ?>
  </td>
    <td>
  <?php
  include("database.php");
  $connect = $_SESSION['connect'];
  if(isset($_SESSION['login']))
  {
  $loginid= $_SESSION['login'];
  $sql2="SELECT * FROM mst_user WHERE login = '".$loginid."'";
  $result2 = mysqli_query($connect,$sql2);
  echo "<table align=center>";
  while($row=mysqli_fetch_array($result2))
  {
    $name=$row['username'];
  }
   echo '<div align="right"><strong><a href="index.php"> '.$name.' </a>|<a href="index.php"> Home </a>|<a href="signout.php">Signout</a></strong></div>';
   }
   else
   {
    echo "&nbsp;";
   }
  ?>
  </td>
  
  </tr>
  
</table>
