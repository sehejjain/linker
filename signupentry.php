<html>
	<head>
		<title>Signup</title>
	</head>
	<body>
		<?php
			$rolli = $_POST['roll'];
			$namei = $_POST['name'];
			$emaili = $_POST['email'];
			$pwdi = $_POST['pwd'];
			$hosteli = $_POST['hostel'];
			$roomi = $_POST['room'];
			$mobilei = $_POST['mobile'];
			$link = mysqli_connect('localhost:8888','root','');
			if(!$link){ 
				die('Failed to connect to server: ' . mysqli_error($link)); 
			}
			$db = mysqli_select_db($link,'linker');
			if(!$db){
				die("Unable to select database");
			}
			$query = "INSERT INTO login(pwd , email, roll) VALUES
					('$pwdi' , '$emaili', '$rolli')";
			$results = mysqli_query($link,$query);
			//Check if query executes successfully 
			if($results == FALSE){ 
				echo mysqli_error($link).'<br/>'; 
			}
			else {
				echo 'Data inserted successfully! '; 
			}
			$query1 = "INSERT INTO prof(  roll,hostel,room,mobile) VALUES
				( '$rolli','$hosteli','$roomi','$mobilei')";
			$results = mysqli_query($link,$query1);
			if($results == FALSE){ 
				echo mysqli_error($link).'<br/>'; 
			}
			else {
				/*$query = "create table questions_$rolli
					(
					roll integer not null,
					idq varchar(100) not null,
					question varchar(200) not null,
					dateq datetime default CURRENT_TIMESTAMP,
					counta integer default 0,
					upvoteq integer default 0,
					downvoteq integer default 0,
					foreign key (roll) REFERENCES prof(roll),
					primary key (idq)
					);";
				//echo $query;
				$results = mysqli_query($link,$query);
				echo mysqli_error($link);
				$query = "create table answers_$rolli
						(
							roll integer not null,
							idq varchar(100) not null,
							ida varchar(100) not null,
							answer varchar(200) not null,
							datea datetime default CURRENT_TIMESTAMP,
							upvotea integer default 0,
							downvotea integer default 0,
							foreign key (roll) REFERENCES prof(roll),
							primary key (idq,ida),
							foreign key (idq) REFERENCES questions_roll(qid)
						);";*/
				//echo $query;
				$results = mysqli_query($link,$query);
				echo mysqli_error($link);
				header("Location: loginform.html"); 
			}
		?>
	</body>
</html>