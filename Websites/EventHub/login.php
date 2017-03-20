<html>
<head>
<?php
include('db.php');

// login.php variable
$firstname = @$_POST['firstname'];
$lastname = @$_POST['lastname'];
$email = @$_POST['email'];
$username = @$_POST['username'];
$password = @$_POST['password'];
$repassword = @$_POST['repassword'];
$submit = @$_POST['submit'];
$encpassword = md5($password);

// loop to check if username and password are correct
if($username&&$password) {
	
	// check if username is in database
	$query = $db->query("SELECT * FROM users WHERE username = '$username'") or die ("something went wrong");
	$numrows = $query->rowCount();
	
	//a ssign username and password to varibles
	 // then checks if in database
	if($numrows !==0) {
		while($row = $query->fetch(PDO::FETCH_ASSOC)) {
			
			$dbusername = $row['username'];
			$dbpassword = $row{'password'};
			$firstname = $row{'firstname'};
			$lastname = $row{'lastname'};
			$email = $row{'email'};
			$id = $row['id'];
		
		}//while]
		
		if(($username==$dbusername)&&($encpassword==$dbpassword)) {			
			
			session_start();
			$_SESSION['id']= $id;
			$_SESSION['username'] = $username; 
			$_SESSION['firstname'] = $firstname;
			$_SESSION['lastname']= $lastname;
			$_SESSION['email']= $email;
			header('Location: user_home.php');
			
		}//if
		else header('Location: index-badlogin.php');		//echo "\nPassword was wrong"; 

		
	}//if

		 else header('Location: index-badlogin.php');		//" User does not exist";
}//if

	 else header('Location: index-badlogin.php');
	
?>
</head>

<body>
    
</body>
</html>
