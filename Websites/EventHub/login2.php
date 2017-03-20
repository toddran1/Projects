<?php

include 'header.php';

	// check if username is in database
	$query = $db->query("SELECT * FROM users WHERE username = '$username'") or die ("something went wrong");
	$numrows = $query->rowCount();
	
		while($row = $query->fetch(PDO::FETCH_ASSOC)) {
			
			$dbusername = $row['username'];
			$dbpassword = $row{'password'};
			$firstname = $row{'firstname'};
			$lastname = $row{'lastname'};
			$email = $row{'email'};
			$id = $row['id'];
		
		}//while]
		
			session_start();
			$_SESSION['id']= $id;
			$_SESSION['username'] = $username; 
			$_SESSION['firstname'] = $firstname;
			$_SESSION['lastname']= $lastname;
			$_SESSION['email']= $email;
			header('Location: user_profile.php');
			
include 'header.php';

?>