<?php

	$email = "<localhost@host.com>";
	
	if(isset($_POST['reciver'], $_POST['subject'], $_POST['body'])) {
	//validate reciver
		if(empty($_POST['reciver'])){
			$errors[] = "Please enter a valid email";
			
		} else if(filter_var($_POST['reciver'], FILTER_VALIDATE_EMAIL) == false) {
			$errors[] = "Please enter a valid email";
		} else	$to = "<".htmlentities($_POST['reciver']).">"; 
		
	//validate subject
		if(empty($_POST['subject'])){
			$errors[] = "No subject.";
		} else { 	$subject = htmlentities($_POST['subject']);
		}//elseif2
		
	//validate body
		if(empty($_POST['body'])){
			$errors[] = "Please enter a message.";
		} else { 	$body = htmlentities($_POST['body']);
		}//elseif3
		
	}//if1
	
			
?>

<html>
<head>
</head>

<body>

<?php
	if(empty($errors) == false){
	?>
	<ul>
			<?php
				foreach($errors as $error) {
					echo "<li>", $error, "</li>";
				}//foreach
			?>
	</ul>

<?php		
		
	} else { if(isset($to, $subject, $body)) {
		mail($to, $subject, $body);
		echo "Message sent!";
	}//ifesle
	}//iferrors

?>

	<form method = "post" action = "">
		<label for = "subject">Subject: </label>
			<input type = "text" id = "subject" name = "subject" /> </br>
		<label for = "reciver">Reciver: </label>
			<input type = "text" id = "reciver" name = "reciver" /> </br>
		<label for = "body">Message: </label>
			<textarea id = "body" name = "body" cols = "100" rows = "20"></textarea> </br>
			<input type = "submit" value = "Send Email">
		
	</form>

</body>
</html>