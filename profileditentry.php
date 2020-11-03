  <?php
  session_start();
   if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1)
   {
   $link = mysqli_connect('localhost','root','');
	if(!$link){ 
	die('Failed to connect to server: ' . mysqli_error($link)); 
	} 
	$db = mysqli_select_db($link,'linker');
	if(!$db){
		die("Unable to select database");
	} 
  $rolli=$_SESSION['USER_ID'];	 
  $emaili = $_POST['email'];
  $hosteli = $_POST['hostel'];
  $roomi = $_POST['room'];
  $mobilei = $_POST['mobile'];
  $rolli = $_SESSION['USER_ID'];
  mysqli_error($link);
  if($emaili){
  $query = "UPDATE login set email='$emaili' where roll='$rolli'" ;
  $result = mysqli_query($link,$query);
  echo"sucess";
  }
  if($hosteli){
  $query = "UPDATE prof set hostel='$hosteli' where roll='$rolli'" ;
  $result = mysqli_query($link,$query);
  echo"sucess";
  }
  if($roomi ){
  $query = "UPDATE prof set room='$roomi ' where roll='$rolli'" ;
  $result = mysqli_query($link,$query);
  echo"sucess";
  }
  if($mobilei){
  $query = "UPDATE prof set mobile='$mobilei' where roll='$rolli'" ;
  $result = mysqli_query($link,$query);
  echo"sucess";
  }
  header('location:profile.php');
   }
   
  ?>
