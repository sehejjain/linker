<?php
	session_start();
	$host = 'localhost'; $user = 'root'; $pass = '';
	$link = mysqli_connect($host, $user, $pass);
	mysqli_select_db($link,'linker');
	//echo $_SESSION['USER_ID'];
	$roll=$_SESSION['USER_ID'];
	$query='select COUNT(*) from questions_all where roll='.$roll;
	$result=mysqli_query($link,$query);
	echo mysqli_error($link);
	$cq=mysqli_fetch_array($result);
	//echo $cq[0];
	$cq[0]=$cq[0]+1;
	//echo $cq[0];
	$idq=$roll.'_'.$cq[0];
	$question=$_POST['newquestion'];
	//echo $question;
	$query="INSERT INTO `questions_all`(`roll`, `idq`, `question`, `dateq`, `counta`) 
			VALUES ($roll,'$idq','$question',DEFAULT,DEFAULT)";
	$result=mysqli_query($link,$query);
	echo mysqli_error($link);
	/*$query="INSERT INTO `questions_$roll`(`roll`, `idq`, `question`, `dateq`, `counta`) 
			VALUES ($roll,'$idq','$question',DEFAULT,DEFAULT)";
	$result=mysqli_query($link,$query);
	echo mysqli_error($link);*/
	$success = $result;
	//echo $success;
	header( 'Location: home.html?success='.$success);
?>