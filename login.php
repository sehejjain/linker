<?php
$rolli= isset($_POST['roll']) ? $_POST['roll'] : '';
$pwdi = isset($_POST['pwd']) ? $_POST['pwd'] : '';
if(!$rolli){
	echo"enter a valid roll number";
}
else if(!$pwdi){
	echo"Enter a valid password";
}
else{
$message="";
if(count($_POST)>0) {
	$link = mysqli_connect('localhost','root','');
	if(!$link){ 
die('Failed to connect to server: ' . mysqli_error($link)); 
} 
$db = mysqli_select_db($link,'linker');
if(!$db){
die("Unable to select database");
}
	$query = "SELECT roll,pwd FROM login WHERE roll='$rolli' AND pwd='$pwdi'";
    $results = mysqli_query($link,$query);
	$count  = mysqli_num_rows($results);
	if($count==0) {
		$message = "Invalid Username or Password!";
	} else {
		$message = "You are successfully authenticated!";
		
	}
	
	
	echo"$message";
	if ($count==1){
		session_start();
		$_SESSION['IS_AUTHENTICATED']=1;
		$_SESSION['USER_ID']=$rolli;
		header('location:home.html');
		//exit();
}
}
}
?>