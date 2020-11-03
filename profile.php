<html>
<head>
  <title>
  Profile
  </title>
  <link href="index.css" type = "text/css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  </head>
  <body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark border-bottom">
		<a class="navbar-brand" href="/"><span class="brand">LINKER</span></a>
		<ul class="navbar-nav ml-auto mt-2">
				<li class="nav-item"><a href="profile.php">Profile</a></li>
				<li> </li>
				<li class="nav-item"><a href="#">About Us</a></li>
		</ul>
    </nav>
  <h1> 
  Your profile</h1>
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
	$rolli = $_SESSION['USER_ID'];
	$query = "SELECT * FROM prof WHERE roll='$rolli'";
	$result = mysqli_query($link,$query);
	echo mysqli_error($link);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$query1 = "SELECT email FROM login WHERE roll='$rolli'";
	$result1 = mysqli_query($link,$query1);
	echo mysqli_error($link);
	$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
	echo"Your roll number". "{$row['roll']}".'<br><br>';
	echo"Your hall of residence"."{$row['hostel']}".'<br><br>';
	echo"Room number "."{$row['room']}".'<br><br>';
	echo"Your Email "."{$row1['email']}".'<br><br>';
	echo"Mobile number "."{$row['mobile']}".'<br><br>';
		}
	?>
	<a href = "profileditentry.html">
	<button>edit your profile</button>
	</a>

	<div class="fixed-footer">
        Copyright &copy; 2019 Linker
        <ul class="navbar-nav ml-auto mt-2">
                <li class="nav-item" style="right"><a href="#">About Us</a></li>
        </ul>
    </div>
	</body>
	</html>