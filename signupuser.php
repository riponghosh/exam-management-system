<!DOCTYPE HTML>
<html>
	<head>
		<title>User Signup</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link href="quiz.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<?php
		include("header.php");
		extract($_POST);
		include("database.php");
		$connect = $_SESSION['connect'];
		$rs=0;
		$result2=0;

		echo $lid;
		//$rs=mysql_query("select * from mst_user where login='$lid'");
		$sql2="SELECT * FROM mst_user WHERE login = '".$lid."'";
		$result2 = mysqli_query($connect,$sql2);
		if (mysqli_fetch_array($result2)>0)
		{
			echo "<br><br><br><div class=head1>Login Id Already Exists</div>";
			exit;
		}
		/*$sql="insert into mst_user(user_id,login,pass,username,address,city,phone,email) values('$uid','$lid','$pass','$name','$address','$city','$phone','$email')";*/
		// echo $email.'<br>';
		// echo $phone.'<br>';
		// echo $city.'<br>';
		// echo $address.'<br>';
		// echo $name.'<br>';
		// echo $pass.'<br>';
		// echo $lid.'<br>';
		// echo $uid;
		$sql="INSERT INTO `mst_user`(`user_id`, `login`, `pass`, `username`, `address`, `city`, `phone`, `email`) VALUES ('','$lid','$pass','$name','$address','$city','$phone','$email')";
		$result = mysqli_query($connect,$sql);
		if($result){
			echo "<br><br><br><div class=head1>Your Login ID  $lid Created Sucessfully</div>";
			echo "<br><div class=head1>Please Login using your Login ID to take Quiz</div>";
			echo "<br><div class=head1><a href=index.php>Login</a></div>";
		}
		else{
			echo "something error";
		}



		?>
	</body>
</html>

