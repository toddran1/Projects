
<?php

include('db.php');
session_start();

	$message = @$_POST['message'];
	$user = $_SESSION['firstname'];
	$id = $_SESSION['id'];
	
	if(@$_POST['message'])
		$query = $db->query("INSERT INTO chat_mess(`USER_ID`, `USER_NAME`, `MESSAGES`) VALUES ('$id','$user','$message')") or die ("something went wrong");

	$result = $db->query("SELECT * FROM chat_mess ORDER BY `time` ASC");
	while ($extract = $result->fetch(PDO::FETCH_ASSOC)) {
		echo $extract['USER_NAME'] . ":   " . $extract['MESSAGES']. "<br>"; 

	}//while
	
?>