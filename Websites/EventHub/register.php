<html>
<head>
<?php
include('db.php');

// Varibles for register form
$firstname = @$_POST['firstname'];
$lastname = @$_POST['lastname'];
$email = @$_POST['email'];
$username = @$_POST['username'];
$password = @$_POST['password'];
$repassword = @$_POST['repassword'];
$submit = @$_POST['submit'];
$encpassword = md5($password);



?>
</head>

<body bgcolor ="#8D5EA6">

	
	<!-- Register form for EventHub -->
    <table width="100%", height="100%"><tr><td></td><td bgcolor="#FFCCFF" align="center"><b>Create a profile and plan events with friends!</b>
	
<?php
	// If loop to catch errors when filling out register form
	if($submit) {
	if(($username==TRUE)||($password==TRUE)||($firstname==TRUE)||($lastname==TRUE)||($repassword==TRUE)) {
		if(strlen($password) >= 6) {
			if($password == $repassword){
				$query2 = $db->query("SELECT * FROM users WHERE username='$username'");
				$numrows2 = $query2->rowCount();
					if($numrows2 ==0) {
		
					$insert = $db->query("INSERT INTO users VALUES('','$firstname','$lastname','$email','$username','$encpassword','')") or die ("could not insert into database");
					echo "<br>Tnank you for registering. Click back to log in.<br>";
				
					}//if4 
				else echo "<font color='red'><br>Username already exist!</font>";
				}//if3 
			else echo "<font color='red'><br>passwords do not match</font>";
		}//if4
		else echo "<font color='red'><br>Password must be equal to or longer than 6 characters</font>";
	}//if2 
	else echo "<font color='red'><br>Please full out the whole form</font>"; 
	
}//if
?>
        
<!-- Register form -->
	<form method = "post">
	<p>First Name: </p>  <input name="firstname" type ="text"><br>
	<p>Last Name: </p>  <input name="lastname" type ="text"><br>
	<p>E-Mail Address: </p>  <input name="email" type ="text"><br>
	<p>Username: </p>  <input name="username" type ="text"><br>
	<p>Password: </p>  <input name="password" type ="password"><br>
	<p>Re-enter Password</p>  <input name="repassword" type ="password"><br>
	<input name="submit" type ="submit" value = "Register">
	<input type="button" value="Back" onClick="location.href = 'index.php';">


	</form></table>
	</td><td></td></tr></table>
	
</body>
</html>
